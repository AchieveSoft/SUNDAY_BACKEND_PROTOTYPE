<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('pipeline/get-pipelines', 'PipelineController::getPipelines');
$routes->post('pipeline/add-pipeline', 'PipelineController::addPipeline');
$routes->get('pipeline/get-pipelines-history', 'PipelineController::getPipelinesHistory');
$routes->post('pipeline/add-pipeline-history', 'PipelineController::addPipelineHistory');

