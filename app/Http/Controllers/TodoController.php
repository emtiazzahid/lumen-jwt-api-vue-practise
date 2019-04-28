<?php

namespace App\Http\Controllers;

use App\Model\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Todo::get(), 200);
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

    }

    public function update(Post $post, $id)
    {

    }

    public function destroy($id)
    {

    }
}
