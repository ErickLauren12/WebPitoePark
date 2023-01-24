<?php

namespace App\Http\Controllers;
use App\Order;
use App\CafeDetail;
use App\CategoryFood;
use App\Cafe;
use App\Meja;
use Auth;
use Session;
use PDF;
use Illuminate\Support\Str;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\Datatables;

class OrderController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, string $hash)
    {

        $title = "Order";

        $random = Str::random(5);

        $cafe = Cafe::orderBy('name', 'ASC')
                    ->when(!empty($request->tipe), function($q) use($request){
                            return $q->where('category_id', 'like', '%'.$request->tipe . '%');
                    })
                    ->when(!empty($request->search), function($q) use($request){
                        return $q->where('name', 'like', '%'.$request->search . '%');
                    })->paginate(3);
        $mejas = Meja::all();
        $orders = Order::select('orders.id', 'cafes.name', 'orders.meja_id',
                                'orders.status_order', 'orders.total_price',
                                'orders.jumlah','orders.keterangan', 'cafes.price')
                        ->where('orders.status_order', 'Pending')
                        ->join('cafes', 'cafes.id', '=', 'orders.cefes_id')
                        ->orderBy('orders.created_at', 'DESC')
                        ->get();

        $total_harga = 0;
        for($i =0; $i < count($orders); $i++)
        {
            $total_harga += $orders[$i]->total_price;
        }


        return view('order.index', compact('title', 'cafe', 'mejas', 'orders', 'random', 'total_harga', 'hash'));
    }

    public function generateSignedUrl(Request $request, string $hash)
    {
        $mejaModel = Meja::where('link', $hash)->firstOrFail();
        $hashCode = md5(random_bytes(8));
        session(['hash' => $hashCode, 'meja' => $mejaModel]);
        return redirect(route('order.index', ['hash' => $hashCode]));
    }

    public function extractData(Request $request){
        if($request['number'] === "1"){
            return Excel::download(new OrderExport,"DataOrder.xlsx");
        }else if($request['number'] === "2"){
            return Excel::download(new OrderExport,"DataOrder.csv");
        }else{
            //return Excel::download(new NewsExport,"DataOrder.pdf");

            $data = Order::all();
            view()->share("order",$data);
            $pdf = \PDF::loadView('extract.order');
            return $pdf->download("DataOrder.pdf");
        }

    }

    public function notaOrder(string $no_order)
    {
        $data = Order::select('cafes.name as pesanan', 'cafes.price', 'mejas.no_meja', 'orders.keterangan', 'orders.jumlah', 'orders.total_price', 'orders.no_order')
                ->where('orders.status_order', 'Success')
                ->where('orders.no_order', $no_order)
                ->join('cafes', 'cafes.id', '=', 'orders.cefes_id')
                ->join('mejas', 'mejas.id', '=', 'orders.meja_id')
                ->orderBy('orders.created_at', 'ASC')->get();
                
                $total_harga = 0;
                for($i =0; $i < count($data); $i++)
                {
                    $total_harga += $data[$i]->total_price;
                }
                
               
        return PDF::loadView('extract.nota', compact('data', 'total_harga'))
                    ->stream('order_'.$no_order.'.pdf', array("attachment" => false));

    }

    public function detail($hash, $id)
    {
        $title = "Order";
        $data = Cafe::where('id', $id)->get();
        return view('order.detail', compact('data', 'title', 'hash'));
    }

    public function store(Request $request, $hash, $id)
    {
        $data = Cafe::where('id', $id)->get();
        $total = $data[0]->price * $request->jumlah;

        $keterangn = $request->input('keterangan');

        if(empty($request->jumlah))
        {
            return back()->with('failed', 'Jumlah belum di isi');
        }

        if(empty($keterangn))
        {
            $keterangn = "";
        }

        if($request->jumlah < 0)
        {
            return back()->with('failed', 'Harap Mengisi Jumlah Dengan Benar');
        }

        $session = session()->get('meja');


        $title = "Order";
        $order = new Order();
        $order->keterangan = $keterangn;
        $order->status_order = "Pending";
        $order->meja_id = $session->id;
        $order->cefes_id = $id;
        $order->jumlah = $request->jumlah;
        $order->total_price = $total;
        $order->save();

        return redirect(route('order.index', compact('hash')));
    }

    public function process(Request $request)
    {
        if(!$request->name)
        {
            return back()->with('failed', "Nama anda harap di isi. ");
        }
        $verif_code = random_int(10000, 99999);
        for($i=0; $i < count($request->id); $i++)
        {
            $order[$i] = Order::where('id', $request->id[$i])->first();
            $order[$i]->status_order = "Processing";
            $order[$i]->name = $request->name;
            $order[$i]->jenis_pembayaran = $request->jenis_pembayaran;
            $order[$i]->no_wa = $request->no_wa;
            $order[$i]->kode_verifikasi = $verif_code;
            $order[$i]->no_order = $request->no_order;
            $order[$i]->save();
        }
        return back()->with('success',
            "Pesanan Berhasil di proses dengan nomor order : ". $request->no_order . "</br>
            Bayar ".$request->jenis_pembayaran.". Dengan kode pembayaran : " . $verif_code);
    }


 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function new(Request $request) {

        $totalPrice = 0;
        foreach($request->pesanans as $pesanan) {
            $totalPrice += $pesanan['totalPrice'];
        }

        $orders = new Order;
        $orders->id = $request->id;
        $orders->meja_id = $request->meja_id;
        $orders->total_price = $totalPrice;
        $orders->keterangan = '';
        $orders->status_order = "Processing";
        $orders->save();
        foreach($request->pesanans as $pesanan) {
            $cafeDetail = new CafeDetail;
            $cafeDetail->order_id = $orders->id;
            $cafeDetail->cafes_id = $pesanan['id'];
            $cafeDetail->keterangan = '';
            $cafeDetail->quantity = $pesanan['quantity'];
            $cafeDetail->price = $pesanan['totalPrice'];
            $cafeDetail->status = 'Success';
            $cafeDetail->save();
        }

        return response()->json(['success' => true]);
    }
    public function nota_detail(Request $request){

    }
    public function cekPesanan(Request $request)
    {
        if($request->search == null)
        {
            $order = [];
        }
        else
        {
            $order =  Order::select('orders.created_at','orders.name', 'orders.meja_id', 'orders.no_order', 'orders.jenis_pembayaran', 'orders.status_order')
            // ->join('mejas', 'mejas.id', '=', 'orders.meja_id')
            ->when($request->search, function ($q) use ($request)
            {
             return $q->where('no_wa', 'like', '%' . $request->search . '%');
            })->orderBy('created_at', 'DESC')->get();
        }
        return view('/order/cekPesanan',['title'=> 'Order'], compact('order'));
    }
    public function delete($hash, $id)
    {
        $data = Order::where('id', $id)->delete();
        return redirect()
                ->route('order.index', compact('hash'))
                ->with('success',
                "Pesanan Berhasil di hapus");
    }
    public function destroyOrder($id)
    {
        $order = Order::where('id', $id)->first(); 
        $order_1 = Order::where('no_order', $order['no_order'])->count();       
        $data = Order::where('id', $id)->delete();
        if($order_1 > 1 )
        {
            return redirect('/cafe/order/pesanan?search='.$order['no_order'])
            ->with('success',
            "Pesanan Berhasil di hapus");
        }
        else
        {
            return redirect()
            ->route('order.pesanan.cafe')
            ->with('success',
            "Pesanan Berhasil di hapus");
        }
   
    }     
}
