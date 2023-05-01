<?php

namespace Utils;

class Model extends Database
{
    protected $table;

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        return parent::_select($this->table);
    }

    public function find($id)
    {
        return parent::_get($this->table, ['id' => $id]);
    }

    public function create($data)
    {
        parent::_insert($this->table, $data);
    }

    public function update($data, $where)
    {
        parent::_update($this->table, $data, $where);
    }

    public function delete($where)
    {
        parent::_delete($this->table, $where);
    }
}

