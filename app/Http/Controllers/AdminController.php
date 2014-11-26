<?php namespace TagPage\Http\Controllers;

use TagPage\Http\Controllers\Controller;
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
