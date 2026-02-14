<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\SiteSetting;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $landProperties = Property::query()
            ->published()
            ->where('type', 'land')
            ->latest()
            ->take(12)
            ->get();

        return view('home', [
            'landProperties' => $landProperties,
            'pixelId' => SiteSetting::getValue('facebook_pixel_id'),
        ]);
    }
}
