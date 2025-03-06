<?php

namespace App\Models;

use CodeIgniter\Model;

class PipelineHistoryModel extends Model
{
    protected $table = 'pipeline_history';
    protected $allowedFields = ['pipelineCode', 'pipelineName', 'state'];
}
