<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use App\Models\Categories;
use App\Models\CategoryMovie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function getMovies()
    {
        $movies = Movies::all();
        $categories = Categories::all();
        $categoryMovie = CategoryMovie::all();

        foreach ($movies as $movie) {
            $categoryIds = $categoryMovie->where('movie_id', $movie->id)->pluck('category_id');
            $categoryNames = [];
            foreach ($categoryIds as $categoryId) {
                $categoryName = $categories->where('id', $categoryId)->first()->name;
                array_push($categoryNames, $categoryName);
            }
            if(empty($categoryNames))
            {
                $categoryNames = ['No category'];
            }
            $movie->setAttribute('categoryName', $categoryNames);
        }
        return response()->json($movies);

    }
    public function addMovie(Request $request)
    {
        $category = new Categories();
        $category->name = $request->genre;
        $category->save();
        $catId = $category->id;
        $movie = new Movies();
        $movie->tittle = $request->tittle;
        $movie->director = $request->director;
        $movie->year = $request->year;
        $movie->rate = $request->rating;
        $movie->save();
        $movieId = $movie->id;
        $categoryMovie = new CategoryMovie();
        $categoryMovie->movie_id = $movieId;
        $categoryMovie->category_id = $catId;
        $categoryMovie->save();
        return response()->json([
            'message' => 'Movie record created'
        ], 201);
    }

    public function searchMovie(Request $request){
        $movies = Movies::where('tittle', 'like', '%' . $request->search . '%')->get();
        $categories = Categories::all();
        $categoryMovie = CategoryMovie::all();

        foreach ($movies as $movie) {
            $categoryIds = $categoryMovie->where('movie_id', $movie->id)->pluck('category_id');
            $categoryNames = [];
            foreach ($categoryIds as $categoryId) {
                $categoryName = $categories->where('id', $categoryId)->first()->name;
                array_push($categoryNames, $categoryName);
            }
            if(empty($categoryNames))
            {
                $categoryNames = ['No category'];
            }
            $movie->setAttribute('categoryName', $categoryNames);
        }
        return response()->json($movies);
    }
}
