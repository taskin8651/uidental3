<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DoctorsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('doctor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctors = Doctor::orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        abort_if(Gate::denies('doctor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.doctors.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('doctor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'badge_text'             => 'nullable|string|max:255',
            'heading'                => 'nullable|string|max:255',
            'description'            => 'nullable|string',
            'doctor_name'            => 'nullable|string|max:255',
            'doctor_title'           => 'nullable|string|max:255',
            'doctor_subtitle'        => 'nullable|string|max:255',
            'image_alt'              => 'nullable|string|max:255',
            'rating_text'            => 'nullable|string|max:100',
            'review_text'            => 'nullable|string|max:100',
            'timing_days'            => 'nullable|string|max:100',
            'timing_hours'           => 'nullable|string|max:100',
            'qualification_label'    => 'nullable|string|max:100',
            'qualification_value'    => 'nullable|string|max:255',
            'specialization_label'   => 'nullable|string|max:100',
            'specialization_value'   => 'nullable|string|max:255',
            'consultation_label'     => 'nullable|string|max:100',
            'consultation_value'     => 'nullable|string|max:255',
            'care_focus_label'       => 'nullable|string|max:100',
            'care_focus_value'       => 'nullable|string|max:255',
            'sort_order'             => 'nullable|integer',
            'status'                 => 'nullable|boolean',
            'doctor_image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $doctor = Doctor::create([
            'badge_text'             => $request->badge_text,
            'heading'                => $request->heading,
            'description'            => $request->description,
            'doctor_name'            => $request->doctor_name,
            'doctor_title'           => $request->doctor_title,
            'doctor_subtitle'        => $request->doctor_subtitle,
            'image_alt'              => $request->image_alt,
            'rating_text'            => $request->rating_text,
            'review_text'            => $request->review_text,
            'timing_days'            => $request->timing_days,
            'timing_hours'           => $request->timing_hours,
            'qualification_label'    => $request->qualification_label,
            'qualification_value'    => $request->qualification_value,
            'specialization_label'   => $request->specialization_label,
            'specialization_value'   => $request->specialization_value,
            'consultation_label'     => $request->consultation_label,
            'consultation_value'     => $request->consultation_value,
            'care_focus_label'       => $request->care_focus_label,
            'care_focus_value'       => $request->care_focus_value,
            'sort_order'             => $request->sort_order ?? 0,
            'status'                 => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('doctor_image')) {
            $doctor
                ->addMediaFromRequest('doctor_image')
                ->toMediaCollection('doctor_image');
        }

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'Doctor created successfully.');
    }

    public function edit(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.doctors.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'badge_text'             => 'nullable|string|max:255',
            'heading'                => 'nullable|string|max:255',
            'description'            => 'nullable|string',
            'doctor_name'            => 'nullable|string|max:255',
            'doctor_title'           => 'nullable|string|max:255',
            'doctor_subtitle'        => 'nullable|string|max:255',
            'image_alt'              => 'nullable|string|max:255',
            'rating_text'            => 'nullable|string|max:100',
            'review_text'            => 'nullable|string|max:100',
            'timing_days'            => 'nullable|string|max:100',
            'timing_hours'           => 'nullable|string|max:100',
            'qualification_label'    => 'nullable|string|max:100',
            'qualification_value'    => 'nullable|string|max:255',
            'specialization_label'   => 'nullable|string|max:100',
            'specialization_value'   => 'nullable|string|max:255',
            'consultation_label'     => 'nullable|string|max:100',
            'consultation_value'     => 'nullable|string|max:255',
            'care_focus_label'       => 'nullable|string|max:100',
            'care_focus_value'       => 'nullable|string|max:255',
            'sort_order'             => 'nullable|integer',
            'status'                 => 'nullable|boolean',
            'doctor_image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $doctor->update([
            'badge_text'             => $request->badge_text,
            'heading'                => $request->heading,
            'description'            => $request->description,
            'doctor_name'            => $request->doctor_name,
            'doctor_title'           => $request->doctor_title,
            'doctor_subtitle'        => $request->doctor_subtitle,
            'image_alt'              => $request->image_alt,
            'rating_text'            => $request->rating_text,
            'review_text'            => $request->review_text,
            'timing_days'            => $request->timing_days,
            'timing_hours'           => $request->timing_hours,
            'qualification_label'    => $request->qualification_label,
            'qualification_value'    => $request->qualification_value,
            'specialization_label'   => $request->specialization_label,
            'specialization_value'   => $request->specialization_value,
            'consultation_label'     => $request->consultation_label,
            'consultation_value'     => $request->consultation_value,
            'care_focus_label'       => $request->care_focus_label,
            'care_focus_value'       => $request->care_focus_value,
            'sort_order'             => $request->sort_order ?? 0,
            'status'                 => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('doctor_image')) {
            $doctor
                ->addMediaFromRequest('doctor_image')
                ->toMediaCollection('doctor_image');
        }

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'Doctor updated successfully.');
    }

    public function destroy(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctor->delete();

        return redirect()
            ->route('admin.doctors.index')
            ->with('success', 'Doctor deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('doctor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Doctor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}