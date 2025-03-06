<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtifactModel extends Model
{
    protected $table = 'artifacts';
    protected $allowedFields = ['artifactName', 'pipelineCode', 'path'];


    
}
