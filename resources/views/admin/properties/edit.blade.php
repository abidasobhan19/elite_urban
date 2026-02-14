@extends('admin.layout')

@section('content')
    <h1 class="h3 fw-bold mb-3">Edit Property</h1>
    <div class="card card-soft">
        <div class="card-body">
            <form action="{{ route('admin.properties.update', $property) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.properties._form')
                <div class="mt-3 d-flex gap-2">
                    <button class="btn btn-success">Update Property</button>
                    <a href="{{ route('admin.properties.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>

            @if($property->image_path || $property->video_path)
                <hr>
                <h2 class="h6 fw-bold">Current Media</h2>
                @if($property->image_path)
                    <p class="mb-2"><img src="{{ asset('storage/'.$property->image_path) }}" alt="" style="max-width: 300px;" class="rounded border"></p>
                @endif
                @if($property->video_path)
                    <video controls style="max-width: 380px;" class="rounded border">
                        <source src="{{ asset('storage/'.$property->video_path) }}">
                    </video>
                @endif
            @endif
        </div>
    </div>
@endsection
