<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GalleriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gallery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galleries = Gallery::orderBy('sort_order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        abort_if(Gate::denies('gallery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('gallery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'category'      => 'required|string|max:100',
            'tag'           => 'nullable|string|max:100',
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'image_alt'     => 'nullable|string|max:255',
            'sort_order'    => 'nullable|integer',
            'status'        => 'nullable|boolean',
            'gallery_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $gallery = Gallery::create([
            'category'    => $request->category,
            'tag'         => $request->tag,
            'title'       => $request->title,
            'description' => $request->description,
            'image_alt'   => $request->image_alt,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('gallery_image')) {
            $gallery
                ->addMediaFromRequest('gallery_image')
                ->toMediaCollection('gallery_image');
        }

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Gallery item created successfully.');
    }

    public function edit(Gallery $gallery)
    {
        abort_if(Gate::denies('gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        abort_if(Gate::denies('gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'category'      => 'required|string|max:100',
            'tag'           => 'nullable|string|max:100',
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'image_alt'     => 'nullable|string|max:255',
            'sort_order'    => 'nullable|integer',
            'status'        => 'nullable|boolean',
            'gallery_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $gallery->update([
            'category'    => $request->category,
            'tag'         => $request->tag,
            'title'       => $request->title,
            'description' => $request->description,
            'image_alt'   => $request->image_alt,
            'sort_order'  => $request->sort_order ?? 0,
            'status'      => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('gallery_image')) {
            $gallery
                ->addMediaFromRequest('gallery_image')
                ->toMediaCollection('gallery_image');
        }

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Gallery item updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        abort_if(Gate::denies('gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gallery->delete();

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Gallery item deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Gallery::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}