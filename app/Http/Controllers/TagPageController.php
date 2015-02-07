<?php namespace TagPage\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use TagPage\Tag;
use TagPage\TagPage;
use URL;
use View;

class TagPageController extends Controller {

    /**
     * Display page or redirect to index
     * @param Redirector $redirector
     * @param $path
     * @return mixed
     */
    public function page(Redirector $redirector, $path = '')
    {
        if ($path == '') {
            return $this->index($redirector)->with('404', 'root');
        }

        if (!($page = $this->getPage($path))) {
            return $this->index($redirector)->with('404', 'root');
        }

        if ($page->perma_link != $path) {
            return $redirector->to($page->perma_link, 302);
        }

        return $this->buildPageView($page);
    }

    /**
     * Redirects to the first leave, else to administration
     * @param Redirector $redirector
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index(Redirector $redirector)
    {
        if ($index = $this->getIndex()) {
            return $redirector->to($index->perma_link, 301);
        }

        return $redirector->to('admin')->with('404', 'index');
    }

    /**
     * Returns first leave
     * @return TagPage|null
     */
    protected function getIndex()
    {
        return TagPage::allLeaves()->orderBy('lft')->first();
    }

    /**
     * Only leaves are pages!
     * @param $permaLink
     * @return TagPage|null
     */
    protected function getPage($permaLink)
    {
        if (!($page = TagPage::where('perma_link', $permaLink)->first())) {
            return null;
        }

        if ($page->isLeaf()) {
            return $page;
        }

        return $page->leaves()->orderBy('lft')->first();
    }

    /**
     * @param TagPage $page
     * @return mixed
     */
    protected function buildPageView(TagPage $page)
    {
        $viewFile = $this->theme() . '.pages.page';

        if (View::exists($this->theme() . '.pages.page_' . $page->name)) {
            $viewFile = $this->theme() . '.pages.page_' . $page->name;
        }

        return View::make($viewFile, [
            'page' => $page,
            'posts' => $page->posts()
        ]);
    }

    /**
     * @return string
     */
    public function theme()
    {
        return 'themes.default';
    }
}
