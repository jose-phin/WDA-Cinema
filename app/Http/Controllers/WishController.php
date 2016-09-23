<?php

namespace App\Http\Controllers;

use App\Wish;
use Illuminate\Http\Request;

class WishController extends Controller
{
    public function store(Request $request) {
        $user = $request->user();

        $wish = new Wish;
        $wish->user_id = $user->id;
        $wish->movie_id = $request->movie_id;

        $wish->save();
    }

    public function delete(Request $request) {
        Wish::destroy($request->wish_id);
    }

}
