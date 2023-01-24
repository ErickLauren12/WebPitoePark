<?php

namespace App\Http\Controllers;

use App\Cafe;
use App\CategoryFood;
use App\LogCafe;
use App\Meja;
use App\Detail;
use App\Order;
use App\Exports\CafeExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\Datatables;
use DB;
use PDF;

class CafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('cafe.index', [
            'title' => 'Cafe',
            'search' => "all",
            "result" => Cafe::latest()->filter(request(['search', 'category_id']))->paginate(6),
            "category" => CategoryFood::all()
        ]);
    }

    public function indexProcessOrder()
    {
        $orders = Order::select('orders.id', 'cafes.name as pesanan', 'orders.meja_id',
        'orders.status_order', 'orders.total_price', 'orders.created_at',
        'orders.jumlah', 'cafes.price', 'orders.keterangan', 'orders.name', 'orders.no_order')
            ->where('orders.status_order', 'Success')
            ->join('cafes', 'cafes.id', '=', 'orders.cefes_id')
            ->orderBy('orders.created_at', 'ASC')->paginate(10);
        return view('cafe.process', compact('orders'));
    }

    public function indexDoneOrder()
    {
        $orders = Order::select('orders.id', 'cafes.name as pesanan', 'orders.meja_id',
        'orders.status_order', 'orders.total_price', 'orders.created_at',
        'orders.jumlah', 'cafes.price', 'orders.keterangan', 'orders.name', 'orders.no_order')
            ->where('orders.status_order', 'Done')
            ->join('cafes', 'cafes.id', '=', 'orders.cefes_id')
            ->orderBy('orders.created_at', 'ASC')->get();
        return view('cafe.done', compact('orders'));
    }

    public function order(Request $request)
    {
        $order = [];
        if($request->search)
        {

            $order =  Order::select('orders.id', 'cafes.name as pesanan', 'orders.meja_id',
            'orders.status_order', 'orders.total_price',
            'orders.jumlah', 'cafes.price', 'orders.keterangan', 'orders.name', 'orders.no_order')
                ->when(!empty($request->search), function($q) use($request){
                    return $q->where('no_order', $request->search);
                })
                ->where('status_order', 'Processing')
                ->join('cafes', 'cafes.id', '=', 'orders.cefes_id')
                ->orderBy('orders.created_at', 'DESC')->get();

            if(count($order) == 0)
            {
                return back()->with('failed', 'Nomor order tidak ditemukan');
            }
        }
        $total_harga = 0;
        for($i =0; $i < count($order); $i++)
        {
            $total_harga += $order[$i]->total_price;
        }
        return view('cafe.order', compact('order','total_harga'));
    }

    public function pesananMasuk(Request $request)
    {
        $order = Order::where('orders.status_order', 'Processing')->groupBy('no_order')
                ->when($request->search, function ($q) use ($request) {
                 return $q->where('name', 'like', '%' . $request->search . '%');
                })->orderBy('created_at', 'DESC')->paginate(10);
        return view('cafe.pesanan-masuk', compact('order'));
    }

    public function detailPesananMasuk($id)
    {
        $order = Order::select('cafes.name as pesanan', 'cafes.price', 'orders.keterangan', 'orders.jumlah', 'orders.total_price', 'orders.name')
                ->where('orders.status_order', 'Processing')
                ->where('orders.id', $id)
                ->join('cafes', 'cafes.id', '=', 'orders.cefes_id')->orderBy('orders.created_at', 'ASC')->paginate(10);
        return view('cafe.detail-pesanan-masuk', compact('order'));
    }

    public function processOrder(Request $request)
    {
        $order = [];
        if(!empty($request->result))
        {
            $order = Order::when(!empty($request->result), function($q) use($request){
                return $q->where('no_order', $request->result)->where('status_order', 'Processing');
            })->get();
        }
        else
        {
            return back()->with('failed', "Pesanan tidak ditemukan");
        }

        // $verif_code = random_int(10000, 99999);

        for($i=0; $i < count($order); $i++)
        {
            $data[$i] = Order::where('id', $request->id[$i])->first();
            $data[$i]->status_order = "Success";
            // $data[$i]->jenis_pembayaran = $request->jenis_pembayaran;
            // $data[$i]->kode_verifikasi = $verif_code;
            $data[$i]->no_wa = $request->no_wa;
            $data[$i]->save();
        }
        return back('/cafe/order/pesanan')->with('order_complete', ['no_order' => $request->result]);
    }

    public function getData()
    {
        $orders = Order::select('orders.id', 'cafes.name as pesanan', 'orders.meja_id',
        'orders.status_order', 'orders.total_price', 'orders.created_at',
        'orders.jumlah', 'cafes.price', 'orders.keterangan', 'orders.name', 'orders.no_order')
            ->where('orders.status_order', 'Success')
            ->join('cafes', 'cafes.id', '=', 'orders.cefes_id')
            ->orderBy('orders.created_at', 'ASC');

        return Datatables::of($orders)
                ->addIndexColumn()
                ->addColumn('aksi', function($row){
                        return '<button href="#" data-id="'.$row->id.'" class="btn btn-primary modal-tab-acc">
                            <i class="bi bi-check"></i>
                            </button>
                            <button href="#" data-id="'.$row->id.'" class="btn btn-danger modal-tab-decline">
                                <i class="bi bi-x"></i>
                            </button>';
                })
                ->rawColumns(['aksi'])
                ->make(true);
    }

    public function indexDashBoard()
    {
        return view('cafe.cafedashboard', [
            'title' => 'Cafe',
            "result" => Cafe::latest()->where('account_id', auth()->user()->id)->paginate(6),
        ]);
    }

    public function indexDashBoardAdmin()
    {
        return view('cafe.cafedashboardadmin', [
            'title' => 'Cafe',
            "result" => Cafe::latest()->paginate(6),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cafe.create', [
            'title' => 'Create',
            'category' => CategoryFood::all()
        ]);
    }

    public function store(Request $request)
    {

        $credentials = $request->validate([
            'name' => ['required', 'max:255'],
            'image' => ['required', 'file'],
            'price' => ['required'],
            'category_id' => ['required'],
        ], [
            'name.required' => 'Name tidak boleh kosong.',
            'image.required'=>'Image tidak boleh kosong.',
            'price.required'=>'Price tidak boleh kosong.',
            'image.numeric'=>'Price harus berupa angka.',
        ]);

        $credentials['action'] = 'true';
        $credentials['account_id'] = auth()->user()->id;
        $result = Cafe::create($credentials);

        if(!empty($credentials['image']))
        {
            $file = $credentials['image'];
            $filename = "product_".time() . '.' . $file->getClientOriginalExtension();
            $filePath = base_path("public/assets/img");
            $file->move($filePath, $filename);
            $result->update([
                "image" => $filename
            ]);
        }

        $log = new LogCafe();
        $log->action = "Membuat";
        $log->id_cafe= $result->id;
        $log->id_account = auth()->user()->id;
        $log->save();

        return redirect('/cafe/dashboard')->with('success', 'New Menu Has Been Added');
    }

    public function done($id)
    {
        $data = Order::where('id', $id)->first();

        $data->status_order = "Done";
        $data->save();
        return back()->with('success', 'Pesanan telah diselesaikan dengan nomor order ' .$data->no_order);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cafe  $cafe
     * @return \Illuminate\Http\Response
     */
    public function show(Cafe $cafe)
    {
        //
    }

    public function history(Request $request)
    {
        $history = Order::select(
                        'name',
                        'meja_id',
                        'no_order',
                        'jenis_pembayaran',
                        'kode_verifikasi',
                        'created_at',
                        'no_wa',
                        'status_order',
                        DB::raw('SUM(total_price) as total_price'),
                        DB::raw('CONCAT("https://wa.me/62",
                            no_wa,
                            "/?text=Pembayaran%20pada%20Cafe%20Kendie%20Pitoe%20Park%20Berhasil.%0aKode%20Verifikasi:%20",
                            kode_verifikasi, "%0aTotal:%20Rp.", SUM(total_price), "%0a", created_at ) as wa_verif'))
                    ->where('status_order', '!=', 'Pending')
                    ->where('status_order', '!=', 'Processing')
                    ->when($request->search, function ($q) use ($request) {
                        return $q->where('name', 'like', '%' . $request->search . '%');
                    })
                    ->groupBy('no_order','kode_verifikasi')->orderBy('updated_at', 'DESC')->paginate(10);

        $jumlah = 0;
        for($i=0; $i < count($history); $i++)
        {
            $jumlah += $history[$i]->total_price;
        }

        return view('cafe.history', compact('history', 'jumlah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cafe  $cafe
     * @return \Illuminate\Http\Response
     */
    public function edit(Cafe $cafe)
    {
        return view('cafe.edit', [
            'title' => 'Edit',
            "cafe" => $cafe,
            "category" => CategoryFood::all()
        ]);
    }
    public function extractData(Request $request){
        if($request['number'] === "1"){
            return Excel::download(new CafeExport,"DataCafe.xlsx");
        }else if($request['number'] === "2"){
            return Excel::download(new CafeExport,"DataCafe.csv");
        }else{
            //return Excel::download(new NewsExport,"DataEvent.pdf");

            $data = Cafe::all();
            view()->share("cafe",$data);
            $pdf = \PDF::loadView('extract.cafe');
            return $pdf->download("DataCafe.pdf");
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cafe  $cafe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cafe $cafe)
    {
        $credentials = $request->validate([
            'name' => ['required', 'max:255'],
            'image' => ['image', 'file'],
            'price' => ['required'],
            'category_id' => ['required'],
            'action'=>['required']
        ],[
            'name.required' => 'Name tidak boleh kosong.',
            'price.required'=>'Price tidak boleh kosong.',
        ]);

        $credentials['account_id'] = auth()->user()->id;

        $result = Cafe::where('id', $cafe['id'])->first();
        $result->update($credentials);
        if(!empty($credentials['image']))
        {
            $file = $credentials['image'];
            $filename = "product_".time() . '.' . $file->getClientOriginalExtension();
            $filePath = base_path("public/assets/img");
            $file->move($filePath, $filename);
            $result->update([
                "image" => $filename
            ]);
        }



        $log = new LogCafe();
        $log->action = "Mengubah";
        $log->id_cafe = $cafe['id'];
        $log->id_account = auth()->user()->id;
        $log->save();

        return redirect('/cafe/dashboard')->with('success', 'The event has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cafe  $cafe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cafe $cafe)
    {
        if ($cafe['image']) {
            Storage::delete($cafe['image']);
        }
        Cafe::destroy($cafe->id);

        $log = new LogCafe();
        $log->action = "Menghapus";
        $log->id_cafe = $cafe['id'];
        $log->id_account = auth()->user()->id;
        $log->save();

        return redirect('/cafe/dashboard')->with('success', 'Menu berhasil di hapus');
    }

    public function confirmation(Cafe $cafe)
    {
        $cafe->status = "Accepted";
        $cafe->message = "";
        $cafe->save();
        return redirect()->back()->with('success', 'Verifikasi Menu Berhasil. Menut telah ditampilkan di halaman Cafe');
    }

    public function reject(Request $request, Cafe $cafe)
    {
        $cafe->status = "Rejected";
        $cafe->message = $request['message'];
        $cafe->save();
        return redirect()->back()->with('success', 'Menu Berhasil Ditolak');
    }

    public function search(Request $request)
    {
        if ($request['type'] == "superadmin") {
            return view('cafe.cafedashboardadmin', [
                'title' => 'Cafe',
                "result" => Cafe::latest()->where("name", "like", "%" . $request['search'] . "%")->paginate(6)->withQueryString()
            ]);
        } else {
            return view('cafe.cafedashboard', [
                'title' => 'Cafe',
                'result' => Cafe::where('account_id', auth()->user()->id)->where("name", "like", "%" . $request['search'] . "%")->paginate(6)->withQueryString()
            ]);
        }
    }
}
