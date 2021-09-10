<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todos;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Todos::orderBy('created_at', 'DESC')->get();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTodos = new Todos;
        $newTodos->content = $request->content;
        $newTodos->liste_id = $request->liste_id;
        $newTodos->save();

       return redirect("/api/todo_liste/$request->liste_id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $existingTodo = Todos::find($id);
        $listeId= $existingTodo->liste_id;

        if($existingTodo) {
            $existingTodo->content = $request->content;
            $existingTodo->save();

            return redirect("/api/todo_liste/$listeId");
        }

        return "todo item not found";
    }

    public function updateState(Request $request, $id)
    {
        $existingTodo = Todos::find($id);
        $listeId= $existingTodo->liste_id;

        if($existingTodo) {

            $existingTodo->finished = !$existingTodo->finished;
            $existingTodo->save();

            return redirect("/api/todo_liste/$listeId");
        }

        return "todo item not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingTodo = Todos::find($id);
        $listeId= $existingTodo->liste_id;
        if($existingTodo) {
            $existingTodo->delete();

            return redirect("/api/todo_liste/$listeId");
        }
        return "the todo item is not found";

    }
}
