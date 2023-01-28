<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function index(Request $request) {
        $request->validate([
            'name_tm' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'integer', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:1'],
        ]);

        $nameTm = $request->name_tm;
        $nameEn = $request->name_en ?: null;
        $sort_order = $request->sort_order;

        return view('admin.property_type.index')
            ->with([
                'name_tm' => $nameTm,
                'name_en' => $nameEn,
                'sort_order' => $sort_order,
            ]);
    }

    public function create() {
        $obj = PropertyType::firstOrFail()
            ->orderBy('sort_order')
            ->get();

        return view('admin.property_type.create')
            ->with([
                '$obj' => $obj
            ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name_tm' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'integer', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:1'],
        ]);

        $obj = PropertyType::create([
            $nameTm = $request->name_tm,
            $nameEn = $request->name_en ?: null,
            $sort_order = $request->sort_order
        ]);

        return to_route('admin.property_type.index')
            ->with([
                'success' => trans('app.property_type') . ' (' . $obj->getName() . ') ' . trans('app.added') . '!'
            ]);
    }

    public function edit() {
        $obj = PropertyType::findOrFail();

        return view('admin.property_type.edit')
            ->with([
                'obj' => $obj
            ]);
    }  
    
    public function update(Request $request, $id) {
        $request->validate([
            'name_tm' => ['required', 'string', 'max:255'],
            'name_en' => ['nullable', 'integer', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:1'],
        ]);

        $obj = PropertyType::updateOrCreate()
            ->with([
                'id' => $id
            ], [
                'name_tm' => $request->name_tm,
                'name_en' => $request->name_en ?: null,
                'sort_order' => $request->sort_order,
            ]);

        $obj->save();
    }

    public function destroy($id) {
        $obj = PropertyType::withCount(['properties'])
            ->findOrFail($id);

        if ($obj->properties_count > 0) {
            return redirect()->back()
                ->with([
                    'error' => trans('app.error') . '!'
                ]);
        }

        $obj->delete();

        return redirect()->back()
            ->with([
                'success' => trans('app.property_type') . ' (' . $obj->getName() . ') ' . trans('app.deleted') . '!'
            ]);
    }
}