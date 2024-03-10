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

    public function destroy($id)
    {
        Idea::where("id", $id)->firstOrFail()->delete();


        return redirect()->route('dashboard')->with('success', 'idea deleted successfully');
    }
}
