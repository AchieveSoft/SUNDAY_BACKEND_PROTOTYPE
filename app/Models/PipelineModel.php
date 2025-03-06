<?php

namespace App\Models;

use CodeIgniter\Model;

class PipelineModel extends Model
{
    protected $table = 'pipelines';
    protected $primaryKey = 'pipelineCode';
    protected $allowedFields = ['pipelineCode', 'pipelineName'];

    public function insrt_getID($data)
    {
        $builder = $this->db->table("pipelines");
        $builder->insert($data);
        return $this->db->insertID();
    }
    
}
