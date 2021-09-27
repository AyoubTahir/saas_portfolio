<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Setting;
use App\Services\Perform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Support\SaveModel\SaveModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SettingsRequest;

class SettingsController extends Controller
{
    public function index()
    {
        $setting = Perform::index(Setting::class);

        $user = Auth::user();

        return view('admin.settings.index', compact(['setting', 'user']));
    }

    public function update(SettingsRequest $request)
    {

        Perform::update(Setting::class, $request);

        return redirect()->route('settings.index')->with(['success' => 'changed updated successfully']);
    }

    public function updateProfile(Request $request)
    {
        $user = User::where('id', Auth::id())->first();

        $data = array_filter($request->only(['name', 'email', 'password', 'image']));

        (new SaveModel($user, $data))->execute();

        return redirect()->route('settings.index')->with(['success' => 'changed updated successfully']);
    }
}
