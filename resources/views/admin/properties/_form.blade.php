<div class="row g-3">
    <div class="col-md-8">
        <label for="title" class="form-label fw-semibold">Title *</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $property->title ?? '') }}" required>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label for="type" class="form-label fw-semibold">Type *</label>
        <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
            <option value="">Select</option>
            @foreach(['land' => 'Land', 'flat' => 'Flat', 'house' => 'House', 'commercial' => 'Commercial', 'other' => 'Other'] as $key => $label)
                <option value="{{ $key }}" @selected(old('type', $property->type ?? '') === $key)>{{ $label }}</option>
            @endforeach
        </select>
        @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-4">
        <label for="price" class="form-label fw-semibold">Price</label>
        <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $property->price ?? '') }}">
        @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label for="location" class="form-label fw-semibold">Location</label>
        <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $property->location ?? '') }}">
        @error('location')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-4">
        <label for="area" class="form-label fw-semibold">Area</label>
        <input type="text" name="area" id="area" class="form-control @error('area') is-invalid @enderror" value="{{ old('area', $property->area ?? '') }}">
        @error('area')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-md-6">
        <label for="image" class="form-label fw-semibold">Image {{ isset($property) ? '' : '*' }}</label>
        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*" {{ isset($property) ? '' : 'required' }}>
        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
    <div class="col-md-6">
        <label for="video" class="form-label fw-semibold">Video (optional)</label>
        <input type="file" name="video" id="video" class="form-control @error('video') is-invalid @enderror" accept="video/*">
        @error('video')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-12">
        <label for="description" class="form-label fw-semibold">Description</label>
        <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description', $property->description ?? '') }}</textarea>
        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_published" value="1" id="is_published" @checked(old('is_published', $property->is_published ?? true))>
            <label class="form-check-label" for="is_published">Published</label>
        </div>
    </div>
</div>
