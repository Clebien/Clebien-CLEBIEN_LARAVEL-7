<?php

namespace App\Repositories;

use App\Etudiant;

class EtudiantRepository extends ResourceRepository
{

    public function __construct(Etudiant $etudiant)
	{
		$this->model = $etudiant;
	}

}