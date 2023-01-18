<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Exception;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $games = Game::all();
            return view('game.index', compact('games'));
        } catch (Exception $e){
            return redirect()->route('game.index')->with('error', $e->getMessage());
        }   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation input
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'photo' => 'required|mimes:png,jpg,jpeg'
        ]);

        $fileName = 'Game-'.time().'.'.$request->photo->extension();  
     
        $request->photo->move(public_path('uploads'), $fileName);

        try {
            Game::create(array_merge($request->except('token', 'photo'), ['photo' => $fileName]));

            return redirect()->route('game.index')->with('success', 'Success added game account');
        } catch(Exception $e){
            dd($e);
            return redirect()->route('game.index')->with('error', $e->getMessage());
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $game = Game::findOrFail($id);
            return view('game.edit', compact('game'));
        } catch (Exception $e){
            return redirect()->route('game.index')->with('error', $e->getMessage());
        }   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ]);

        try {
            $game = Game::findOrFail($id);

            $game->update($request->except('token'));

            return redirect()->route('game.index')->with('success', 'updated success');
        } catch (Exception $e){
            return redirect()->route('game.index')->with('error', $e->getMessage());
        }   
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $game = Game::findOrFail($id);
            $game->delete();

            return redirect()->route('game.index')->with('success', 'delete success');
        } catch (Exception $e){
            return redirect()->route('game.index')->with('error', $e->getMessage());
        }   
    }
}
