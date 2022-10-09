<?php

include 'Config.php';

class Utente extends Config{

    public function creaTabella() {

        try {
            $query = 'create table if not exists utenti (id int auto_increment primary key, nome text(20),cognome text(20), email varchar(30), password varchar(20))';
            $statement = $this->connect()->prepare($query);
            $statement->execute();
        } catch (PDOException $error) {
            echo $error->getMessage();

        }

    }

    public function registraUtente($nome, $cognome, $email, $password) {

        if($this->controlloEmail($email) === false) {

            try {
                $query = 'insert into utenti values (?, ?, ?, ?, ?)';
                $statement = $this->connect()->prepare($query);
                $statement->execute([NULL, $nome, $cognome, $email, $password]);
            } catch (PDOException $error) {
                echo $error->getMessage();
    
            }

        }

    }

    public function accessoUtente($email, $password) {

        try {
            $query = 'select * from utenti where email = ? and password = ?';
            $statement = $this->connect()->prepare($query);
            $statement->execute([$email, $password]);
            $row = $statement->fetchAll();
            return $row;
        } catch (PDOException $error) {
            echo $error->getMessage();

        }
    
    }

    public function controlloEmail($email) {

        try {
            $query = 'select * from utenti where email = ?';
            $statement = $this->connect()->prepare($query);
            $statement->execute([$email]);
            $row = $statement->fetchAll();

            if(count($row) > 0) {
                return true;
            }
            return false;

        } catch (PDOException $error) {
            echo $error->getMessage();

        }
    
    }

    public function getInformazioni($email) {

        try {
            $query = 'select * from utenti where email = ?';
            $statement = $this->connect()->prepare($query);
            $statement->execute([$email]);
            $row = $statement->fetch();
            return $row;
        } catch (PDOException $error) {
            echo $error->getMessage();

        }
    
    }

    public function getNomeECognome($id) {

        try {
            $query = 'select * from utenti where id = ?';
            $statement = $this->connect()->prepare($query);
            $statement->execute([$id]);
            $row = $statement->fetch();
            return $row['nome'].' '.$row['cognome'];
        } catch (PDOException $error) {
            echo $error->getMessage();

        }
    
    }

}



?>