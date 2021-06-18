<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function pagesType($type)
    {
        $pages = Page::where('type', $type)->get();
        return $this->convertRoutes($pages);
    }
    public function pages()
    {
        $pages =  Page::all();
        return $this->convertRoutes($pages);
    }

    private function convertRoutes($pages){
        for($i = 0; $i < count($pages); $i++){
            $pages[$i]->route = route($pages[$i]->route);
        }
        return $pages;
    }
}
