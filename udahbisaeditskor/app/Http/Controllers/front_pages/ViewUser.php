<?php

namespace App\Http\Controllers\front_pages;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ViewUser extends Controller
{
    public function index(): Factory|View
    {
        $pageConfigs = ['myLayout' => 'front'];
        return view('content.front-pages.view_user', ['pageConfigs' => $pageConfigs]);
    }
}
