<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
;


class enseignant extends Model 
{
    

            protected $table = 'enseignants';



            /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'nom','prenom','email', 'password',
        ];

        /**
         * The attributes excluded from the model's JSON form.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
        ];

        protected $casts = [
            'email_verified_at' => 'datetime',
        ];

}
