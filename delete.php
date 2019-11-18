<?php
require 'classes/etudiant.class.php';
$deletudiant=new Etudiants;
$deletudiant->delete_etudiant();
header('location:mgrEtudiant.php');