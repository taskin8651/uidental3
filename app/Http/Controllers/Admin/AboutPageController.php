<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index()
    {
        $aboutPage = AboutPage::first();

        if (!$aboutPage) {
            $aboutPage = AboutPage::create([
                'badge_text'          => 'Clinic Introduction',
                'title'               => 'Gentle Dental Care With Hygiene, Comfort & Confidence',
                'description_one'     => 'Sinha Dental Clinic is designed to give patients a smooth, clean and confidence-building dental experience. From consultation to treatment planning, every step focuses on patient comfort, clear guidance and trusted oral care.',
                'description_two'     => 'The clinic helps patients understand their dental concern, available treatment options and appointment support in a simple and comfortable way.',
                'image_alt'           => 'Dental care at Sinha Dental Clinic',
                'card_title'          => 'Trusted',
                'card_subtitle'       => 'Dental Care',
                'google_rating'       => '4.5',
                'patient_reviews'     => '62',
                'clinic_availability' => '7 Days',
                'clinic_location'     => 'Patna',
                'points'              => [
                    [
                        'text'   => 'Clean and patient-friendly care environment',
                        'status' => 1,
                    ],
                    [
                        'text'   => 'Consultation, cleaning, root canal, crowns and implants',
                        'status' => 1,
                    ],
                    [
                        'text'   => 'Easy call, WhatsApp, appointment and direction support',
                        'status' => 1,
                    ],
                ],
            ]);
        }

        return view('admin.about-pages.index', compact('aboutPage'));
    }

    public function update(Request $request)
    {
        $aboutPage = AboutPage::first();

        if (!$aboutPage) {
            $aboutPage = AboutPage::create([]);
        }

        $request->validate([
            'badge_text'          => 'nullable|string|max:255',
            'title'               => 'nullable|string|max:255',
            'description_one'     => 'nullable|string',
            'description_two'     => 'nullable|string',
            'image_alt'           => 'nullable|string|max:255',
            'card_title'          => 'nullable|string|max:255',
            'card_subtitle'       => 'nullable|string|max:255',
            'google_rating'       => 'nullable|string|max:50',
            'patient_reviews'     => 'nullable|string|max:50',
            'clinic_availability' => 'nullable|string|max:50',
            'clinic_location'     => 'nullable|string|max:100',
            'about_image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'points'              => 'nullable|array',
            'points.*.text'       => 'nullable|string|max:255',
            'points.*.status'     => 'nullable',
        ]);

        $points = [];

        if ($request->has('points')) {
            foreach ($request->points as $point) {
                if (!empty($point['text'])) {
                    $points[] = [
                        'text'   => $point['text'],
                        'status' => isset($point['status']) ? 1 : 0,
                    ];
                }
            }
        }

        $aboutPage->update([
            'badge_text'          => $request->badge_text,
            'title'               => $request->title,
            'description_one'     => $request->description_one,
            'description_two'     => $request->description_two,
            'image_alt'           => $request->image_alt,
            'card_title'          => $request->card_title,
            'card_subtitle'       => $request->card_subtitle,
            'google_rating'       => $request->google_rating,
            'patient_reviews'     => $request->patient_reviews,
            'clinic_availability' => $request->clinic_availability,
            'clinic_location'     => $request->clinic_location,
            'points'              => $points,
        ]);

        if ($request->hasFile('about_image')) {
            $aboutPage
                ->addMediaFromRequest('about_image')
                ->toMediaCollection('about_image');
        }

        return redirect()
            ->route('admin.about-pages.index')
            ->with('success', 'About page updated successfully.');
    }
}