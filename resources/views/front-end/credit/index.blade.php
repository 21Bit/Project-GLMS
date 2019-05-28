@extends('layouts.front-end')

@section('title', "Credits")

@section("content")
    <div id="page-header" class="section-container page-header-container bg-black">
        <!-- BEGIN page-header-cover -->
        <div class="page-header-cover">
            <img src="/img/cover/cover-11.jpg" alt="" />
        </div>
        <!-- END page-header-cover -->
        <!-- BEGIN container -->
        <div class="container">
            <h1 class="page-header"><b>Credits</b></h1>
        </div>
        <!-- END container -->
    </div>
       <div id="about-us-cover" class="section-container">
           
            <div class="container">
                <form action="{{ route('front-end.credit.save') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-9">
                            <h1 class="text-success mb-5">Feature Offers</h1>
                            <div class="row">
                                @foreach($featured as $feature)
                                    <div class="col-sm-3 col-xs-6">
                                        <div class="credit-box">
                                            <input class="checkbox" data-credits="{{ $feature->credit }}" data-price="{{ $feature->price }}" type="checkbox" id="box-{{ $feature->id }}" name="package[]" value="{{ $feature->id }}"  @if(increditPackages($feature->id)) checked @endif >
                                            <label for="box-{{ $feature->id }}">
                                                <div class="box shadow text-center">
                                                    <div class="ribbon"><span>Selected</span></div>
                                                    <h2 class="text-danger">{{ $feature->credit }}</h2>
                                                    <span for="" class="d-block text-info">Credits for P{{ number_format($feature->price) }}</span> <br />
                                                    <p class="text-muted">
                                                        {{ $feature->note }}
                                                    </p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>
                            @if(count($packages))
                                <h3>Other Offers</h3>
                                    <div class="row">
                                        @foreach($packages as $package)
                                            <div class="col-sm-3 col-xs-6">
                                                <div class="credit-box">
                                                    <input  data-credits="{{ $package->credit }}" data-price="{{ $package->price }}" class="checkbox" type="checkbox" id="box-{{ $package->id }}" name="package[]" value="{{ $package->id }}" @if(increditPackages($package->id)) checked @endif >
                                                    <label for="box-{{ $package->id }}">
                                                        <div class="box shadow text-center">
                                                            <div class="ribbon"><span>Selected</span></div>
                                                            <h2 class="text-danger">{{ $package->credit }}</h2>
                                                            <span for="" class="d-block text-info">Credits for P{{ number_format($package->price) }}</span> <br />
                                                            <p class="text-muted">
                                                                {{ $package->note }}
                                                            </p>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                            @endif
                        </div>
                        <div class="col-sm-3 text-center">
                            <div data-fixed-top="true">

                                <h3 class="mb-5">Summary</h3>
                                
                                <h2 class="text-warning" id="total-credits">{{ number_format(totalCreditPackages('credit')) }}</h2>
                                <label class="text-muted">Credits</label>
                                <hr>
                                
                                <h2 class="text-warning" >$<span id="total-price">{{ number_format(totalCreditPackages('price')) }}</span></h2>
                                <label class="text-muted">Price</label>
                                <hr>
                                
                                <button type="submit" class="btn btn-block btn-success btn-lg">Proceed</button>
                        </div>
                            
                        </div>
                    </div>
                </form>
            </div>
            <!-- End of Container -->

        </div>
@endsection