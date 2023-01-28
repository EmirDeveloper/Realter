<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index() {
        $obj = Location::orderBy('sort_order')
            ->with('parent')
            ->get();

        return view('admin.location.index')
            ->with([
                'objs' => $obj
            ]);
    }

    public function create() {
        $parents = Location::whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();

        return view('admin.location.create')
        ->with([
            'parents' => $parents
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'parent' => ['nullable', 'integer', 'min:1'],
            'name_tm' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:1'],
        ]);

        $obj = Location::create([
            'parent' => $request->parent ?: null,
            'name_tm' => $request->name_tm,
            'name_en' => $request->name_en ?: null,
            'sort_order' => $request->sort_order,
        ]);

        return to_route('admin.location.index')
            ->with([
                'success' => trans('app.location') . '(' . $obj->getName() . ')' . trans('app.added') . '!'
            ]);
    }

    public function edit() {
        $obj = Location::findOrFail('id');
        $parents = Location::where('id', '!=', $obj->id)
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();

        return view('admin.location.edit')
            ->with([
                'obj' => $obj,
                'parents' => $parents,
            ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'parent' => ['nullable', 'integer', 'min:1'],
            'name_tm' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:1'],
        ]);

        $obj = Location::updateOrCreate([
            'id' => $id
        ], [
            'parent' => ['nullable', 'integer', 'min:1'],
            'name_tm' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:1'],
        ]);

        return to_route('admin.location.index')
            ->with([
                'success' => trans('app.location') . ' (' . $obj->getName() . ') ' . trans('app.updated') . '!' 
            ]);
    }

    public function destroy($id) {
        $obj = Location::withCount('child')->findOrFail();
        $objName = $obj->name;
        if ($obj->child_count > 0) {
            return redirect()->back()
                ->with([
                    'error' => trans('app.error') . '!'
                ]);
        }

        $obj->delete();

        return redirect()->back()
            ->with([
                'success' => trans('app.location') . ' (' . $obj->getName() . ') ' . trans('app.deleted') . '!'
            ]);
    }
}
