<?php
 require 'classes/etudiant.class.php';
 $firstname=$_POST['firstname'];
 $lastname=$_POST['lastname'] ;
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $newetudiant=new Etudiants;
 $newetudiant->create_etudiant($firstname,$lastname,$email,$phone);
 header("location:mgrEtudiant.php");