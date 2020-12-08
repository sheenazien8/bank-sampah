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
        foreach ($request->only('bahasa', 'profit_bank_sampah') as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            if (!$setting) {
                $setting = new Setting();
            }
            $setting->fill([
                'key' => $key,
                'value' => $value
            ]);
            $setting->save();
        }

        return redirect()->route('setting.index')->with('success', trans('app.setting.succes'));
    }

}
