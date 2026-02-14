@extends('admin.layout')

@section('content')
    <h1 class="h3 fw-bold mb-3">Facebook Pixel Setup</h1>
    <div class="card card-soft">
        <div class="card-body">
            <form action="{{ route('admin.settings.pixel.update') }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold" for="facebook_pixel_id">Facebook Pixel ID</label>
                    <input type="text" name="facebook_pixel_id" id="facebook_pixel_id" class="form-control @error('facebook_pixel_id') is-invalid @enderror" value="{{ old('facebook_pixel_id', $pixelId) }}" placeholder="Example: 123456789012345">
                    @error('facebook_pixel_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    <small class="text-muted">Leave empty to disable Pixel tracking on home and checkout pages.</small>
                </div>
                <button class="btn btn-success">Save Pixel Settings</button>
            </form>
        </div>
    </div>
@endsection
