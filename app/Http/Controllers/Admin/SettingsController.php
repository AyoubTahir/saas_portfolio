<?php

namespace App\Http\Controllers\Admin;

use App\Services\Perform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingsRequest;
use App\Models\Setting;

class SettingsController extends Controller
{
    public function index()
    {
        $setting = Perform::index(Setting::class);

        return view('admin.settings.index', compact(['setting']));
    }

    public function update(SettingsRequest $request)
    {

        Perform::update(Setting::class, $request);

        return redirect()->route('settings.index')->with(['success' => 'changed updated successfully']);
    }
}
