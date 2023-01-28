<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Option;
use Attribute;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $modals = [
            ['name' => 'customers', 'total' => Customer::class],
            ['name' => 'property_types', 'total' => PropertyType::class],
            ['name' => 'properties', 'total' => Property::class],
            ['name' => 'attributes', 'total' => Attribute::class],
            ['name' => 'options', 'total' => Option::class],
        ];

        return view('admin.dashboard.index')
            ->with(['modals' => $modals]);
    }
}
