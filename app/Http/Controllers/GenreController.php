<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class GenreController extends Controller
{
    public function index(Request $request) {
        $genres = Genre::all();
        return view('genre.index', ['genres' => $genres]);
    }

    public function add(Request $request) {
        return view('genre.add');
    }

    public function create(Request $request) {
        $genre = new Genre;
        $form = $request->all();
        unset($form['_token']);
        $genre->fill($form)->save();
        return redirect('/genre');
    }

    public function edit(Request $request) {
        $genre = Genre::find($request->id);
        return view('genre.edit', ['genre' => $genre]);
    }

    public function update(Request $request) {
        $genre = Genre::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $genre->fill($form)->save();
        return redirect('/genre');
    }

    public function delete(Request $request) {
        $genre = Genre::find($request->id);
        return view('genre.del', ['genre' => $genre]);
    }

    public function remove(Request $request) {
        Genre::find($request->id)->delete();
        return redirect('/genre');
    }

    public function json($id = -1) {
        if($id == -1) {
            return Genre::get()->toJson();
        }
        else{
            return Genre::find($id)->toJson();
        }
    }

    public function searchGenres(Request $request) {
        $searchWord = $request->input('TXT');
        $genres = Genre::where('genre_name', $searchWord)->get()->toJson();
        return $genres;
    }
}
