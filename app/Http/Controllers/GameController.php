<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    //
    public function index()
    {
        $data = Game::get();
        return $data;
    }
    public function show($id)
    {
        $data = Game::find($id);
        return $data;
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $game=new Game();
        $game->fill($input);
        $game->save();
        return $game;
    }
    /**
     * Update the given game.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  number  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $game =  $request->all();
        // to update, referenced by the ID passed to the REST endpoint
        $gameUpdate = Game::find($id);
        $gameUpdate->name = $game['name'];
        $gameUpdate->price = $game['price'];
        $gameUpdate->number_participants = $game['number_participants'];
        $gameUpdate->save();    
        return $gameUpdate;
    }
    public function delete($id){
        Game::where('id', $id)->delete();
        return ['status' => 'success'];
    }
    public function autocomplete($name)
    {
        if($name=="null"||$name==''){
           return Game::get(); 
        }
        $data = Game::where("name","LIKE","%{$name}%")
                ->get();
   
        return $data;
    }
}
