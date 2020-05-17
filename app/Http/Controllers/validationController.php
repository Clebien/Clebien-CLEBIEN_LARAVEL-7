<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Etudiant;
use App\Support\Collection;
use App\Http\Controllers\Controller;

class validationController extends Controller
{

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // return le formulaire contact
    public function index()
    {
        return view('messageEnseignant');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     // Creation de mot de passe de l'etudiant
    public function create()
    {
        request()->validate([
            'email'=>['required','email'],
            'password'=>['required','confirmed','min:8'],
            'password_confirmation'=>['required']
        ]);
        
       $id=DB::table('etudiant')
       ->where('email',request('email'))
       ->take(1)
       ->value('ID');
        if(empty($id)){
            return redirect()->back()->with('error','Email incorrect');
            
        }
       DB::table('etudiant')
        ->where('ID',$id)
        ->update([
            'passwd'=>request('password')
        ]);
        return redirect('/connection');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // Permet à l'enseignant d'envoyer un message à l'administrateur
    
    public function store()
    {
        request()->validate([
            'nom'=>['required'],
            'login'=>['required','email'],
            'contenu'=>['required','string','max:200']
        ]);

        DB::table('messagerie')
        ->insert([
            'nom'=>request('nom'),
            'login'=>request('login'),
            'contenu'=>request('contenu')
        ]);

        $stat=DB::table('enseignants')
        ->where('email','=',request('login'))
        ->get();

        $enseignant = new Collection($stat);
        $success = "Message envoyé";
        foreach($enseignant as $enseignant)
        {
            return view('espaceEnseignant',compact('enseignant','success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // afficher le profil de l'enseignant
    public function show($id)
    {
        $stat= DB::table('enseignants')
            ->where('id',$id)
            ->get();
        $enseignant=new Collection($stat);
        foreach($enseignant as $enseignant)
        {
            return view('espaceEnseignant',compact('enseignant'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Retourne la vue de modification de la candidature
    public function edit($id)
    {
        $stat = DB::table('candidature')
        ->join('formation','formation.formID','=','candidature.formation_formID')
        ->where('Etudiant_ID','=',$id)
        ->get();
        $candidature = (new Collection($stat));
        foreach($candidature as $candidature)
        {
            return view('modifierCandidature',compact('candidature'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // Modifier la candidature de l'étudiant
    public function update(Request $request ,$id)
    {
        
        DB::table('etudiant')
        ->where('ID',$id)
        ->update([
            'formation'=>request('formation')
            ]);

        $stat2=DB::table('etudiant')
        ->where('ID',$id)
        ->get();
        
        $etudiant = new Collection($stat2);

        $path1=$request->file('formulaire')->store('formulaires','public');
        $path2=$request->file('ent')->store('ENT','public');
        $path3=$request->file('Note')->store('notes','public');
        $path4=$request->file('lm')->store('motivations','public');
        $path5=$request->file('cv')->store('CVs','public');

        DB::table('candidature')
        ->where('Etudiant_ID',$id)
        ->update([
        'formulaire'=>$path1,
        'ent'=>$path2,
        'Note'=>$path3,
        'lettre'=>$path4,
        'cv'=>$path5,
        'formation_formID'=>request('formation'),
        'statut'=>1,
         ]);
        
        $success ="Candidature Modifée avec succès!";
        foreach($etudiant as $etudiant)
        {
            return view ('espaceEtudiant',compact('success','etudiant'));
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
