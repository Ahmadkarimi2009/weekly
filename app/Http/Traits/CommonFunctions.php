<?php

namespace App\Http\Traits;
use App\Models\Student;
use App\Models\Image;
use Illuminate\Http\Request;

trait CommonFunctions {

    public function get_list_of_years() {
        $base_year = 2010;
        $current_year = date('Y');
        for ($base_year; $base_year <= $current_year; $base_year++) {
            $years[] = $base_year;
        }

        return $years;
    }

    public function store_images(Request $request) {
        $paths = [];
        foreach($request->file('images') as $index => $image) {
            $save_image = new Image;
            $name = microtime(true) . '_' . rand(100000000, 9999999999) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images', $name);

            $save_image->category_id = $request->category;
            if (isset($request->year)) {
                $save_image->year = $request->year;
            }

            if (isset($request->province)) {
                $save_image->province_id = $request->province;
            }
            $save_image->path = $path;
            $save_image->save();
            $paths[] = $path;
        }

        return $paths;
    }
}