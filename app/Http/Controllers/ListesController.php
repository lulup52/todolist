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
        return Listes::orderBy('created_at', 'DESC')->get();
    }


    public static  function todoListe(Request $request)
    {
        $todoListe = Todos::where("liste_id", "$request->id" )->get();
        if(count($todoListe) !== 0) {
            return $todoListe;    

        }
        return "this list doesn't exist";
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
        $newListe->name = $request->item["name"];
        $newListe->save();

        return $newListe;    
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
            $existingListe->finished = $request->item['finished'] ? true : false;
            $existingListe->save();

            return $existingListe;
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

            return "the liste is successfully deleted";
        }
        return "the liste is not found";


    }
}
