<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Resources\V2\SettingCollection;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return new SettingCollection(Setting::all());
    }
}
