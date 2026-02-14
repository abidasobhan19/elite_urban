<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function show(): View
    {
        return view('checkout', [
            'pixelId' => SiteSetting::getValue('facebook_pixel_id'),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'property_type' => ['required', 'in:land,flat,house,commercial,other'],
            'budget' => ['nullable', 'string', 'max:60'],
            'message' => ['nullable', 'string', 'max:1200'],
        ]);

        Lead::query()->create($data);

        return redirect()->route('checkout.show')
            ->with('success', 'Your request has been submitted. Our team will contact you soon.');
    }
}
