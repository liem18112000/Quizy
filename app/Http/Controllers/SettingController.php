<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function mode(Request $request)
    {
        $setting = Auth::user()->setting;

        if(!$setting){
            $setting = Setting::create([
                'user_id'   => Auth::user()->id,
                'mode'      => '1',
            ]);

            activity()
            ->performedOn($setting)
            ->causedBy(Auth::user())
            ->log('User setting initialize');

            alert()->success('Done', 'Mode change!');

            return redirect()->back();
        }

        $setting->update([
            'mode' => strval((intval($setting->mode) + 1) % 2)
        ]);

        activity()
            ->performedOn($setting)
            ->causedBy(Auth::user())
            ->log('User mode change');

        alert()->success('Done', 'Mode change!');

        return redirect()->back();
    }
}
