<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Type;
use App\Models\Manual;

class ManualController extends Controller
{
    public function show($brand_id, $brand_slug, $type_id, $type_slug, $manual_id )
    {
        $brand = Brand::findOrFail($brand_id);
        $type = Type::findOrFail($type_id);
        $manual = Manual::findOrFail($manual_id);
        $result = Manual::where('id', $manual_id)->value('views');
        Manual::where('id', $manual_id)->update(array('views' => ($result + 1)));

        return view('pages/manual_view', [
            "manual" => $manual,
            "type" => $type,
            "brand" => $brand,
        ]);
    }
}
