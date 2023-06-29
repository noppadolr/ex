<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Portfolio;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function AllPortfolio(){
        $portfolio =Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all',compact('portfolio'));

    }//End AllPortfolio method
}
