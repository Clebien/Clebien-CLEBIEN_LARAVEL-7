<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Support\Collection;
use Illuminate\Support\Facades\Response;

class CandidatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Permet à un enseignant de consulter les candidatures selon le statut
    public function show($id)
    {
        request()->validate([
            'statut'=>['required']
        ]);
        
        $stat1=DB::table('candidature')
        ->join('formation','formation.formID','=','candidature.formation_formID')
        ->join('statut','statut.ID','=','candidature.statut')
        ->join('etudiant','etudiant.ID','=','candidature.Etudiant_ID')
        ->where('candidature.statut',request('statut'))
        ->get();
        $stat2=DB::table('enseignants')
        ->where('id','=',$id)
        ->get();

        $candidature = new Collection($stat1);
        $enseignant = new Collection($stat2);

        foreach($enseignant as $enseignant)
        {
            return view('espaceEnseignant',compact('candidature','enseignant'));
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
