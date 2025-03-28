<?php

namespace App\Http\Controllers\Admin\Extra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomCssController extends Controller
{
    public function index()
    {
        $customCssFile = public_path(config('system.frontend.custom_css'));
        if (!File::exists($customCssFile)) {
            File::put($customCssFile, '');
        }
        $customCssFile = File::get($customCssFile);

        return view('admin.extra.custom-css', ['customCssFile' => $customCssFile]);
    }

    public function update(Request $request)
    {
        $customCssFile = public_path(config('system.frontend.custom_css'));
        if (!File::exists($customCssFile)) {
            File::put($customCssFile, '');
        }
        File::put($customCssFile, $request->custom_css);
        toastr()->success(admin_trans('Updated Successfully'));
        return back();
    }
}
