<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function indexSecurity()
    {
        return view('user.settings.security');
    }

    public function indexSettings()
    {
        return view('user.settings.settings');
    }
}
