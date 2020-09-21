<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller {
    public function likeIt(Answer $answer)
    {
        $answer->likes()->create([
            'user_id' => Auth::id(),
        ]);

//        broadcast(new LikeEvent($reply->id, 1))->toOthers();
    }

    public function unLikeIt(Answer $answer)
    {
        $answer->likes()->where('user_id', Auth::id())->first()->delete();
//        broadcast(new LikeEvent($reply->id, 0))->toOthers();
    }
}
