<?php

namespace App\Core;

use Illuminate\Database\Migrations\Migration as ParentMigration;

class Migration extends ParentMigration
{
    protected $model = null;
    protected ?String $tableName = null;
    protected ?String $tableConnection = null;

    public function __construct()
    {
        $this->model = $this->model ?? null;
        $this->tableName = $this->model ? $this->model::table() : null;
        $this->tableConnection = $this->model ? $this->model::connection() : null;
    }

    public function __destruct()
    {
        $this->tableName = null;
        $this->tableConnection = null;
    }
}