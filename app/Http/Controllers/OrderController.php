<?php

namespace App\Http\Controllers;
use App\Order;
use App\CafeDetail;
use App\CategoryFood;
use App\Cafe;
use App\Meja;
use Auth;
use Session;
use Illuminate\Support\Str;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\Datatables;

class OrderController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $title = "Order";

        $random = Str::random(5);

        $cafe = Cafe::orderBy('name', 'ASC')
                    ->when(!empty($request->tipe), function($q) use($request){
                            return $q->where('category_id', 'like', '%'.$request->tipe . '%');
                    })->get();
        $mejas = Meja::all();
        $orders = Order::select('orders.id', 'cafes.name', 'orders.meja_id',
                                'orders.status_order', 'orders.total_price',
                                'orders.jumlah', 'cafes.price')
                        ->where('orders.status_order', 'Pending')
                        ->join('cafes', 'cafes.id', '=', 'orders.cefes_id')
                        ->orderBy('orders.created_at', 'DESC')
                        ->get();

        $total_harga = 0;
        for($i =0; $i < count($orders); $i++)
        {
            $total_harga += $orders[$i]->total_price;
        }


        return view('order.index', compact('title', 'cafe', 'mejas', 'orders', 'random', 'total_harga'));
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

    public function detail($id)
    {
        $title = "Order";
        $data = Cafe::where('id', $id)->get();
        return view('order.detail', compact('data', 'title'));
    }

    public function store(Request $request, $id)
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

        $session = Session::get('nomor_meja');

        if(!$session)
        {
            return back()->with('failed', "Harap Melakukan Scan Qr Code ketika akan memesan");
        }

        $title = "Order";
        $order = new Order();
        $order->keterangan = $keterangn;
        $order->status_order = "Pending";
        $order->meja_id = $session;
        $order->cefes_id = $id;
        $order->jumlah = $request->jumlah;
        $order->total_price = $total;
        $order->save();

        return redirect('/order');
    }

    public function process(Request $request)
    {
        if(!$request->name)
        {
            return back()->with('failed', "Nama anda harap di isi. ");
        }
        for($i=0; $i < count($request->id); $i++)
        {
            $order[$i] = Order::where('id', $request->id[$i])->first();
            $order[$i]->status_order = "Processing";
            $order[$i]->name = $request->name;
            $order[$i]->no_order = $request->no_order;
            $order[$i]->save();
        }
        return back()->with('success', "Pesanan Berhasil di proses dengan nomor order : ". $request->no_order);
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

    public function delete($id)
    {
        $data = Order::where('id', $id)->delete();
        return back();
    }
}
