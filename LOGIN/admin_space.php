<?php
session_start();

/*if(!isset($_SESSION['user']))
{
    header('location:login.php');
}
*/
$bdd = new PDO('mysql:host=localhost;dbname=projet_web;charset=utf8', 'root', '');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="StyleA.css">
    <style>

      .card a{
        text-decoration : none;
        color : white;
      }
      #add__new__list{
      top: 20px;
      right: 0px;
}
    </style>
    
</head>
<body>

<!---->
<main>
<div class="container my-5">
       <div class="card-body text-center">
    <h2 class="card-title">Espace réservé à l'administrateur de l'Université!</h2>
  </div>
    <div class="card">
        <button id="add_new_list" type="button" class="btn btn-primary position-absolute" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-plus"></i> <a href="../Form/index.php"> Ajouter un nouveau évenement</a></button>
        
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name Event</th>
                <th scope="col">théme</th>
                <th scope="col">Date début</th>
                <th scope="col">Date fin</th>
                <th scope="col">Salle</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $reponse = $bdd->query('SELECT * FROM events');

              while ($donnees = $reponse->fetch())
              { 
              ?>
              
              <tr>
                <th scope="row"><?php echo $donnees['id_ev']?></th>
                <td><?php echo  $donnees['intitulé']?></td>
                <td><?php  echo $donnees['thème']?></td>
                <td><?php echo $donnees['date_db']; ?></td>
                <td><?php echo $donnees['date_fn']; ?></td>
                <td><?php echo $donnees['salle']?></td>
                <td>
                    <a class="btn btn-sm btn-primary" href="../Form/index.php"><i class="far fa-edit"></i> Modifier</a>
                    <a class="btn btn-sm btn-success" href="../PHP/publier.php"><i class="fas fa-trash-alt"></i>Publier</a>
                    <a class="btn btn-sm btn-danger" href="../PHP/detail.php"><i class="fas fa-trash-alt"></i>Détails</a> 
                           
                </td>
                
              </tr>
              <?php
              }
              ?>
              </tr>
            </tbody>
          </table>
    </div>
    <!-- Large modal -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
          <div class="card-body text-center">
            <h4 class="card-title">Special title treatment</h4>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          </div>
            <div class=" card col-8 offset-2 my-2 p-3">
          <form>
            <div class="form-group">
              <label for="listname">List name</label>
              <input type="text" class="form-control" name="listname" id="listname" placeholder="Enter your listname">
            </div>
            <div class="form-group">
              <label for="datepicker">Deadline</label>
              <input  type="text" class="form-control" name="datepicker" id="datepicker" placeholder="Pick up a date">
            </div>
            <div class="form-group">
                                    <label for="datepicker">Add a list item</label>
                <div class="input-group">

                  <input type="text" class="form-control" placeholder="Add an item" aria-label="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Go!</button>
                  </span>
                </div>
              </div>
           <div class="form-group text-center">
             <button type="submit" class="btn btn-block btn-primary">Sign in</button>
          </div>
        </form>
    </div>
    </div>
  </div>
</div>
</div>
</main>
<!---->
<center>
<form action="LogOut.php" method='post'>
    <button type='submit' value='Log out' class='btn btn-primary'>Se déconnecter</button>
</form>
</center>
</body> 
</html>

<?php
session_destroy();
?>
