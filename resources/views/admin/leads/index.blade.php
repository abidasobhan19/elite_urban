@extends('admin.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 fw-bold mb-0">Leads</h1>
    </div>

    <div class="card card-soft mb-3">
        <div class="card-body">
            <form method="get" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label">From Date</label>
                    <input type="date" name="from" class="form-control" value="{{ $from }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">To Date</label>
                    <input type="date" name="to" class="form-control" value="{{ $to }}">
                </div>
                <div class="col-md-4">
                    <button class="btn btn-success me-2">Filter</button>
                    <a href="{{ route('admin.leads.index') }}" class="btn btn-outline-secondary">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="row g-3 mb-3">
        @forelse($dateSummary as $row)
            <div class="col-md-3 col-sm-6">
                <div class="card card-soft">
                    <div class="card-body">
                        <p class="text-muted mb-1">{{ \Illuminate\Support\Carbon::parse($row->lead_date)->format('M d, Y') }}</p>
                        <p class="h4 mb-0 fw-bold">{{ $row->total }} lead(s)</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info mb-0">No leads found for selected date range.</div>
            </div>
        @endforelse
    </div>

    <div class="card card-soft">
        <div class="card-body table-responsive">
            <table class="table align-middle">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Interest</th>
                    <th>Budget</th>
                    <th>Date</th>
                    <th>Message</th>
                </tr>
                </thead>
                <tbody>
                @forelse($leads as $lead)
                    <tr>
                        <td>{{ $lead->name }}</td>
                        <td>
                            <div>{{ $lead->phone }}</div>
                            <small class="text-muted">{{ $lead->email ?: '-' }}</small>
                        </td>
                        <td class="text-capitalize">{{ $lead->property_type }}</td>
                        <td>{{ $lead->budget ?: '-' }}</td>
                        <td>{{ $lead->created_at->format('Y-m-d H:i') }}</td>
                        <td>{{ $lead->message ?: '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">No leads available.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $leads->links() }}
    </div>
@endsection
