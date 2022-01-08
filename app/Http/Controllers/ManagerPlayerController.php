<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class ManagerPlayerController extends Controller
{
    public function index($manager_id)
    {
        $players = Player::get()->where('manager_id', $manager_id);
        if (is_null($players))
            return response()->json('Data not found', 404);
        return response()->json($players);
    }
}
