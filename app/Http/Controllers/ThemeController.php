<?php

namespace App\Http\Controllers;

use Cookie;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function setTheme($theme)
    {
        $allowedThemes = ['day-theme', 'night-theme']; // Define your allowed themes
        if (in_array($theme, $allowedThemes)) {
            // Set the theme in a cookie for 30 days (43200 minutes)
            Cookie::queue('theme', $theme, 43200);
            return redirect()->back();
        } else {
            abort(404); // Invalid theme selection
        }
    }
    public function getCookie(){
        $cookie = Cookie::get('theme');
        echo $cookie;
    }
}
