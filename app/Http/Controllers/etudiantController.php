<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Etudiant;
use App\enseignants;
use App\Support\Collection;

class etudiantController extends Controller
{

// return la vue candidature
      public function vueCandidature($id)
    {
        return view('candidature',compact('id'));
    }
    
// ajoute un etudiant dans la base de données
    public function sauvegarder()
    {
        request()->validate([
            'identite'=>['required','alpha_num','min:8','max:8'],
            'nom'=>['required','string'],
            'prenom'=>['required','string'],
            'dateNaissance'=>['required','date'],
            'adresse'=>['required','string'],
            'tel'=>['required','size:10'],
            'email'=>['required','email'],
            'checkbox'=>['required']
        ]);

        DB::table('etudiant')
        ->insert([
                'numID'=>request('identite'),
                'nom'=>request('nom'),
                'prenom'=>request('prenom'),
                'dateNaiss'=>request('dateNaissance'),
                'adresse'=>request('adresse'),
                'Tel'=>request('tel'),
                'email'=>request('email')
            ]
        );

        return redirect('/firstConnection');
    }
    
// return la vue connection
    public function index()
    {
        return view('connection');
    }

// pour la connection
    public function store()
    {  
        request()->validate([
            'email'=>['required','email'],
            'statut'=>['required'],
            'password'=>['required','confirmed','min:8'],
            'password_confirmation'=>['required']
        ]);
        
        
            if(request('statut')== 1){
             
                $stat1=DB::table('etudiant')
                ->where('email','=',request('email'))
                ->where('passwd','=',request('password'))
                ->count();
    
                if($stat1!=0)
                {
                    $stat2=DB::table('etudiant')
                    ->where('email','=',request('email'))
                    ->where('passwd','=',request('password'))
                    ->get();
    
                    $etudiant = new Collection($stat2);
    
                    foreach($etudiant as $etudiant)
                    {
                        if(!empty($etudiant))
                        {
                            return view('espaceEtudiant',compact('etudiant'));
                        }
                    }
                }
                else
                {
                    return redirect()->back()->with('var','Vous n\'êtes pas encore inscrit');
                }
                
            }else if(request('statut') == 2){
                
                $stat3=DB::table('enseignants')
                ->where('email',request('email'))
                ->where('password',request('password'))
                ->count();
                
                if($stat3 !=0)
                {    

                    $stat3=DB::table('enseignants')
                    ->where('email',request('email'))
                    ->where('password',request('password'))
                    ->get();

                    $enseignant = new Collection($stat3);
    
                    foreach($enseignant as $enseignant)
                    {
                        if(!empty($enseignant))
                        {
                            return view('espaceEnseignant',compact('enseignant'));
                        }
                    }
                }
                else
                {
                    return redirect()->back()->with('err','Utilisateur inexistant');
                }
               
            }
    
    }


   public function candidate(Request $request,$id)
    {
       

        DB::table('etudiant')
        ->where('email','=',request('email'))
        ->update([
            'formation'=>request('formation')
            ]);

                
        $verifs = DB::table('candidature')
        ->join('etudiant','etudiant.ID','=','candidature.Etudiant_ID')
        ->where('etudiant.ID',$id)
        ->count();

        $stat2=DB::table('etudiant')
        ->where('ID',$id)
        ->get();
        
        $etudiant = new Collection($stat2);

            if($verifs == 0)
            {
                
                $path1=$request->file('formulaire')->store('formulaires','public');
                $path2=$request->file('ent')->store('ENT','public');
                $path3=$request->file('Note')->store('notes','public');
                $path4=$request->file('lm')->store('motivations','public');
                $path5=$request->file('cv')->store('CVs','public');

                DB::table('candidature')
                ->insert([
                'formulaire'=>$path1,
                'ent'=>$path2,
                'Note'=>$path3,
                'lettre'=>$path4,
                'cv'=>$path5,
                'formation_formID'=>request('formation'),
                'statut'=>1,
                'Etudiant_ID'=>$id
                 ]);

                 $success ="Candidature envoyée avec succès!";
                 foreach($etudiant as $etudiant){
                    return view ('espaceEtudiant',compact('success','etudiant'));
                 }
                
            }
            else
            {
                $err = "Vous avez déjà déposé un dossier ";
                return view('candidature',compact('err'));
            }

        
    }

    public function show($id)
    {
        $stat=DB::table('etudiant')
        ->where('ID','=',$id)
        ->get();

        $profil = new Collection($stat);
        
        $etudiant = $profil;
        foreach($etudiant as $etudiant)
        {
            return view('espaceEtudiant',compact('profil','etudiant'));
        }

    }


    public function edit($id)
    {
       $stat1=DB::table('candidature')
        ->join('formation','formation.formID','=','candidature.formation_formID')
        ->join('statut','statut.ID','=','candidature.statut')
        ->where('Etudiant_ID','=',$id)
        ->get();
        
        $stat2=DB::table('etudiant')
        ->where('ID','=',$id)
        ->get();

        $candidature = new Collection($stat1);
        
        $etudiant = new Collection($stat2);
        foreach($etudiant as $etudiant)
        {
            return view('espaceEtudiant',compact('candidature','etudiant'));
        }

 
    }

 // supprime une candidature
    public function destroy($id)
    {
        DB::table('candidature')
        ->where('Etudiant_ID',$id)
        ->delete();
        
        DB::table('etudiant')
        ->where('ID',$id)
        ->update([
            'formation'=>null
        ]);

        $stat2=DB::table('etudiant')
        ->where('ID',$id)
        ->get();
        
        $etudiant = new Collection($stat2);
        
        $success = "Candidature Supprimée";
        foreach($etudiant as $etudiant)
        {
            return view ('espaceEtudiant',compact('success','etudiant'));
        }
    }
}
