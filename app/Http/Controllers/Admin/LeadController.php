<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeadController extends Controller
{
    public function index(Request $request): View
    {
        $from = $request->query('from');
        $to = $request->query('to');

        $leadsQuery = Lead::query()->latest();
        $summaryQuery = Lead::query();

        if ($from) {
            $leadsQuery->whereDate('created_at', '>=', $from);
            $summaryQuery->whereDate('created_at', '>=', $from);
        }

        if ($to) {
            $leadsQuery->whereDate('created_at', '<=', $to);
            $summaryQuery->whereDate('created_at', '<=', $to);
        }

        return view('admin.leads.index', [
            'leads' => $leadsQuery->paginate(20)->withQueryString(),
            'dateSummary' => $summaryQuery
                ->selectRaw('DATE(created_at) as lead_date, COUNT(*) as total')
                ->groupBy('lead_date')
                ->orderByDesc('lead_date')
                ->get(),
            'from' => $from,
            'to' => $to,
        ]);
    }
}
