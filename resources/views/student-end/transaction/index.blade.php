@extends('layouts.student')

@section('title', "My Page | Transactions")

@section('header')
    <div class="panel-header panel-header-sm">
    </div>
@endsection

@section("content")
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="title">Transaction</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="text-primary">
                        <tr>
                            <th>Date/Time</th>
                            <th>Credits</th>
                            <th>Amount</th>
                            <th>Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ date('M d, Y', strtotime($transaction->created_at)) }}</td>
                                <td>{{ $transaction->credits }}</td>
                                <td>${{ number_format($transaction->price, 2) }}</td>
                                <td>{{ $transaction->payment_method }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection