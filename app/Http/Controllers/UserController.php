<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Support\Collection;
use App\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // returne la page d'authentification de l'administrateur
    public function index()
    {
        return view('adminAuthentification');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function ajouter()
    {
        return redirect()->to('/admin');
    }
        
    // permet à l'administrateur d'ajouter un enseignant
    public function create()
    {
        request()->validate([
            'nom'=>['required'],
            'prenom'=>['required'],
            'email'=>['required','email'],
            'password'=>['required','confirmed','min:8'],
            'password_confirmation'=>['required']
        ]);

        DB::table('enseignants')
        ->insert([
            'nom'=>request('nom'),
            'prenom'=>request('prenom'),
            'email'=>request('email'),
            'password'=>request('password')
        ]);
        
        return redirect()->back('Ajouter avec succès');
    }

    // returne la page d'ajout des enseignants 
    public function ajouterPage()
    {
        return view('ajouterEnseignant');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
       
    // permet à l'administrateur de se connecter
    public function store()
    {
        request()->validate([
            'email'=>['required','email'],
            'password'=>['required','min:5'],
        ]); 

        $stat=DB::table('users')
            ->where('email',request('email'))
            ->where('password',request('password'))
            ->count();
            if($stat!=0)
            {
                $stat=DB::table('users')
                ->where('email',request('email'))
                ->where('password',request('password'))
                ->get();
                return redirect('/ajouterPage');
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Retourne la vue profilEnseignant permettant de modifer le profil de l'enseignant
    public function show($id)
    {
        $enseignant = DB::table('enseignants')
                    ->where('id',$id)
                    ->get();
        foreach($enseignant as $enseignant)
        {
            return view('profilEnseignant',compact('enseignant'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // Permet à un enseignant de consulter les candidatures selon le niveau
    public function edit($id)
    {
        $stat1=DB::table('candidature')
        ->join('formation','formation.formID','=','candidature.formation_formID')
        ->join('statut','statut.ID','=','candidature.statut')
        ->join('etudiant','etudiant.ID','=','candidature.Etudiant_ID')
        ->where('candidature.formation_formID',request('niveau'))
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if(request('password')!=null)
        {
            $request->validate([
                'nom'=>['required'],
                'prenom'=>['required'],
                'email'=>['required','email'],
                'password'=>['required','confirmed','min:8'],
                'password_confirmation'=>['required']
            ]);

            DB::table('enseignants')
            ->where('id',$id)
            ->update([
                'nom'=>request('nom'),
                'prenom'=>request('prenom'),
                'email'=>request('email'),
                'password'=>request('password')
            ]);
        }
        else{
            $request->validate([
                'nom'=>['required'],
                'prenom'=>['required'],
                'email'=>['required','email'],
            ]);
    
            DB::table('enseignants')
            ->where('id',$id)
            ->update([
                'nom'=>request('nom'),
                'prenom'=>request('prenom'),
                'email'=>request('email'),
            ]);
        }
        $enseignant = DB::table('enseignants')
        ->where('id',$id)
        ->get();
        $success = "Profil mis à jour";

        foreach($enseignant as $enseignant)
        {
            return view('espaceEnseignant',compact('enseignant','success'));
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
