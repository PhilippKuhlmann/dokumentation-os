<?php

namespace App\Http\Controllers;

use App\Models\ServerOperatingSystem;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAdmin']);
    }

    public function index()
    {
        return view('admin.index');
    }


}
