<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $viewpath = 'app.setting';
    public function index()
    {
        return view($this->viewpath . '.index');
    }

    public function store(Request $request)
    {
        return redirect()->route('setting.index');
    }

}
