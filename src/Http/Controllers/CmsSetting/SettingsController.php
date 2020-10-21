<?php

namespace AhmedElsadany\CmsSetting\Http\Controllers\CmsSetting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use AhmedElsadany\CmsSetting\Models\CmsSetting;

/**
 * Description of AuthController
 *
 * @author Ahmed Sadany
 */
class SettingsController extends Controller {

    function index() {
        $data['settings'] = CmsSetting::all();
        return view('backend.cms-setting.settings.index', $data);
    }

    function create(Request $request, $id) {
        $data['type'] = $id;
        if ($request->has('key')) {
            $rules = [
                'key' => 'required|unique:cms_settings',
                'value' => 'required',
            ];
            $validator = \Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                \Session::put('errors', "This Key is exeist ");

                return redirect()->back();
            }
            $setting = new CmsSetting();
            $setting->key = $request->get('key');
            $setting->type = $id;
            if ($id == 1) {
                $setting->value = $request->get('value')[0];
            } else {
                $setting->value = $request->get('value');
            }
            $setting->save();
            \Session::put('success', "Successfully Added");
            return redirect(config('cms-settings.prefix') . '/settings');
        }

        return view('backend.cms-setting.settings.create', $data);
    }

    function update(Request $request, $id) {
        $data['setting'] = $setting = CmsSetting::find($id);
        if (!is_object($setting)) {
            abort(404);
        }
        if ($request->has('value')) {
            $rules = [
                'value' => 'required',
            ];
            $validator = \Validator::make($request->all(), $rules);

            if ($validator->fails()) {

                \Session::put('errors', "Please Fill all Fields");

                return redirect()->back();
            }
            if ($id == 1) {
                $setting->value = $request->get('value')[0];
            } else {
                $setting->value = $request->get('value');
            }
            $setting->save();
            \Session::put('success', "Successfully Edited");
            return redirect(config('cms-settings.prefix') . '/settings');
        }
        return view('backend.cms-setting.settings.update', $data);
    }
    function delete($id){
           $setting = CmsSetting::find($id);
        if (!is_object($setting)) {
            abort(404);
        }
        $setting->delete();
        \Session::put('success', "Successfully Deleted");
         return redirect(config('cms-settings.prefix') . '/settings');
    }
    public static function getAllSettings(){
        $settings= CmsSetting::all();
        foreach($settings as $setting){
             $_settings[$setting->key] = $setting->displayValue;
        }
        return $_settings;
    }

}
