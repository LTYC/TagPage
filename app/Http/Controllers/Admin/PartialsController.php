<?php

namespace TagPage\Http\Controllers\Admin;

use TagPage\Http\Controllers\Controller;
use View;

class PartialsController extends Controller {

    public function load($view) {
        if(!View::exists('admin.partials.' . $view)) {
            return response("View not found.", 404);
        }

        return View::make('admin.partials.' . $view);
    }

}