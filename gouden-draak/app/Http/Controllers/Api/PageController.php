<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function pagesType($type)
    {
        $pages = Page::all()->sortBy('index')->where('type', $type)->where('active', true);
        return $this->convertRoutes($pages);
    }
    public function pages()
    {
        $pages =  Page::all()->sortBy('index')->where('active', true);
        return $this->convertRoutes($pages);
    }

    private function convertRoutes($pages){
        for($i = 0; $i < count($pages); $i++){
            $pages[$i]->route = route($pages[$i]->route);
        }
        return $pages;
    }
}
