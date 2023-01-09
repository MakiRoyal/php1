<?php

require_once __DIR__ . '/../../src/Model/TrainingModel.php';

class TrainingController  {

    private TrainingModel $trainingModel;

    public function getAll()
    {
        $training = TrainingModel::getAllTrainings();
        return $training;
    }

    public function show($id) {
        $training = $this->trainingModel->getTrainingById($id);
        $this->render('training/show', ['training' => $training]);
    }

    public function create() {
        $this->render('training/create');
    }

}