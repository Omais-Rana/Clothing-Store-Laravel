@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb" class="w-100 float-left">
        <ol class="breadcrumb parallax justify-content-center" data-source-url="{{ asset('assets/img/banner/parallax.jpg') }}"
            style="background-image: url(&quot;img/banner/parallax.jpg&quot;); background-position: 50% 0.809717%;">
            <li class="breadcrumb-item active"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order Confirmation</li>
        </ol>
    </nav>

    <div class="order-inner float-left w-100">
        <div class="container">
            <div class="row">
                <div id="order-confirmation" class="card float-left w-100 mb-10">
                    <div class="card-block p-20">
                        <h3 class="card-title text-success">Purchase Successful</h3>
                        <p>
                            A confirmation email will be sent shortly to your mail address.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
