CREATE TABLE pipelines (
    pipelineCode TEXT PRIMARY KEY,
    pipelineName TEXT
);

CREATE TABLE stages (
    stageCode TEXT PRIMARY KEY,
    pipelineCode TEXT,
    stageName TEXT,
    state TEXT,
    FOREIGN KEY (pipelineCode) REFERENCES pipelines(pipelineCode)
);

CREATE TABLE tasks (
    taskCode TEXT PRIMARY KEY,
    stageCode TEXT,
    taskName TEXT,
    state TEXT,
    output TEXT,
    FOREIGN KEY (stageCode) REFERENCES stages(stageCode)
);

CREATE TABLE artifacts (
    artifactName TEXT,
    pipelineCode TEXT,
    path TEXT,
    FOREIGN KEY (pipelineCode) REFERENCES pipelines(pipelineCode)
);

CREATE TABLE pipeline_history (
    pipelineCode TEXT,
    pipelineName TEXT,
    state TEXT
);

CREATE TABLE users (
    userId INT PRIMARY KEY,
    userCode TEXT,
    email TEXT,
    password TEXT
);
