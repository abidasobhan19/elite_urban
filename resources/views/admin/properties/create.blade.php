@extends('admin.layout')

@section('content')
    <h1 class="h3 fw-bold mb-3">Add Property</h1>
    <div class="card card-soft">
        <div class="card-body">
            <form action="{{ route('admin.properties.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('admin.properties._form')
                <div class="mt-3 d-flex gap-2">
                    <button class="btn btn-success">Save Property</button>
                    <a href="{{ route('admin.properties.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
