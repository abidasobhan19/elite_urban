@extends('layouts.public')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h1 class="h3 fw-bold text-success mb-2">Property Checkout / Lead Form</h1>
                    <p class="text-muted mb-4">Submit your requirement and our advisor will contact you with matching properties.</p>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('checkout.store') }}" method="post" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-semibold">Full Name *</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label fw-semibold">Phone *</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="property_type" class="form-label fw-semibold">Interested In *</label>
                            <select class="form-select @error('property_type') is-invalid @enderror" id="property_type" name="property_type" required>
                                <option value="">Choose type</option>
                                @foreach(['land' => 'Land', 'flat' => 'Flat', 'house' => 'House', 'commercial' => 'Commercial', 'other' => 'Other'] as $key => $value)
                                    <option value="{{ $key }}" @selected(old('property_type') === $key)>{{ $value }}</option>
                                @endforeach
                            </select>
                            @error('property_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label for="budget" class="form-label fw-semibold">Budget</label>
                            <input type="text" class="form-control @error('budget') is-invalid @enderror" id="budget" name="budget" value="{{ old('budget') }}" placeholder="Example: $50,000 - $100,000">
                            @error('budget')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label fw-semibold">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="4" placeholder="Location, area size, or special requirements">{{ old('message') }}</textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-brand px-4">Submit Lead</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
