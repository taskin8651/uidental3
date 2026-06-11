<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BeforeAfterResult;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BeforeAfterResultsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('before_after_result_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beforeAfterResults = BeforeAfterResult::orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.before-after-results.index', compact('beforeAfterResults'));
    }

    public function create()
    {
        abort_if(Gate::denies('before_after_result_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.before-after-results.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('before_after_result_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'tag'              => 'nullable|string|max:100',
            'title'            => 'required|string|max:255',
            'description'      => 'nullable|string',
            'before_image_alt' => 'nullable|string|max:255',
            'after_image_alt'  => 'nullable|string|max:255',
            'sort_order'       => 'nullable|integer',
            'status'           => 'nullable|boolean',
            'before_image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'after_image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $result = BeforeAfterResult::create([
            'tag'              => $request->tag,
            'title'            => $request->title,
            'description'      => $request->description,
            'before_image_alt' => $request->before_image_alt,
            'after_image_alt'  => $request->after_image_alt,
            'sort_order'       => $request->sort_order ?? 0,
            'status'           => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('before_image')) {
            $result->addMediaFromRequest('before_image')->toMediaCollection('before_image');
        }

        if ($request->hasFile('after_image')) {
            $result->addMediaFromRequest('after_image')->toMediaCollection('after_image');
        }

        return redirect()
            ->route('admin.before-after-results.index')
            ->with('success', 'Before / After result created successfully.');
    }

    public function edit(BeforeAfterResult $beforeAfterResult)
    {
        abort_if(Gate::denies('before_after_result_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.before-after-results.edit', compact('beforeAfterResult'));
    }

    public function update(Request $request, BeforeAfterResult $beforeAfterResult)
    {
        abort_if(Gate::denies('before_after_result_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'tag'              => 'nullable|string|max:100',
            'title'            => 'required|string|max:255',
            'description'      => 'nullable|string',
            'before_image_alt' => 'nullable|string|max:255',
            'after_image_alt'  => 'nullable|string|max:255',
            'sort_order'       => 'nullable|integer',
            'status'           => 'nullable|boolean',
            'before_image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'after_image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $beforeAfterResult->update([
            'tag'              => $request->tag,
            'title'            => $request->title,
            'description'      => $request->description,
            'before_image_alt' => $request->before_image_alt,
            'after_image_alt'  => $request->after_image_alt,
            'sort_order'       => $request->sort_order ?? 0,
            'status'           => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('before_image')) {
            $beforeAfterResult->addMediaFromRequest('before_image')->toMediaCollection('before_image');
        }

        if ($request->hasFile('after_image')) {
            $beforeAfterResult->addMediaFromRequest('after_image')->toMediaCollection('after_image');
        }

        return redirect()
            ->route('admin.before-after-results.index')
            ->with('success', 'Before / After result updated successfully.');
    }

    public function destroy(BeforeAfterResult $beforeAfterResult)
    {
        abort_if(Gate::denies('before_after_result_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $beforeAfterResult->delete();

        return redirect()
            ->route('admin.before-after-results.index')
            ->with('success', 'Before / After result deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('before_after_result_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        BeforeAfterResult::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}