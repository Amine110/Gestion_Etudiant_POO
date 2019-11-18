<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <title>Document</title>

</head>
<body>
<div class="jumbotron">
    <h1>Liste des étudiants de la classe DSI2 ISET Bizerte 2019</h1>
</div>
<a class="btn btn-primary" href="create.php">Nouvel étudiant</a>
<br>

<table class="table table-striped">
 <tr>
    <td>Id</td>
    <td>Fistname</td>
    <td>Lastname</td>
    <td>Email</td>
    <td>Phone</td>
    <td>operations</td>
   </tr>
   <?php 
   include 'classes/etudiant.class.php';
   $etudiant = new Etudiants;
   $listetudiant=$etudiant->readAllEtudiants();
   while($data =$listetudiant->fetch())
   {
    echo '<tr>';
    echo '<td>'.$data['id'].'</td>';
    echo '<td>'.$data['firstname'].'</td>';
    echo '<td>'.$data['lastname'].'</td>';
    echo '<td>'.$data['email'].'</td>';
    echo '<td>'.$data['phone'].'</td>';
    echo '<td><a href="edit.php?id='.$data['id'].'"><i class="fas fa-plus">Editer</i></a>        ';  
    echo '<a href="delete.php?id='.$data['id'].'"><i class="fas fa-minus">Supprimer</i></a></td>';  
    echo '</tr>';
   }
   ?>
</table>
</body>
</html>