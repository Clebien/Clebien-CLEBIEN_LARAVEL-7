<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Etudiant extends Model
{
    

    protected $table = 'etudiant';



        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'numID','nom','prenom','dateNaiss','adresse','Tel','email', 'passwd','formation',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'passwd', 'remember_token',
    ];
    /**
     * Get the password for the user.
     *
     * @return string
     */

}
