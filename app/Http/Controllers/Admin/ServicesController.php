<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ServicesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::orderBy('sort_order', 'asc')->orderBy('id', 'desc')->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        abort_if(Gate::denies('service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'number'                    => 'nullable|string|max:20',
            'icon_class'                => 'nullable|string|max:255',
            'category'                  => 'required|string|max:100',
            'tag'                       => 'nullable|string|max:100',
            'title'                     => 'required|string|max:255',
            'slug'                      => 'nullable|string|max:255|unique:services,slug',
            'short_description'         => 'nullable|string',
            'point_one'                 => 'nullable|string|max:255',
            'point_two'                 => 'nullable|string|max:255',
            'card_style'                => 'required|in:normal,featured,urgent',
            'overview_badge_text'       => 'nullable|string|max:255',
            'overview_heading'          => 'nullable|string|max:255',
            'overview_description_one'  => 'nullable|string',
            'overview_description_two'  => 'nullable|string',
            'overview_image_alt'        => 'nullable|string|max:255',
            'overview_card_title'       => 'nullable|string|max:255',
            'overview_card_subtitle'    => 'nullable|string|max:255',
            'overview_image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'sort_order'                => 'nullable|integer',
            'status'                    => 'nullable|boolean',
        ]);

        $service = Service::create([
            'number'                   => $request->number,
            'icon_class'               => $request->icon_class,
            'category'                 => $request->category,
            'tag'                      => $request->tag,
            'title'                    => $request->title,
            'slug'                     => $request->slug ? Str::slug($request->slug) : Str::slug($request->title),
            'short_description'        => $request->short_description,
            'point_one'                => $request->point_one,
            'point_two'                => $request->point_two,
            'card_style'               => $request->card_style,
            'overview_badge_text'      => $request->overview_badge_text,
            'overview_heading'         => $request->overview_heading,
            'overview_description_one' => $request->overview_description_one,
            'overview_description_two' => $request->overview_description_two,
            'overview_image_alt'       => $request->overview_image_alt,
            'overview_card_title'      => $request->overview_card_title,
            'overview_card_subtitle'   => $request->overview_card_subtitle,
            'overview_points'          => $this->cleanSimpleArray($request->overview_points),
            'symptoms'                 => $this->cleanSimpleArray($request->symptoms),
            'process_steps'            => $this->cleanSimpleArray($request->process_steps),
            'benefits'                 => $this->cleanSimpleArray($request->benefits),
            'aftercare_points'         => $this->cleanSimpleArray($request->aftercare_points),
            'faqs'                     => $this->cleanFaqArray($request->faqs),
            'seo_title'                => $request->seo_title,
            'seo_description'          => $request->seo_description,
            'sort_order'               => $request->sort_order ?? 0,
            'status'                   => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('overview_image')) {
            $service
                ->addMediaFromRequest('overview_image')
                ->toMediaCollection('overview_image');
        }

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        abort_if(Gate::denies('service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        abort_if(Gate::denies('service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->validate([
            'number'                    => 'nullable|string|max:20',
            'icon_class'                => 'nullable|string|max:255',
            'category'                  => 'required|string|max:100',
            'tag'                       => 'nullable|string|max:100',
            'title'                     => 'required|string|max:255',
            'slug'                      => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'short_description'         => 'nullable|string',
            'point_one'                 => 'nullable|string|max:255',
            'point_two'                 => 'nullable|string|max:255',
            'card_style'                => 'required|in:normal,featured,urgent',
            'overview_badge_text'       => 'nullable|string|max:255',
            'overview_heading'          => 'nullable|string|max:255',
            'overview_description_one'  => 'nullable|string',
            'overview_description_two'  => 'nullable|string',
            'overview_image_alt'        => 'nullable|string|max:255',
            'overview_card_title'       => 'nullable|string|max:255',
            'overview_card_subtitle'    => 'nullable|string|max:255',
            'overview_image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'sort_order'                => 'nullable|integer',
            'status'                    => 'nullable|boolean',
        ]);

        $service->update([
            'number'                   => $request->number,
            'icon_class'               => $request->icon_class,
            'category'                 => $request->category,
            'tag'                      => $request->tag,
            'title'                    => $request->title,
            'slug'                     => $request->slug ? Str::slug($request->slug) : Str::slug($request->title),
            'short_description'        => $request->short_description,
            'point_one'                => $request->point_one,
            'point_two'                => $request->point_two,
            'card_style'               => $request->card_style,
            'overview_badge_text'      => $request->overview_badge_text,
            'overview_heading'         => $request->overview_heading,
            'overview_description_one' => $request->overview_description_one,
            'overview_description_two' => $request->overview_description_two,
            'overview_image_alt'       => $request->overview_image_alt,
            'overview_card_title'      => $request->overview_card_title,
            'overview_card_subtitle'   => $request->overview_card_subtitle,
            'overview_points'          => $this->cleanSimpleArray($request->overview_points),
            'symptoms'                 => $this->cleanSimpleArray($request->symptoms),
            'process_steps'            => $this->cleanSimpleArray($request->process_steps),
            'benefits'                 => $this->cleanSimpleArray($request->benefits),
            'aftercare_points'         => $this->cleanSimpleArray($request->aftercare_points),
            'faqs'                     => $this->cleanFaqArray($request->faqs),
            'seo_title'                => $request->seo_title,
            'seo_description'          => $request->seo_description,
            'sort_order'               => $request->sort_order ?? 0,
            'status'                   => $request->has('status') ? 1 : 0,
        ]);

        if ($request->hasFile('overview_image')) {
            $service
                ->addMediaFromRequest('overview_image')
                ->toMediaCollection('overview_image');
        }

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Service::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    private function cleanSimpleArray($items)
    {
        $clean = [];

        if (is_array($items)) {
            foreach ($items as $item) {
                if (!empty($item)) {
                    $clean[] = trim($item);
                }
            }
        }

        return $clean;
    }

    private function cleanFaqArray($items)
    {
        $clean = [];

        if (is_array($items)) {
            foreach ($items as $item) {
                if (!empty($item['question']) || !empty($item['answer'])) {
                    $clean[] = [
                        'question' => $item['question'] ?? '',
                        'answer'   => $item['answer'] ?? '',
                    ];
                }
            }
        }

        return $clean;
    }
}