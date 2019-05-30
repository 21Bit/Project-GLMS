<?php

namespace App\Http\Controllers\BackEnd;

use DataTables;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        if(request()->stat){
            if(request()->stat == "today"){
                $transactions = Transaction::whereDate('created_at', date('Y-m-d'));
            }else{
                $transactions = Transaction::where('status', ucfirst(request()->stat));
            }
        }else{
            $transactions = Transaction::query();
        }
        
        if(request()->ajax()){
            return DataTables::of($transactions)
                ->addColumn('action', function ($transaction) {
                    $buttons = '';
                    $buttons .= '<a href="' . route('back-end.transaction.show', $transaction->id) . '" class="edittransaction mr-3">Show </a>';
                    $buttons .= '<a href="' . route('back-end.transaction.edit', $transaction->id) . '" class="edittransaction ">Edit </a>';
                    return $buttons;
                })
                ->addColumn('check', function ($transaction) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $transaction->id . '" >';
                })
                ->addColumn('user', function ($transaction) {
                    return optional($transaction->user)->name;
                })
                ->addColumn('payment_method', function ($transaction) {
                    return strtoupper($transaction->payment_method);
                })
                ->addColumn('price', function ($transaction) {
                    return "$" . number_format($transaction->price);
                })
                ->addColumn('status', function ($transaction) {
                    return $transaction->status == "Pending" ? "<span class='bg-secondary text-white alert text-center d-block alert-secondary p-4 rounded-0'>PENDING</span>" : "<span class='alert text-center d-block alert-success bg-success text-white p-4 rounded-0'>VERIFIED</span>";
                })
                ->rawColumns(['check', 'action', 'status'])
                ->make(true);
        }

        $html = $builder
            ->parameters([
                'responsive' => true
            ])
            ->columns([
            [
                'data' => 'check',
                'name' => '',
                'title' => '<input type="checkbox" id="checkAll" >',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
                'width'          => "20px"
            ],
            [
                'data'  => 'status', 
                'name'  => 'status', 
                'title' => "Status",
                'width' => "25px"
            ],
            [
                'data' => 'user', 
                'name' => 'user', 
                'title' => "Student"
            ],
            [
                'data' => 'price', 
                'name' => 'price', 
                'title' => "Price"
            ],
            [
                'data' => 'payment_method', 
                'name' => 'payment_method', 
                'title' => "Payment Method"
            ],
            [
                'data' => 'credits', 
                'name' => 'credits', 
                'title' => "credits"
            ],
          
            [
                'data' => 'created_at', 
                'name' => 'created_at', 
                'title' => "On"
            ],
            [
                'defaultContent' => '',
                'data'           => 'action',
                'name'           => 'action',
                'title'          => '',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
                'footer'         => '',
                'class'          => 'text-right'
            ],
    
        ]);

        return view('back-end.transaction.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view("back-end.transaction.show", compact("transaction"));
    }

    public function validated(Request $request, $id){
        $transaction = Transaction::findOrFail($id);
        $transaction->status = "Paid";
        $transaction->save();

        //pass credit to the student's credits
        $transaction->passCredit();

        if(!$request->ajax()){
            return back();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function deletemultiple(Request $request)
    {
        $ids = $request->item_checked;
        if(count($ids)){
            foreach($ids as $id){
                $transaction = Transaction::find($id);
                $transaction->delete();
            }
        }

        if(!$request->ajax()){
            return redirect()->back()->with('message', Lang::get('label.item_deleted'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id)->delete();
        return redirect()->route('back-end.transaction.index');
    }
}
