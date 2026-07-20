<?php

/**
 * Common Helper for migrated project
 */

if (!function_exists('viewSQ')) {
    function viewSQ($str)
    {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('cutstr')) {
    function cutstr($str, $size)
    {
        if (mb_strlen($str) > $size) {
            return mb_substr($str, 0, $size) . '...';
        }
        return $str;
    }
}

if (!function_exists('get_code_name')) {
    function get_code_name($code_no)
    {
        $db = \Config\Database::connect();
        $row = $db->table('tbl_code')->where('code_no', $code_no)->get()->getRowArray();
        return $row['code_name'] ?? '';
    }
}

if (!function_exists('sy_site_setting')) {
    function sy_site_setting(?string $key = null, $default = null)
    {
        static $setting = null;
        if ($setting === null) {
            try {
                $settingModel = new \App\Models\Setting();
                $setting = $settingModel->getSettings() ?: [];
            } catch (\Throwable $e) {
                $setting = [];
            }
        }
        if ($key === null) {
            return $setting;
        }
        return (isset($setting[$key]) && $setting[$key] !== '') ? $setting[$key] : $default;
    }
}

