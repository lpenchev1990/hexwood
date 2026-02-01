<?php

namespace App\Http\Controllers;

abstract class Controller
{

    public function viewExt($file, $data = [])
    {
        $categories = config('categories');
        $data['categories'] = $categories;
        $data['countCategories']  = (int)(count($categories)/2);
//        dump($data);
        return view($file, $data);
    }
}
