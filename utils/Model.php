<?php

namespace Utils;

class Model extends Database
{
    protected $table;
    protected $primaryKey = 'id';

    public function __construct($table)
    {
        parent::__construct();
        $this->table = $table;
    }

    public function all()
    {
        return parent::_select($this->table);
    }

    public function find($id)
    {
        return parent::_get($this->table, [$this->primaryKey => $id]);
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

    public function where($where)
    {
        return parent::_get($this->table, $where);
    }

    protected function hasMany($table, $foreignKey)
    {
        return new HasMany($table, $foreignKey, $this->table, $this->primaryKey);
    }

    protected function belongsTo($table, $foreignKey)
    {
        return new BelongsTo($table, $foreignKey, $this->table, $this->primaryKey);
    }
}
