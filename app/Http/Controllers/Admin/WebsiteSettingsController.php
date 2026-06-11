<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebsiteSettingsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('website_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websiteSetting = WebsiteSetting::current();

        return view('admin.website-settings.index', compact('websiteSetting'));
    }

    public function update(Request $request)
    {
        abort_if(Gate::denies('website_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $websiteSetting = WebsiteSetting::current();

        $data = $request->validate([
            'site_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords'    => 'nullable|string',
            'clinic_name'      => 'nullable|string|max:255',
            'clinic_subtitle'  => 'nullable|string|max:255',
            'phone'            => 'nullable|string|max:50',
            'whatsapp_number'  => 'nullable|string|max:50',
            'email'            => 'nullable|email|max:255',
            'short_address'    => 'nullable|string|max:255',
            'address'          => 'nullable|string',
            'working_hours'    => 'nullable|string|max:255',
            'sunday_hours'     => 'nullable|string|max:255',
            'google_rating'    => 'nullable|string|max:50',
            'patient_reviews'  => 'nullable|string|max:50',
            'facebook_url'     => 'nullable|string|max:255',
            'instagram_url'    => 'nullable|string|max:255',
            'footer_text'      => 'nullable|string',
            'logo'             => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:4096',
            'favicon'          => 'nullable|image|mimes:jpg,jpeg,png,webp,ico|max:2048',
        ]);

        unset($data['logo'], $data['favicon']);

        $websiteSetting->update($data);

        if ($request->hasFile('logo')) {
            $websiteSetting->addMediaFromRequest('logo')->toMediaCollection('logo');
        }

        if ($request->hasFile('favicon')) {
            $websiteSetting->addMediaFromRequest('favicon')->toMediaCollection('favicon');
        }

        return redirect()
            ->route('admin.website-settings.index')
            ->with('success', 'Website settings updated successfully.');
    }
}
