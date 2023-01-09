<?php

require_once __DIR__ . '/../../src/Model/ParicipantModel.php';

class ParticipantController {

    private ParticipantModel $participantModel;


    public function index() {
        $participants = $this->participantModel->getAllParticipants();
        $this->render('participant/index', ['participants' => $participants]);
    }


    public function show($id) {
        $participant = $this->participantModel->getParticipantById($id);
        $this->render('participant/show', ['participant' => $participant]);
    }


    public function create() {
        $this->render('participant/create');
    }

    
}