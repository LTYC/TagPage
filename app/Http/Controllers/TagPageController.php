<?php namespace TagPage\Http\Controllers;

use Illuminate\Routing\Redirector;
use TagPage\Http\Controllers\Controller;
use TagPage\Tag;
use TagPage\TagPage;
use URL;
use View;

class TagPageController extends Controller {

    /**
     * @param Redirector $redirector
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(Redirector $redirector)
    {
        $root = $this->getRoot(null);

        if ($root === null) {
            return $redirector->to(URL::to('admin'), 302);
        }

        $page = $this->getIndex($root);

        if ($page === null) {
            return $redirector->to(URL::to('admin'), 302);
        }

        return $redirector->to(URL::to($root->perma_link), 301);
    }

    /**
     * @param Redirector $redirector
     * @param $permaLink
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function root(Redirector $redirector, $permaLink)
    {
        if ($root = $this->getRoot($permaLink)) {
            if ($index = $this->getIndex($root)) {
                return $redirector->to(URL::to($root->perma_link . '/' . $index->perma_link), 301);
            }
        }

        return $redirector->to(URL::to('admin'), 302);
    }

    public function page(Redirector $redirector, $rootPermaLink, $pagePermaLink)
    {
        if (!($root = $this->getRoot($rootPermaLink))) {
            return $this->index($redirector)->with('404', 'root');
        }

        if (!($page = $this->getPage($root, $pagePermaLink))) {
            return $this->root($redirector, $root)->with('404', 'page');
        }

        return $this->buildPageView($page);
    }

    /**
     * @param null $permaLink
     * @return \TagPage\TagPage|null
     */
    protected function getRoot($permaLink = null)
    {
        $query = TagPage::query();

        $query->where('lft', 1);

        if ($permaLink !== null) {
            $query->where('perma_link', $permaLink);
        }

        return $query->first();
    }

    protected function getIndex(TagPage $root)
    {
        if (!$root->isRoot()) {
            throw new \Exception();
        }

        return $root->children()->where('lft', $root->lft + 1)->first();
    }

    protected function getPage(TagPage $root, $permaLink)
    {
        if (!$root->isRoot()) {
            throw new \Exception();
        }

        return $root->descendants()->where('perma_link', $permaLink)->first();
    }

    protected function buildPageView(TagPage $page)
    {
        $viewFile = $this->theme() . '.pages.page';

        if (View::exists($this->theme() . '.pages.page_' . $page->perma_link)) {
            $viewFile = $this->theme() . '.pages.page_' . $page->perma_link;
        }

        return View::make($viewFile, [
            'page' => $page
        ]);
    }

    public function theme()
    {
        return 'themes.default';
    }
}
