<?php namespace TagPage\Http\Controllers\Admin;

use TagPage\Http\Controllers\Controller;
use View;

class AdminController extends Controller {

    public function __construct()
    {

    }

    public function dashboard()
    {
        return View::make('admin.index');
    }
}
