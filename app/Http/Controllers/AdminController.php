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

    public function apitoken()
    {
        $user = auth()->user();
        $token = $user->createToken('optin');

        return ['token' => $token->plainTextToken];
    }


}
