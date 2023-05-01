<?php

namespace App\Models;

use Utils\Model;

class Turma extends Model
{
    public function __construct()
    {
        parent::__construct('tb_turmas');
    }

    public function disciplinas()
    {
        return $this->hasMany('tb_disciplinas', 'idTurma');
    }
}
