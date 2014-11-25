<?php namespace TagPage\Http\Controllers;

use Illuminate\Routing\Redirector;
use TagPage\TagPage;
use URL;
use TagPage\Http\Controllers\Controller;

class TagPageController extends Controller {

    public function index(Redirector $redirector)
    {
        $root = $this->getRoot(null);

        return $redirector->to(URL::to(), 301);
    }

    public function root($root)
    {
        echo $root;
    }

    public function page($root, $page)
    {
        echo $root . "/" . $page;
    }

    protected function getRoot($root) {
        $query = TagPage::query();

        $query->where('lft', 1);

        if($root !== null)
        {
            $query->where('perma_link', $root);
        }

        return $query->first();
    }
}
