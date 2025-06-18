<?php

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

if (!function_exists('returnMessage')) {
    /**
     * @param int $type
     * @param mixed $data
     * @param string $message
     * @return array
     */
    function returnMessage(int $type, mixed $data, string $message): array
    {
        if ($type === 1) {
            $data = [
                'type' => 'success',
                'status' => 'success',
                'message' => $message,
                'data' => $data,
            ];
        } else {
            $data = [
                'type' => 'error',
                'status' => 'error',
                'message' => $message,
                'data' => $data,
            ];
        }

        return $data;
    }
}

if (!function_exists('setting')) {
    function setting(): ?Setting
    {
        if (Schema::hasTable('settings')) {
            return Setting::first();
        }

        return null;
    }
}

if (!function_exists('getRoleUser')) {
    function getRoleUser()
    {
        if (Auth::check()) {
            $user = Auth::user();

            $role_user = RoleUser::where('user_id', $user->id)->first();
            if ($role_user) {
                $role = Role::where('id', $role_user->role_id)->first();
                return $role->name;
            }
        }

        return null;
    }
}

if (!function_exists('generateRandomString')) {
    function generateRandomString($length): string
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuyvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function generateRandomNumber($length): string
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('convertNumber')) {
    function convertNumber($num): string
    {
        if ($num >= 1 && $num <= 10) {
            return '000' . $num;
        } elseif ($num >= 11 && $num <= 99) {
            return '00' . $num;
        } elseif ($num >= 100 && $num <= 999) {
            return '0' . $num;
        } else {
            return (string)$num;
        }
    }
}


if (!function_exists('parseNumber')) {
    function parseNumber($num): ?string
    {
        if (!is_numeric($num)) {
            return 0;
        }

        // Ép kiểu về float để xử lý phần thập phân
        $num = (float)$num;

        // Nếu là số nguyên
        if (fmod($num, 1) == 0) {
            return number_format($num, 0);
        }

        // Tách phần thập phân
        $decimalPart = explode('.', (string)$num)[1] ?? '';

        // Loại bỏ số 0 ở cuối phần thập phân
        $decimalPart = rtrim($decimalPart, '0');

        // Đếm số chữ số thập phân còn lại (tối đa 3)
        $decimalLength = min(strlen($decimalPart), 3);

        return number_format($num, $decimalLength);
    }

    function compareNumbers(string $a, string $b): int {
        if (function_exists('bccomp')) {
            return bccomp($a, $b, 10);
        }

        $aFloat = (float) $a;
        $bFloat = (float) $b;

        if ($aFloat > $bFloat) return 1;
        if ($aFloat < $bFloat) return -1;
        return 0;
    }

}
