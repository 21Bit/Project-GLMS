@extends('layouts.front-end')

@section('title', "Credits")

@section("content")
        <!-- BEGIN page-header-cover -->
        {{-- <div class="page-header-cover">
            <img src="/img/cover/cover-11.jpg" alt="" />
        </div> --}}
        <!-- END page-header-cover -->
        <!-- BEGIN container -->
        {{-- <div class="container">
            <h1 class="page-header"><b>Credits</b></h1>
        </div> --}}
        <!-- END container -->

    <div id="about-us-cover" class="section-container">
        <div class="container">
            <h1 class="text-center text-success mb-5">Congratulations!</h1>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

               
                    <!-- BEGIN row -->
                    <div class="row">
                        <!-- BEGIN col-6 -->
                        <div class="col-md-8">
                            <h4 class="text-danger">Purchase Information</h4>
                            <table class="">
                                <tr>
                                    <td>Credit: </td>
                                    <td>{{ number_format($transaction->credits) }}</td>
                                </tr>
                            </table>
                            <ul class="nav nav-list">
                                <li>Price: ${{ number_format($transaction->price) }}</li>
                                <li>Payment Method: {{ strtoupper($transaction->payment_method) }}</li>

                                @if($transaction->payment_method == "bank")
                                    <li>Depositor: {{ $transaction->data->name_of_depositor  }} </li>
                                    <li>Date of Payment: {{ date('M d, Y',strtotime($transaction->data->date_of_payment)) }}</li>
                                @endif
                               
                            </ul>
                            <h4 class="text-danger mt-5">Account Information</h4>
                            <ul class="nav nav-list">
                                <li>Name: {{ Auth::user()->name }}</li>
                                <li>Username: {{ Auth::user()->username }}</li>
                                <li>Credits: {{ Auth::user()->credits }}</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ getDashBoardLink() }}" class="btn btn-lg btn-block p-4 mt-5 mb-2 btn-info">My Dashboard</a>
                            or back to <a href="/">Homepage</a>
                        </div>
                    </div>
                    
                    <!-- END row -->
                </div>
            </div>  
        </div>
    </div>
@endsection