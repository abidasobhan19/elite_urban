<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PropertyController extends Controller
{
    public function index(): View
    {
        return view('admin.properties.index', [
            'properties' => Property::query()->latest()->paginate(12),
        ]);
    }

    public function create(): View
    {
        return view('admin.properties.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateProperty($request);
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('properties/images', 'public');
        }

        if ($request->hasFile('video')) {
            $data['video_path'] = $request->file('video')->store('properties/videos', 'public');
        }

        $data['slug'] = $this->createSlug($data['title']);

        Property::query()->create($data);

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property added successfully.');
    }

    public function edit(Property $property): View
    {
        return view('admin.properties.edit', [
            'property' => $property,
        ]);
    }

    public function update(Request $request, Property $property): RedirectResponse
    {
        $data = $this->validateProperty($request, true);
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('image')) {
            if ($property->image_path) {
                Storage::disk('public')->delete($property->image_path);
            }
            $data['image_path'] = $request->file('image')->store('properties/images', 'public');
        }

        if ($request->hasFile('video')) {
            if ($property->video_path) {
                Storage::disk('public')->delete($property->video_path);
            }
            $data['video_path'] = $request->file('video')->store('properties/videos', 'public');
        }

        if ($property->title !== $data['title']) {
            $data['slug'] = $this->createSlug($data['title']);
        }

        $property->update($data);

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property): RedirectResponse
    {
        if ($property->image_path) {
            Storage::disk('public')->delete($property->image_path);
        }

        if ($property->video_path) {
            Storage::disk('public')->delete($property->video_path);
        }

        $property->delete();

        return redirect()->route('admin.properties.index')
            ->with('success', 'Property deleted successfully.');
    }

    private function validateProperty(Request $request, bool $isUpdate = false): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'in:land,flat,house,commercial,other'],
            'price' => ['nullable', 'string', 'max:70'],
            'location' => ['nullable', 'string', 'max:255'],
            'area' => ['nullable', 'string', 'max:120'],
            'description' => ['nullable', 'string', 'max:3000'],
            'image' => [$isUpdate ? 'nullable' : 'required', 'image', 'max:8192'],
            'video' => ['nullable', 'mimetypes:video/mp4,video/quicktime,video/x-msvideo,video/x-matroska', 'max:25600'],
            'is_published' => ['nullable', 'boolean'],
        ]);
    }

    private function createSlug(string $title): string
    {
        $base = Str::slug($title);
        if ($base === '') {
            $base = 'property';
        }
        $slug = $base;
        $counter = 1;

        while (Property::query()->where('slug', $slug)->exists()) {
            $slug = "{$base}-{$counter}";
            $counter++;
        }

        return $slug;
    }
}
