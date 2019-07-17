<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(Request $request)
    {
        $todos = Todo::paginate(10);

        return response()->json($todos, 200);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:200'
        ]);

        Todo::create([
            'title' => $request->title
        ]);

        return response()->json('success', 200);
    }

    public function show($id)
    {
        $todo = Todo::find($id);

        return response()->json($todo, 200);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->save();

        return response()->json($todo, 200);
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return response()->json('success', 200);
    }
}
