<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Property;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'totalProperties' => Property::query()->count(),
            'publishedLand' => Property::query()->where('type', 'land')->where('is_published', true)->count(),
            'totalLeads' => Lead::query()->count(),
            'todayLeads' => Lead::query()->whereDate('created_at', today())->count(),
        ]);
    }
}
