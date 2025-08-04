<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsiteLogoController extends Controller
{
    public function website_logo(Request $request)
    {
        $logo = Logo::first() ?? new Logo();
        return view('admin.website_logo.update', compact('logo'));
    }

    public function website_logo_update(Request $request)
    {
        $logo = Logo::first();

        $validated = $request->validate([
            'website_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,gif,svg,max"2048'
        ]);

        if (!$logo) {
            $logo = new Logo();
        }

        $logo->website_name = $validated['website_name'];

        if ($request->hasFile('logo')) {
            if ($logo->logo && Storage::disk('public')->exists($logo->logo)) {
                Storage::disk('public')->delete($logo->logo);
            }
            $path = $request->file('logo')->store('logos', 'public');
            $logo->logo = $path;
        }
        $logo->save();
        return to_route('website_logo')->with('succcess', 'Website logo updated successfully!');
    }
}
