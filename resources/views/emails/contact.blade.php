@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Payment Successful!</h1>
        <p>Thank you for your order. Your payment was processed successfully.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Return to Home</a>
    </div>
@endsection
