<?php

class TrainingModel {

    public static function getAllTrainings() {
        $pdo = new PDO('mysql:host=localhost;dbname=formation', 'root', 'root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare("SELECT * FROM training");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTrainingById($id) {
        $sql = "SELECT * FROM training WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addTraining($name, $startDate, $endStart, $price, $listeParticipants) {
        $sql = "INSERT INTO formation (name, startDate, endDate, price, listeParticipants) VALUES (:name, :startDate, :endDate, :price; :listeParticipants)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':startDate', $startDate, PDO::PARAM_STR);
        $stmt->bindValue(':endDate', $endDate, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_STR);
        $stmt->bindValue(':listeParticipants', $listeParticipants, PDO::PARAM_STR);
        $stmt->execute();
    }
}