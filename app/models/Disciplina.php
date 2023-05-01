<?php

namespace App\Models;

use Utils\Model;

class Disciplina extends Model
{
    public function __construct()
    {
        parent::__construct('tb_disciplinas');
    }

    public function turma()
    {
        return $this->belongsTo('tb_turmas', 'idTurma');
    }
}
