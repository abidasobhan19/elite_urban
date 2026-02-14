@extends('admin.layout')

@section('content')
    <h1 class="h3 fw-bold mb-4">Dashboard</h1>
    <div class="row g-3">
        <div class="col-lg-3 col-sm-6">
            <div class="card card-soft">
                <div class="card-body">
                    <p class="text-muted mb-1">Total Properties</p>
                    <p class="display-6 fw-bold mb-0">{{ $totalProperties }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-soft">
                <div class="card-body">
                    <p class="text-muted mb-1">Published Land</p>
                    <p class="display-6 fw-bold mb-0">{{ $publishedLand }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-soft">
                <div class="card-body">
                    <p class="text-muted mb-1">Total Leads</p>
                    <p class="display-6 fw-bold mb-0">{{ $totalLeads }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-soft">
                <div class="card-body">
                    <p class="text-muted mb-1">Today Leads</p>
                    <p class="display-6 fw-bold mb-0">{{ $todayLeads }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
