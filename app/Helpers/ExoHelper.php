<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExoHelper
{
    public static function appSettings()
    {
        return [
            'app_name'              => 'Inventory Management System',
            'app_short_name'        => 'IMS',
            'business_name'         => 'Gourmet Global Ltd.',
            'vertical_logo'         => 'logo.png',
            'horizontal_logo'       => '',
            'croped_logo'           => 'croped_logo.PNG',
            'exclorithm'            => 'exclorithm.PNG',
            'dashboard_text_color'  => '#E1832C',
            'address'               => 'Tsukiji Building 302, 4-4-4 Tsukiji, Chuo-ku, Tokyo 104-0045',
            'contact'               => '03-6161-4925',
            'email'                 => 'contact.gg@gourmetglobal.jp',
            'website'               => 'https://www.gourmetglobal.jp/'
        ];
    }

    public static function throwException($message = '')
    {
        return throw new \ErrorException($message);
    }

    public static function getDefaultRoles()
    {
        return [
            __('roles.Super Admin'), //0
            __('roles.Admin'), //1
            __('roles.Student'), //2
            __('roles.Referral '), //3
            __('roles.Finance Officier'), //4
        ];
    }
    public static function getDefaultGuardss()
    {
        return [
            'web', //0
            'api', //1
        ];
    }

    public static function getSegment($array = [], $call_back = 'active')
    {
        if (in_array(\Request::segment(1), $array)) {
            return $call_back;
        } else {
            return '';
        }
    }

    // public static function getSegment()
    // {
    //     $active_segment = \Request::segment(1);

    //     return $active_segment;
    // }

    public static function uploadFile($file, $file_name = '', $location = 'employees_dp')
    {
        // Ensure storage link exists
        $publicPath = public_path('storage');
        if (!is_link($publicPath)) {
            Artisan::call('storage:link');
        }

        // Generate unique filename if not provided
        if (strlen($file_name) == 0) {
            $file_name = uniqid();
        }
        $file_name = $file_name . '.' . $file->getClientOriginalExtension();

        // Save the file into storage/app/public/{location}
        Storage::disk('public')->put("$location/" . $file_name, file_get_contents($file));

        return $file_name;
    }

    public static function getFile($file_name, $location = 'employees_dp')
    {
        if (strlen($file_name) == 0) {
            return 'http://127.0.0.1:8000/vuexy/assets/img/avatars/1.png';
        }

        // If file name contains an extension, use it directly
        if (pathinfo($file_name, PATHINFO_EXTENSION)) {
            $path = "$location/$file_name";
            if (Storage::disk('public')->exists($path)) {
                return url(Storage::url($path));
            }
        } else {
            // No extension - search for a file with matching base name
            $files = Storage::disk('public')->files($location);
            foreach ($files as $file) {
                if (pathinfo($file, PATHINFO_FILENAME) === $file_name) {
                    return url(Storage::url($file));
                }
            }
        }

        // Fallback default
        return 'http://127.0.0.1:8000/vuexy/assets/img/avatars/1.png';
    }

    public static function deleteFile($file_name, $location = 'employees_dp')
    {
        if (strlen($file_name) == 0) {
            return false;
        }

        $files = Storage::disk('public')->files($location);

        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_FILENAME) === $file_name) {
                return Storage::disk('public')->delete($file);
            }
        }

        return false;
    }

    public static function getAuthUser()
    {
        if (Auth::check()) {
            return Auth::user();
        } else {
            return self::throwException(__('general.You are not login. Please Login First.'));
        }
    }

    public static function numberFormat($value, $decimal_place = 2)
    {
        return number_format($value, $decimal_place);
    }

    public static function showDateTime($date, $format = 'Y-m-d h:i A')
    {
        $lang = session()->get('locale', 'en'); // fallback to English if not set
        Carbon::setlocale($lang);
        return Carbon::parse($date)->translatedFormat($format);
    }

    public static function dateHtml($value)
    {

        return str_replace('1970-01-01', ' ', date('Y-m-d', strtotime($value)));
    }

    public static function dateFormat($value, $format = 'M d,Y')
    {
        $lang = session()->get('locale', 'en'); // fallback to English if not set

        Carbon::setLocale($lang);

        $date = Carbon::parse($value);

        // Format the date using Carbon
        $formatted = $date->translatedFormat($format);

        // Handle invalid/empty values
        return $formatted === Carbon::createFromTimestamp(0)->translatedFormat($format)
            ? 'N/A'
            : $formatted;
    }

    public static function getYears($range = 3)
    {
        return $years = range(date('Y'), date('Y') + $range);
    }
    public static function getMonthNo($month = 'January')
    {
        $monthNumbers = [
            'January' => 1,
            'February' => 2,
            'March' => 3,
            'April' => 4,
            'May' => 5,
            'June' => 6,
            'July' => 7,
            'August' => 8,
            'September' => 9,
            'October' => 10,
            'November' => 11,
            'December' => 12,
        ];

        return  $monthNumbers[$month] ?? null;
    }

    public static function getDefaultPassword()
    {
        return 'Exo-123456'; //
    }
    public static function loginWith($request)
    {
        // Determine if input is an email or user ID
        return filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';
    }

    public static function timeAgo($date)
    {
        $lang = session()->get('locale', 'en'); // fallback to English if not set
        Carbon::setlocale($lang);
        return Carbon::parse($date)->diffForHumans();
    }


    public static function  getManagementEmails()
    {
        return ['engr.rehan.atif@gmail.com', 'company@gourmetglobal.jp'];
    }



    public static function updateAppLocale($newLocale)
    {
        $envPath = base_path('.env');
        $newLocale = trim($newLocale);

        if (file_exists($envPath)) {
            file_put_contents($envPath, preg_replace(
                '/^APP_LOCALE=.*$/m', // Match the APP_LOCALE line
                'APP_LOCALE=' . $newLocale, // Replace with the new value
                file_get_contents($envPath) // Load the .env file
            ));

            // Reload the environment variables
            Artisan::call('config:clear'); // Clear the current configuration
            Artisan::call('config:cache'); // Cache the new configuration

            // Return confirmation
            return "Application locale updated to: {$newLocale}";
        }

        // Return error if .env not found
        return 'Failed: .env file does not exist.';
    }

    public static function getDefaultSource()
    {
        return 'inventory system';
    }

    public static function animation($index)
    {
        $animation_list = [
            'warning' => 'shake',
            'success' => 'flipInX',
            'danger' => 'tada',
        ];

        return $animation_list[$index];
    }

    public static function diffForHumans($date)
    {
        $lang = session()->get('locale', 'en'); // fallback to English if not set
        Carbon::setlocale($lang);
        return Carbon::parse($date)->diffForHumans();
    }

    public static function modalAnimation($animation = 'animate__animated animate__flipInX')
    {
        return $animation;
    }
    public static function alertMessage($title = 'general.Are You Sure?', $content = 'products.You Want to Delete This Record.')
    {
        return 'title="' . __('' . $title) . '" content="' . __('' . $content) . '"';
    }

    public static function getDistictList($column = 'country', $table = 'user_addresses', $condition = [])
    {
        return DB::table($table)->where($condition)->distinct()->pluck($column)->toArray();
    }

    public static function getPaginate($paginate = 20)
    {
        return $paginate;
    }

    public static function paginateLinks($data)
    {
        return $data->appends(request()->all())->links();
    }


    public static function getAmount($amount, $length = 2)
    {
        $amount = round($amount, $length);
        return $amount + 0;
    }


    public static function slug($string)
    {
        return \Illuminate\Support\Str::slug($string);
    }

    public static function showAmount($amount, $decimal = 2, $separate = true, $exceptZeros = false)
    {
        // Determine the separator (default comma for thousands)
        $separator = $separate ? ',' : '';

        // Format the amount with decimals and separator
        $printAmount = number_format($amount, $decimal, '.', $separator);

        // Handle trimming zeros if requested
        if ($exceptZeros) {
            // Check if there's a decimal part
            if (strpos($printAmount, '.') !== false) {
                // Trim only trailing zeros after the decimal, but keep at least one digit after the decimal
                $printAmount = rtrim($printAmount, '0');
                $printAmount = rtrim($printAmount, '.'); // Remove the dot if all decimals were zeros (e.g., "5.00" → "5")
            }
        }

        return $printAmount;
    }


    static public function getSalutations()
    {
        return [
            'Mr.',
            'Mrs.',
            'Miss.',
            'Ms.',
            'Dr.',
        ];
    }

    public static function getTooltip($title = '', $placement = 'top')
    {
        $translatedTitle = __('tooltips.' . $title);

        return ' data-bs-toggle="tooltip" data-bs-placement="' . $placement . '" data-bs-custom-class="tooltip-secondary" title="' . e($translatedTitle) . '"';
    }

    public static function cleanNumber($value)
    {
        return floatval(str_replace(',', '', preg_replace('/[^\d.,]/', '', $value)));
    }
}
