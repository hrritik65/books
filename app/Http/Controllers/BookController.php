<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //
    public function storeBooks(Request $req)
    {
        $userBooks = DB::table('books')->where('user', Auth::id())->count();

        if ($req->books) {
            if ($userBooks == count($req->books)) {
                return "Already Up to Date ";
            } else {
                foreach ($req->books as $book) {
                    $b = $book["volumeInfo"];
                    $author = $b["authors"];
                    $thumb = $b["imageLinks"];
                    if (array_key_exists('subtitle', $b)) {
                        $sub = $b["subtitle"];
                    } else {
                        $sub = "no subtitle";
                    }
                    $data = DB::table('books')->insert([
                        "book_id" => $book["id"],
                        "authors" => $author[0],
                        "title" => $b["title"],
                        "subtitle" => $sub,
                        "thumbnail" => $thumb["thumbnail"],
                        "small_thumbnail" => $thumb["smallThumbnail"],
                        "user" => Auth::id()
                    ]);
                }
            }
        }
    }
}
