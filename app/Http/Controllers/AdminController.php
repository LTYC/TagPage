<?php namespace TagPage\Http\Controllers;

use View;

class AdminController extends Controller {

    public function dashboard()
    {
        return View::make('admin.' . $this->theme() . '.index');
    }

    public function theme() {
        return 'themes.default';
    }
}
