<?php

class Table
{

    public function __construct(Site $site, $name)
    {
        $this->site = $site;
        $this->tableName = $site->getTablePrefix() . $name;
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function pdo()
    {
        return $this->site->pdo();
    }

    protected $site;
    protected $tableName;

}