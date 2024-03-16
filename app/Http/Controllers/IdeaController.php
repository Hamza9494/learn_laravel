<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        $validated = request()->validate(["content" => "required|min:8|max:240"]);

        $validated["user_id"] = auth()->id();

        Idea::create($validated);
        return redirect()->route('dashboard')->with('success', 'idea added successfully');
    }

    public function destroy(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404, 'cant delete what is not yours my dude');
        }
        $idea->delete();


        return redirect()->route('dashboard')->with('success', 'idea deleted successfully');
    }

    public function show(Idea $idea)
    {
        // dd($idea->comments);
        return view('ideas.show', ["idea" => $idea]);
    }

    public function edit(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404, 'cant view edite what is not yours my dude');
        }

        return view('ideas.edit', ["idea" => $idea]);
    }

    public function update(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) {
            abort(404, 'cant edite what is not yours my dude');
        }

        $validated = request()->validate(["content" => "required|min:12|max:240"]);

        $idea->update($validated);
        return redirect()->route('dashboard')->with('success', 'idea updated successfully');
    }
}
