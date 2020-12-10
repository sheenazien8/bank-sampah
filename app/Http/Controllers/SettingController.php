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
        $this->validate($request, [
            'pin_register_telegram' => 'size:6'
        ]);
        foreach ($request->only('bahasa', 'profit_bank_sampah', 'profit_total_petugas', 'pin_register_telegram') as $key => $value) {
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
