<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Resources\V2\ImageBannerCollection;

class ImageBannerController extends Controller
{

    public function index()
    {
        return new ImageBannerCollection(json_decode(get_setting('home_banner1_images'), true));
    }
}
