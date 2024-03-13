<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        // dd(request()->all());
        $validated = request()->validate(["content" => "required|min:12|max:240"]);
        Idea::create(request()->all());
        return redirect()->route('dashboard')->with('success', 'idea added successfully');
    }

    public function destroy(Idea $idea)
    {
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
        return view('ideas.edit', ["idea" => $idea]);
    }

    public function update(Idea $idea)
    {
        $validated = request()->validate(["content" => "required|min:12|max:240"]);

        $idea->update($validated);
        return redirect()->route('dashboard')->with('success', 'idea updated successfully');
    }
}
