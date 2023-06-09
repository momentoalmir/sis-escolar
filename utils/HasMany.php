<?php

namespace Utils;

class HasMany
{
    protected $table;
    protected $foreignKey;
    protected $parentTable;
    protected $parentKey;

    public function __construct($table, $foreignKey, $parentTable, $parentKey)
    {
        $this->table = $table;
        $this->foreignKey = $foreignKey;
        $this->parentTable = $parentTable;
        $this->parentKey = $parentKey;
    }

    public function get($parentId)
    {
        $where = [$this->foreignKey => $parentId];
        return (new Model($this->table))->where($where)->get();
    }
}

