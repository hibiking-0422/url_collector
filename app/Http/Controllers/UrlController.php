<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//使用model
use App\Url;
use App\Genre;

class UrlController extends Controller
{
    public function index(Request $request) {
        $urls = Url::all();
        return view('url.index', ['urls' => $urls]);
    }

    public function add(Request $request) {
        $genres = Genre::all();
        return view('url.add', ['genres' => $genres]);
    }

    public function create(Request $request) {
        $url = new Url;
        $genres = $request->genres;//genres取り出し
        $form = $request->all();
        
        unset($form['genres']);//不要カラム削除
        unset($form['_token']);

        $url->fill($form)->save();//url保存
        $url->genres()->attach($genres);//中間テーブルに保存

        return redirect('/url');
    }

    public function edit(Request $request) {
        $url = Url::find($request->id);
        return view('url.edit', ['url' => $url]);
    }

    public function update(Request $request) {
        $url = Url::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $url->fill($form)->save();
        return redirect('/url');
    }

    public function delete(Request $request) {
        $url = Url::find($request->id);
        return view('url.del', ['url' => $url]);
    }

    public function remove(Request $request) {
        Url::find($request->id)->delete();
        return redirect('/url');
    }

    public function getUrls(Request $request) {
        $id = $request->input('ID');
        $genre = Genre::find($id);
        return $genre->urls->toJson();
    }

    public function getAllUrls(Request $request) {
        $urls = Url::all();
        return $urls->toJson();
    }
}
