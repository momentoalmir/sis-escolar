<?php

namespace App\Models;

use Utils\Model;

class Disciplina extends Model
{
    public function __construct()
    {
        parent::__construct('tb_disciplinas');
    }

    public function all()
    {
        $disciplinas = parent::all();

        foreach ($disciplinas as $key => $disciplina) {
            $disciplinas[$key]['turma'] = (new Turma())->find($disciplina['idTurma']);
        }

        return $disciplinas;
    }

    public function turma()
    {
        return $this->belongsTo('tb_turmas', 'idTurma');
    }
}
