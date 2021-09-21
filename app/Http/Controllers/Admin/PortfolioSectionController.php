<?php

namespace App\Http\Controllers\Admin;

use App\Models\portfolio;
use App\Services\Perform;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PortfolioRequest;

class PortfolioSectionController extends Controller
{
    public function portfolioSection()
    {
        $portfolio = Perform::index(Portfolio::class);

        return view('admin.homepage.portfolio', compact(['portfolio']));
    }

    public function updatePortfolioSection(PortfolioRequest $request)
    {
        Perform::update(Portfolio::class, $request);

        return redirect()->route('portfolio.index')->with(['success' => 'changed updated successfully']);
    }
}
