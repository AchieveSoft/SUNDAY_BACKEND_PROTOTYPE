<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'taskCode';
    protected $allowedFields = ['taskCode', 'stageCode', 'taskName', 'state', 'output'];
}
