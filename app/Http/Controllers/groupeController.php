<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Repositories\EtudiantRepository;
use App\Etudiant;
use App\Support\Collection;

class groupeController extends Controller
{


    protected $etudiantRepository;

    public function __construct(EtudiantRepository $etudiantRepository)
	{
		$this->etudiantRepository = $etudiantRepository;
	}

    // return le formulaire contact
    public function index()
    {
        return view('messageEtudiant');
    }

    // envoi de mail
    public function create()
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

        $stat=DB::table('etudiant')
        ->where('email','=',request('login'))
        ->get();

        $etudiant = new Collection($stat);
        $success = "Message envoyé";
        foreach($etudiant as $etudiant)
        {
            return view('espaceEtudiant',compact('etudiant','success'));
        }
    }

    // permet de modifier les infos de l'étudiant
    public function show($id)
    {
        $etudiant = $this->etudiantRepository->getById($id);

		return view('edit',  compact('etudiant'));

    }

    // affiche le profil de l'enseignant
    public function edit($id)
    {
        $stat1 = DB::table('enseignants')
        ->where('id',$id)
        ->get();

        $enseignant = new Collection($stat1);
        $profil = $enseignant;
        foreach($enseignant as $enseignant)
        {
            return view('espaceEnseignant',compact('enseignant','profil'));
        }
    }
    // permet à l'administrateur d'ajouter un enseignant
    public function store()
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
        
        return redirect()->back()->with('status', 'Ajouter avec succès');
    }
// mettre à jour le profil de l'etudiant
    public function update($id)
    {  
        
        if(request('password')!=null)
        {
                request()->validate([
                    'numID'=>['required','alpha_num','min:8','max:8'],
                    'nom'=>['required','string'],
                    'prenom'=>['required','string'],
                    'dateNaiss'=>['required','date'],
                    'adresse'=>['required','string'],
                    'Tel'=>['required','size:10'],
                    'email'=>['required','email'],
                    'password'=>['required','confirmed','min:8'],
                    'password_confirmation'=>['required'],
                ]);
                DB::table('etudiant')
                ->where('ID','=',$id)
                ->update([
                    'numID'=>request('numID'),
                    'nom'=>request('nom'),
                    'prenom'=>request('prenom'),
                    'dateNaiss'=>request('dateNaiss'),
                    'adresse'=>request('adresse'),
                    'Tel'=>request('Tel'),
                    'email'=>request('email'),
                    'passwd'=>request('password')
                ]);
        }
        else{

                request()->validate([
                    'numID'=>['required','alpha_num','min:8','max:8'],
                    'nom'=>['required','string'],
                    'prenom'=>['required','string'],
                    'dateNaiss'=>['required','date'],
                    'adresse'=>['required','string'],
                    'Tel'=>['required','size:10'],
                    'email'=>['required','email'],
                ]);
                DB::table('etudiant')
                ->where('ID','=',$id)
                ->update([
                    'numID'=>request('numID'),
                    'nom'=>request('nom'),
                    'prenom'=>request('prenom'),
                    'dateNaiss'=>request('dateNaiss'),
                    'adresse'=>request('adresse'),
                    'Tel'=>request('Tel'),
                ]);
        }

            return redirect('/connection')->with('success','Profil mis à jour reconnectez-vous');

        
    }

}
