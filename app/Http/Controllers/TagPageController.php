<?php namespace TagPage\Http\Controllers;

use TagPage\Http\Controllers\Controller;

class TagPageController extends Controller {

    public function root($root)
    {
        echo $root;
    }

    public function page($root, $page)
    {
        echo $root . "/" . $page;
    }

}
