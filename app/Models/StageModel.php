<?php

namespace App\Models;

use CodeIgniter\Model;

class StageModel extends Model
{
    protected $table = 'stages';
    protected $primaryKey = 'stageCode';
    protected $allowedFields = ['stageCode', 'pipelineCode', 'stageName', 'state'];
}
