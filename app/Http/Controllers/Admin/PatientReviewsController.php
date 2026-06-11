<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PatientReview;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PatientReviewsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('patient_review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patientReviews = PatientReview::orderBy('sort_order', 'asc')->orderBy('id', 'desc')->get();

        return view('admin.patient-reviews.index', compact('patientReviews'));
    }

    public function create()
    {
        abort_if(Gate::denies('patient_review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.patient-reviews.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('patient_review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        PatientReview::create($this->validatedData($request));

        return redirect()->route('admin.patient-reviews.index')->with('success', 'Patient review created successfully.');
    }

    public function edit(PatientReview $patientReview)
    {
        abort_if(Gate::denies('patient_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.patient-reviews.edit', compact('patientReview'));
    }

    public function update(Request $request, PatientReview $patientReview)
    {
        abort_if(Gate::denies('patient_review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patientReview->update($this->validatedData($request));

        return redirect()->route('admin.patient-reviews.index')->with('success', 'Patient review updated successfully.');
    }

    public function destroy(PatientReview $patientReview)
    {
        abort_if(Gate::denies('patient_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patientReview->delete();

        return redirect()->route('admin.patient-reviews.index')->with('success', 'Patient review deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('patient_review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        PatientReview::whereIn('id', $request->input('ids', []))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    private function validatedData(Request $request)
    {
        $data = $request->validate([
            'avatar_letter' => 'nullable|string|max:5',
            'title'         => 'required|string|max:255',
            'service_name'  => 'nullable|string|max:255',
            'rating'        => 'required|numeric|min:1|max:5',
            'review_text'   => 'nullable|string',
            'badge_text'    => 'nullable|string|max:255',
            'badge_icon'    => 'nullable|string|max:255',
            'sort_order'    => 'nullable|integer',
            'status'        => 'nullable|boolean',
        ]);

        $data['sort_order'] = $request->sort_order ?? 0;
        $data['status'] = $request->has('status') ? 1 : 0;

        return $data;
    }
}
