<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Movie;
use App\Category;

class CategoriesController extends Controller
{

    public function show($id)
    {
        $movies = Category::find($id)->movies;
        return view('movies.index', compact('movies'));
    }
}
