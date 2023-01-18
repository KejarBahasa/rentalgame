<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Loan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $game = Game::findOrFail($id);
        
        return view('checkout.index', compact('game'));
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

            return redirect()->route('transaction.index')->with('success', 'Success added loan account');
        } catch(Exception $e){
            return redirect()->route('transaction.index')->with('error', $e->getMessage());
        }
    }
}
