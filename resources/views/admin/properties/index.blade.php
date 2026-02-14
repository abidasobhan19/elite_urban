@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 fw-bold mb-0">Properties</h1>
        <a href="{{ route('admin.properties.create') }}" class="btn btn-success">Add New Property</a>
    </div>

    <div class="card card-soft">
        <div class="card-body table-responsive">
            <table class="table align-middle">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($properties as $property)
                    <tr>
                        <td>{{ $property->title }}</td>
                        <td class="text-capitalize">{{ $property->type }}</td>
                        <td>{{ $property->price ?: 'On request' }}</td>
                        <td>
                            @if($property->is_published)
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td>{{ $property->created_at->format('Y-m-d') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.properties.edit', $property) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('admin.properties.destroy', $property) }}" method="post" class="d-inline-block" onsubmit="return confirm('Delete this property?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">No properties added yet.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $properties->links() }}
    </div>
@endsection
