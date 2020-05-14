<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Etudiant;
use App\enseignants;
use App\Support\Collection;

class downloadController extends Controller
{
    public function form($id)
    {
        $files=DB::table('candidature')
        ->where('candidature.candidatureID','=',$id)
        ->take(1)
        ->value('formulaire');
        
        return response()->download('storage/'.$files);

    }

    public function ent($id)
    {
        $files=DB::table('candidature')
        ->where('candidature.candidatureID','=',$id)
        ->take(1)
        ->value('ent');
        
        return response()->download('storage/'.$files);

    }

    public function note($id)
    {
        $files=DB::table('candidature')
        ->where('candidature.candidatureID','=',$id)
        ->take(1)
        ->value('Note');
        
        return response()->download('storage/'.$files);

    }

    public function lettre($id)
    {
        $files=DB::table('candidature')
        ->where('candidature.candidatureID','=',$id)
        ->take(1)
        ->value('lettre');
        
        return response()->download('storage/'.$files);

    }

    public function cv($id)
    {
        $files=DB::table('candidature')
        ->where('candidature.candidatureID','=',$id)
        ->take(1)
        ->value('cv');
        
        return response()->download('storage/'.$files);

    }

}
