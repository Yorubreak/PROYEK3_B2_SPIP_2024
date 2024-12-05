<?php

namespace App\Http\Controllers\front_pages;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ViewUserPencapaiantujuan extends Controller
{
    public function index(): Factory|View
    {
        $pageConfigs = ['myLayout' => 'front'];
        return view('content.front-pages.view-user-pencapaiantujuan', ['pageConfigs' => $pageConfigs]);
    }
}
