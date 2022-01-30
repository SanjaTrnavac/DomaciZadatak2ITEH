<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlayerCollection;
use App\Http\Resources\PlayerResource;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return new PlayerCollection($players);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required',
            'euro_net_worth' => 'required',
            'club_id' => 'required'

        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $player = Player::create([
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'euro_net_worth' => $request->euro_net_worth,
            'club_id' => $request->club_id,
            'user_id' => Auth::user()->id,
        ]);

        return response()->json(['Player is added successfully!', new PlayerResource($player)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return new PlayerResource($player);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required',
            'euro_net_worth' => 'required',
            'club_id' => 'required'

        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        
            $player -> name = $request->name;
            $player -> date_of_birth = $request->date_of_birth;
            $player -> euro_net_worth = $request->euro_net_worth;
            $player -> club_id = $request->club_id;
            $player -> save();
    
        return response()->json(['Player is updated successfully!', new PlayerResource($player)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();

        return response()->json('Player is deleted successfully!');
    }
}
