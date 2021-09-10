<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listes;
use App\Models\Todos;

class ListesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allListes = Listes::orderBy('created_at', 'DESC')->get();
        return view("welcome", compact('allListes'));
    }


    public static  function todoListe(Request $request)
    {
        $listeTitle = Listes::where("id", "$request->id" )->get()[0]->name;
        $liste_id = $request->id;
        $todoListe = Todos::where("liste_id", "$request->id" )->get();

        return view("todoListe", compact('todoListe', 'liste_id', 'listeTitle'));    

        
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
        $newListe = new Listes;
        $newListe->name = $request->name;
        $newListe->save();

        return redirect('/api');
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
        $existingListe = Listes::find($id);
        if($existingListe) {
            $existingListe->finished = $request->finished ? true : false;
            $existingListe->name = $request->name;
            $existingListe->save();

            return redirect('/api');
        }

        return "liste not found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingListe = Listes::find($id);
        if($existingListe) {
            $existingListe->delete();

            return redirect('/api');

        }
        return "the liste is not found";


    }
}
