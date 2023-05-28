<?php

namespace App\Http\Controllers;

use App\Models\OperatingSystem;
use Illuminate\Http\Request;

class OperatingSystemController extends Controller
{
    public function index()
    {

        return view('admin.operatingsystem.index', [
            'serverOperatingSystems' => OperatingSystem::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => []
        ]);


        OperatingSystem::create($validated);

        return redirect('/admin/operatingsystem');
    }
}
