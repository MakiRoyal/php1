<?php

namespace Eval1\Model;

use Config\Model;
use PDO;

class ParticipantModel extends Model
{
    public function getAllParticipants()
    {
        $sql = "SELECT * FROM participant";
        $stmt = $this->pdo->prepare();
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getParticipantById($id) {
        $sql = "SELECT * FROM participant WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addParticipant($firstname, $lastname, $company) {
        $sql = "INSERT INTO participant (firstname, lastname, company) VALUES (:firstname, :lastname, :company)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindValue(':lastname', $lastname, PDO::PARAM_STR);
        $stmt->bindValue(':company', $company, PDO::PARAM_STR);
        $stmt->execute();
    }
}