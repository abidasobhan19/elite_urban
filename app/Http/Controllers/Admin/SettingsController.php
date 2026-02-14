<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function edit(): View
    {
        return view('admin.settings.edit', [
            'pixelId' => SiteSetting::getValue('facebook_pixel_id'),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'facebook_pixel_id' => ['nullable', 'regex:/^\d+$/', 'max:30'],
        ]);

        SiteSetting::setValue('facebook_pixel_id', $data['facebook_pixel_id'] ?? null);

        return redirect()->route('admin.settings.pixel.edit')
            ->with('success', 'Facebook Pixel configuration updated.');
    }
}
