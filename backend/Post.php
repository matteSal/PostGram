<?php

    include 'Config.php';

    class Post extends Config {

        public function creaTabella() {

            try {
                $query = 'create table if not exists post (id int auto_increment primary key, idUtente int, titolo text(20), descrizione text(20))';
                $statement = $this->connect()->prepare($query);
                $statement->execute();
            } catch (PDOException $error) {
                echo $error->getMessage();
    
            }
    
        }

        public function getPost() {

            try {
                $query = 'select * from post order by id desc';
                $statement = $this->connect()->prepare($query);
                $statement->execute();
                $row = $statement->fetchAll();
                return $row;
            } catch (PDOException $error) {
                echo $error->getMessage();
    
            }

        }

        public function inserisciPost($idUtente, $titolo, $descrizione) {

            try {
                $query = 'insert into post values(?, ?, ?, ?)';
                $statement = $this->connect()->prepare($query);
                $statement->execute([NULL, $idUtente, $titolo, $descrizione]);
                $row = $statement->fetchAll();
                return $row;
            } catch (PDOException $error) {
                echo $error->getMessage();
    
            }

        }



    }

?>