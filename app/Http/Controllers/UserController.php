<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(3);
        return view("users.show", ['user' => $user, 'ideas' => $ideas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editing = true;
        $ideas = $user->ideas()->paginate(3);
        return view("users.show", ['user' => $user, 'editing' => $editing, 'ideas' => $ideas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }
}
