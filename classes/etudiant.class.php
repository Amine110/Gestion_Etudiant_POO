<?php 
    require 'dbconnexion.class.php';
      class Etudiants{
        private $conx;
        public function __construct()
        {
            $db=new BasesDonnees;
            $this->conx=$db->connect(); 
        }
        public function readAllEtudiants()
        {
            try {
                $sql='SELECT * FROM students';
                $result=$this->conx->prepare($sql);
                $result->execute();
                return $result;
            } catch (PDOExeption $e) {
                echo $e->getMessage();
            }
        }
        public function create_etudiant($firstname,$lastname,$email,$phone)
        {
            try {
                $sql=('INSERT INTO students(firstname, lastname, email , phone) VALUES ( :param_firstname,:param_lastname,:param_email,:param_phone)');
                $result=$this->conx->prepare($sql);
                $result->bindParam(':param_firstname',$firstname);
                $result->bindParam(':param_lastname',$lastname);
                $result->bindParam(':param_email',$email);
                $result->bindParam(':param_phone',$phone);
                $result->execute();
                return $result;
               header("location:mgrEtudiant.php");
            } catch (PDOExeption $e) {
                echo $e->getMessage();
            }

        }
        public function delete_etudiant()
        {
            try {
                $sql=('DELETE FROM students WHERE id =:param_id');
                $result=$this->conx->prepare($sql);
                $result->bindParam(':param_id',$_GET['id']);
                $result->execute();
                return $result;
                header('location:mgrEtudiant.php');
            } catch (PDOExeption $e) {
                echo $e->getMessage();
            }

        }
        public function updateEtudiant($firstname,$lastname,$email,$phone){
            try {
                $sql=('UPDATE students SET firstname= :param_firstname, lastname= :param_lastname, email= :param_email, phone= :param_phone where id= :param_id');
                $result=$this->conx->prepare($sql);
                $result->bindParam(':param_firstname', $firstname); 
                $result->bindParam(':param_lastname', $lastname); 
                $result->bindParam(':param_email', $email); 
                $result->bindParam(':param_phone', $phone); 
                $result->bindParam(':param_id', $id); 
                $result->execute();
                $sql=('SELECT * FROM students WHERE id =:param_id');
                $result=$this->conx->prepare($sql);
                $result->bindParam(':param_id', $_GET['id']); 
                $result->execute(); 
                return $result; 
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    
    }