<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Loan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::with('user:id,name', 'game:id,name')->get();


        return view('loan.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $games = Game::where('status', 0)->get();

        return view('loan.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required',
            'create_date' => 'required|date',
            'return_date' => 'required|date|after:create_date',
        ]);

        try {
            $loan = Loan::create([
                'game_id' => $request->game_id,
                'user_id' => Auth::user()->id,
                'create_date' => $request->create_date,
                'return_date' => $request->return_date,
            ]);

            $game = Game::find($loan->game_id);

            $game->update([
                'status' => 1,
            ]);            

            return redirect()->route('loan.index')->with('success', 'Success added loan account');
        } catch(Exception $e){
            dd($e);
            return redirect()->route('loan.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        try {
            $loan = Loan::find($id);

            $game = Game::find($loan->game_id);

            $loan->update([
                'status' => 1,
            ]);

            $game->update([
                'status' => 0,
            ]);            

            return redirect()->route('loan.index')->with('success', 'Success added loan account');
        } catch(Exception $e){
            dd($e);
            return redirect()->route('loan.index')->with('error', $e->getMessage());
        }
    }
}
