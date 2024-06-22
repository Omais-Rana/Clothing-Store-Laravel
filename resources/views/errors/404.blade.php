@extends('layouts.app')
@section('content')
    <section class="error pt-130 pb-130">
        <div class="container mt-120">
            <h1>4<span class="primary-color">0</span>4</h1>
            <h2>Oops! Page Not Found.</h2>
            <p>The page you are looking for does not exist.</p>
            <a href="{{ url('/') }}" class="btn-one mt-40">
                <span><i class="fa-regular me-2 fa-angles-left"></i> Back
                    Home</span></a>
        </div>
    </section>
@endsection
