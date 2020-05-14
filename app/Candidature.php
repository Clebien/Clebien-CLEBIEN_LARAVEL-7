<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    protected $table = 'candidature';
    public $timestamps = false;
    
	public function formation() 
	{
		return $this->belongsTo('App\Formation');
	}
	public function etudiant()
	{
		return $this->belongsTo('App\Etudiant');
	} 
	

}