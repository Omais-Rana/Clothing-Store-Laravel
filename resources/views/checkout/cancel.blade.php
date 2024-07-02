@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Payment Canceled</h1>
        <p>Your payment has been canceled. If you have any questions, please contact support.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Return to Home</a>
    </div>
@endsection
