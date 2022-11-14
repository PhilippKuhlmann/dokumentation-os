<?php

namespace App\Http\Controllers;

use App\Models\ServerOperatingSystem;
use Illuminate\Http\Request;

class ServerOperatingSystemController extends Controller
{
    public function index()
    {

        return view('admin.serveroperatingsystem.index', [
            'serverOperatingSystems' => ServerOperatingSystem::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => []
        ]);


        ServerOperatingSystem::create($validated);

        return redirect('/admin/serveroperatingsystem');
    }
}
