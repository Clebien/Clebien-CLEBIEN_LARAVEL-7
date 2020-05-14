<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\EtudiantRepository;
use App\Etudiant;
use App\Support\Collection;

class enseignantController extends Controller
{


    protected $etudiantRepository;

    public function __construct(EtudiantRepository $etudiantRepository)
	{
		$this->etudiantRepository = $etudiantRepository;
    }
    
    public function index()
    {
        return ('ajouterEnseignant');
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

    public function store($id)
    {
        dd(request('statut'));  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // permet d'afficher toute les candidatures
    public function show($id)
    {  
        $stat1=DB::table('candidature')
        ->join('formation','formation.formID','=','candidature.formation_formID')
        ->join('statut','statut.ID','=','candidature.statut')
        ->join('etudiant','etudiant.ID','=','candidature.Etudiant_ID')
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

    // Appelle la vue édutier 
    public function edit($id)
    {

        $stat1=DB::table('candidature')
        ->join('formation','formation.formID','=','candidature.formation_formID')
        ->join('statut','statut.ID','=','candidature.statut')
        ->join('etudiant','etudiant.ID','=','candidature.Etudiant_ID')
        ->where('candidatureID','=',$id)
        ->get();

        $candidature = new Collection($stat1);

         return view('etudier',compact('candidature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // permet d'etudier la candidature (modifie le statut de la candidature)
    public function update($id)
    {  
        request()->validate([
            'statut'=>['required'],
            'mail'=>['required','email']
        ]);

        DB::table('candidature')
        ->where('candidatureID',$id)
        ->update([
            'statut'=>request('statut'),
            'ensMail'=>request('mail')
        ]);

        $stat=DB::table('enseignants')
        ->where('email',request('mail'))
        ->get();
        $enseignant = new Collection($stat);
        foreach($enseignant as $enseignant)
        {
            return view('espaceEnseignant',compact('enseignant'));
        }

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
