<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::latest()->get();
        $completed_todos = Todo::where("is_completed", true)->latest()->get();
        $incompleted_todos = Todo::where("is_completed", false)->latest()->get();
        return view("todos.index", [
            "todos" => $todos,
            "completed_todos" => $completed_todos,
            "incompleted_todos" => $incompleted_todos
        ]);
    }

    public function store(TodoRequest $request)
    {
       $todo = Todo::create($request->all());
       return redirect("/todos");
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $todo = Todo::find($id);
        return view("todos.edit", [
            "todo"=> $todo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TodoRequest $request, $id)
    {
     $todo = Todo::find($id);
     $todo->update($request->all());

     return redirect("/todos");
    }


public function completed(Request $request, $id)
    {

     $todo = Todo::find($id);
    $todo->is_completed = $request->is_completed ? 1 : 0;
     $todo->save();

        return redirect("/todos");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Todo::where("id", $id)->delete();
        return redirect("/todos");
    }
}