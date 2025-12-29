<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Helpers\ExoHelper as EH;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function __construct() {}

    public function changeLogo(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $request->validate(
                    [
                        'image'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    ],
                    [
                        'image.required' => __('employee_validation.The image file is required.'),
                        'image.image' => __('employee_validation.The file must be a valid image.'),
                        'image.mimes' => __('employee_validation.Allowed image types: jpeg, png, jpg, gif.'),
                        'image.max'   => __('employee_validation.Maximum allowed size is 2MB.'),
                    ]
                );

                EH::deleteFile('logo', 'logo');

                $file_name = EH::uploadFile($request->image, 'logo', 'logo'); // file_name,folder

                $this->cacheClear();
                parent::setResponse(true, __('Logo.Logo Changed.'), EH::getFile($file_name, 'logo')); //file_name,folder
            } else {
                return view('settings.manage_settings');
            }
        } catch (Exception $e) {
            parent::setResponse(false, $e->getMessage());
        }

        return parent::getResponse();
    }

    public function changeFavIcon(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $request->validate(
                    [
                        'image'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                    ],
                    [
                        'image.required' => __('employee_validation.The image file is required.'),
                        'image.image' => __('employee_validation.The file must be a valid image.'),
                        'image.mimes' => __('employee_validation.Allowed image types: jpeg, png, jpg, gif.'),
                        'image.max'   => __('employee_validation.Maximum allowed size is 2MB.'),
                    ]
                );

                EH::deleteFile('fav_icon', 'logo');

                $file_name = EH::uploadFile($request->image, 'fav_icon', 'logo'); // file_name,folder

                $this->cacheClear();
                parent::setResponse(true, __('Logo.Fav Icon Changed.'), EH::getFile($file_name, 'logo')); //file_name,folder
            } else {
                return view('settings.manage_settings');
            }
        } catch (Exception $e) {
            parent::setResponse(false, $e->getMessage());
        }

        return parent::getResponse();
    }

    public function cacheClear()
    {
        try {
            Artisan::call('optimize:clear');
            Artisan::call('view:clear');
            Artisan::call('cache:clear');
            parent::setResponse(true, __('general.Cache Cleared'));
        } catch (Exception $e) {
            parent::setResponse(false, $e->getMessage());
        }

        return parent::getResponse();
    }
}
