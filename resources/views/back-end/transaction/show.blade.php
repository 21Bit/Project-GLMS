@extends('layouts.back-end')

@section('title', 'All Transaction | ' . config("app.name"))

@section('content')
	
    <ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item active">All Transaction</li>
		<li class="breadcrumb-item active">{{ $transaction->reference_number }}</li>
	</ol>

	<!-- begin page-header -->
	<h1 class="page-header">Transaction</h1>
	<!-- end page-header -->

	<div class="invoice">
        <!-- begin invoice-company -->
        <div class="invoice-company text-inverse f-w-600">
            <span class=" hidden-print">
            <a href="{{ route('back-end.transaction.index') }}" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-ban t-plus-1  fa-fw fa-lg"></i> Back</a>
        </span>
        
        </div>
        

        <div class="invoice-content">
            
            <div class="invoice-price">
                <div class="invoice-price-left">
                    <div class="invoice-price-row">
                        <div class="sub-price">
                            <small>CREDITS</small>
                            <span class="text-inverse">{{ $transaction->credits }}</span>
                        </div>
                        <div class="sub-price">
                            <small>TOTAL PRICE</small>
                            <span class="text-inverse">${{ number_format($transaction->price) }}</span>
                        </div>
                        <div class="sub-price">
                            <small>PAYMENT METHOD</small>
                            <span class="text-inverse">{{ strtoupper($transaction->payment_method) }}</span>
                        </div>
                        <div class="sub-price">
                            <small>REF #</small>
                            <span class="text-inverse">{{ $transaction->reference_number }}</span>
                        </div>
                    </div>
                </div>
                <div class="invoice-price-right  @if($transaction->status == "Pending") bg-warning @else bg-success @endif">
                    <small>STATUS</small> <span class="f-w-600">
                        {{ strtoupper($transaction->status) }}
                    </span>
                </div>
            </div>
            <div class="p-5 mt-4">
                <div class="row">
                    <div class="col-sm-6">
                        <p>
                            <h5>{{ optional($transaction->user)->name }}</h5>
                            <label for="" class="text-muted" >STUDENT</label>
                        </p>
                        <p>
                            <h5>{{ optional($transaction->processedBy)->name }}</h5>
                            <label class="text-muted" >PROCESSED BY</label>
                        </p>
                        <p>
                            <h5>{{ $transaction->created_at }}</h5>
                            <label class="text-muted" >PROCESSED ON</label>
                        </p>

                        @if($transaction->data)
                            <p>
                                <h5>DATA INFORMATIONS</h5>
                                <table class="text-inverse">
                                    @foreach($transaction->data as $key => $value)
                                        <tr>
                                            <td> {{ ucwords(str_replace("_", " ", $key)) }}</td>
                                            <td>: {{ $value }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                                @if($transaction->payment_method == "bank")
                                    @if($transaction->status == "Pending")
                                        <button data-toggle="modal" data-target="#validateModal" class="btn btn-success btn-lg mt-2"><i class="fa fa-check-circle"></i> Validated</button>
                                    @endif
                                @endif
                            </p>
                        @endif

                    </div>
                    <div class="col-sm-6"></div>
                </div>
                <a href="#"  data-toggle="modal" data-target="#deleteTransactionModal" class="text-danger pull-right text-sm delete-transaction-link"><i class="fa fa-trash"></i> Delete this Transaction</a>    
            </div>
        </div>
      
    </div>
    <!-- end invoice -->
	<div class="modal" id="validateModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <form action="{{ route('back-end.transaction.validated', $transaction->id) }}" method="post">
                        @csrf
                        <h2>
                            VALIDATE
                        </h2>
                        <p>
                            Upon validating, this transaction status will turn to Paid and credtis will adds up to the student who purchase this transaction
                        </p>
                        <button class="btn btn-success btn-md" type="submit"> Yes!, Its Validated</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end invoice -->
	<div class="modal" id="deleteTransactionModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <form action="{{ route('back-end.transaction.destroy', $transaction->id) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <h2>
                            DELETE
                        </h2>
                        <p>
                            Are you sure to delete this transaction?
                        </p>
                        <button class="btn btn-danger btn-md" type="submit"> Yes!, I am sure</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
