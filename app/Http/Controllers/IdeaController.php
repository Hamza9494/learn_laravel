<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        request()->validate(["idea" => "required|min:12|max:240"]);
        $idea = Idea::create(["content" => request()->input("idea")]);
        return redirect()->route('dashboard')->with('success', 'idea added successfully');
    }

    public function destroy(Idea $idea)
    {
        $idea->delete();

        return redirect()->route('dashboard')->with('success', 'idea deleted successfully');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', ["idea" => $idea]);
    }

    public function edit(Idea $idea)
    {
        return view('ideas.edit', ["idea" => $idea]);
    }
}
