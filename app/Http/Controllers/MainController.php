<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $items = Item::all();
        return view('pages.index', compact('items', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addUser(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'balance' => 'required',
        ]);

        $newUser = User::create($validated);
        // dd($newUser);
        return redirect()->route('page.index');

    }
public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'user_id' => 'required',
        ]);

        $newItem = Item::create($validated);
        return redirect()->route('page.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function paid(string $id)
    {
        $item = Item::find($id);
        $user = User::find($item->user_id);
        $user->balance -= $item->amount;
        $item->status = 'paid';
        $item->save();
        $user->save();
        return redirect()->route('page.index');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
