<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class UserPlayerController extends Controller
{
    public function index($user_id)
    {
        $players = Player::get()->where('user_id', $user_id);
        if (is_null($players))
            return response()->json('Data not found', 404);
        return response()->json($players);
    }
}
