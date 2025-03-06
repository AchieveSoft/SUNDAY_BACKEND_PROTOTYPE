<?php

namespace App\Controllers;

use App\Models\PipelineModel;
use App\Models\StageModel;
use App\Models\PipelineHistoryModel;
use App\Models\ArtifactModel;
use CodeIgniter\RESTful\ResourceController;

class PipelineController extends ResourceController
{
    protected $modelName = 'App\Models\PipelineModel';
    protected $format    = 'json';

    public function getPipelines()
    {
        $model = new PipelineModel();
        $pipelines = $model->findAll();
        foreach ($pipelines as $pipeline) {
            $stageModel = new StageModel();
            $pipeline['stages'] = $stageModel->where('pipelineCode', $pipeline['pipelineCode'])->findAll();
        }
        return $this->respond($pipelines);
    }

    public function addPipeline()
    {
        $model = new PipelineModel();
        $data = $this->request->getJSON();

        $pipelineData = [
            'pipelineName' => $data->pipelineName
        ];
        
        $pipelineCode = $model->insrt_getID($pipelineData);
        if (!empty($pipelineCode)) {
            foreach ($data->stages as $stage) {
                $stageModel = new StageModel();
                $stageData = [
                    'pipelineCode' => $pipelineCode,
                    'stageName' => $stage->stageName,
                    'state' => $stage->state
                ];
                $stageModel->save($stageData);
            }

            foreach ($data->artifacts as $artifact) {
                $artifactModel = new ArtifactModel();
                $artifactData = [
                    'pipelineCode' => $pipelineCode,
                    'artifactName' => $artifact->artifactName,
                    'path' => $artifact->path
                ];
                $artifactModel->save($artifactData);
            }

            return $this->respondCreated($pipelineData);
        } else {
            return $this->failValidationErrors($model->errors());
        }
        
    }

    public function getPipelinesHistory()
    {
        $model = new PipelineHistoryModel();
        $history = $model->findAll();
        return $this->respond($history);
    }

    public function addPipelineHistory()
    {
        $model = new PipelineHistoryModel();
        $data = $this->request->getJSON();
        if ($model->save($data)) {
            return $this->respondCreated($data);
        } else {
            return $this->failValidationErrors($model->errors());
        }
    }
}
