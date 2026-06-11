<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FacilitiesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('facility_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facilities = Facility::orderBy('sort_order', 'asc')->orderBy('id', 'desc')->get();

        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        abort_if(Gate::denies('facility_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.facilities.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('facility_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'number'         => 'nullable|string|max:20',
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'image_alt'      => 'nullable|string|max:255',
            'sort_order'     => 'nullable|integer',
            'status'         => 'nullable|boolean',
            'facility_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $facility = Facility::create([
            'number'      => $request->number,
            'title'       => $request->title,
            'description' => $request->description,
            'image_alt'   => $request->image_alt,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('facility_image')) {
            $facility
                ->addMediaFromRequest('facility_image')
                ->toMediaCollection('facility_image');
        }

        return redirect()
            ->route('admin.facilities.index')
            ->with('success', 'Facility created successfully.');
    }

    public function edit(Facility $facility)
    {
        abort_if(Gate::denies('facility_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        abort_if(Gate::denies('facility_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'number'         => 'nullable|string|max:20',
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string',
            'image_alt'      => 'nullable|string|max:255',
            'sort_order'     => 'nullable|integer',
            'status'         => 'nullable|boolean',
            'facility_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $facility->update([
            'number'      => $request->number,
            'title'       => $request->title,
            'description' => $request->description,
            'image_alt'   => $request->image_alt,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('facility_image')) {
            $facility
                ->addMediaFromRequest('facility_image')
                ->toMediaCollection('facility_image');
        }

        return redirect()
            ->route('admin.facilities.index')
            ->with('success', 'Facility updated successfully.');
    }

    public function destroy(Facility $facility)
    {
        abort_if(Gate::denies('facility_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $facility->delete();

        return redirect()
            ->route('admin.facilities.index')
            ->with('success', 'Facility deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('facility_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Facility::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}