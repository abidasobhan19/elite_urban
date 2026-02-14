@extends('layouts.public')

@section('content')
    <section class="hero-block mb-5">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <p class="text-uppercase small fw-semibold mb-2">Land Investment Marketplace</p>
                <h1 class="display-5 fw-bold mb-3">Buy premium land plots in fast-growing zones</h1>
                <p class="lead mb-4">Explore verified land listings, schedule a visit, and close quickly with our support team.</p>
                <a href="{{ route('checkout.show') }}" class="btn btn-warning fw-semibold px-4 py-2">Checkout & Submit Lead</a>
            </div>
            <div class="col-lg-5 mt-4 mt-lg-0">
                <div class="bg-white text-dark rounded-4 p-4 shadow-sm">
                    <h2 class="h5 fw-bold mb-3">Why buyers choose us</h2>
                    <ul class="mb-0">
                        <li class="mb-2">Verified land records and location checks</li>
                        <li class="mb-2">Transparent pricing for plots and registry support</li>
                        <li>Dedicated advisor from inquiry to possession</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="section-title h3 mb-0">Available Land Listings</h2>
            <a href="{{ route('checkout.show') }}" class="btn btn-outline-success">Need Help Choosing?</a>
        </div>

        @if($landProperties->isEmpty())
            <div class="alert alert-info">No land listings yet. Check back shortly or submit your requirement from checkout.</div>
        @else
            <div class="row g-4">
                @foreach($landProperties as $property)
                    <div class="col-md-6 col-lg-4">
                        <article class="card property-card h-100">
                            @if($property->image_path)
                                <img class="property-image" src="{{ asset('storage/'.$property->image_path) }}" alt="{{ $property->title }}">
                            @endif
                            <div class="card-body">
                                <h3 class="h5 fw-bold">{{ $property->title }}</h3>
                                <p class="mb-2 text-muted">{{ $property->location ?: 'Location shared on request' }}</p>
                                <p class="mb-2"><strong>Area:</strong> {{ $property->area ?: 'NA' }}</p>
                                <p class="mb-3"><strong>Price:</strong> {{ $property->price ?: 'On request' }}</p>
                                <a href="{{ route('checkout.show') }}" class="btn btn-sm btn-brand">Book This Property</a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
