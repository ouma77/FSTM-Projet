<?php
session_start();

if(!isset($_SESSION['user']))
{
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="StyleAdmin.css">
    <style>

      .card a{
        text-decoration : none;
        color : white;
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
        <button id="add__new__list" type="button" class="btn btn-primary position-absolute" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-plus"></i> <a href="../Form/index.php"> Ajouter un nouveau évenement</a></button>
        
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name Event</th>
                <th scope="col">Organisateur</th>
                <th scope="col">Date</th>
                <th scope="col">Salle</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Atelier entreprenarial</td>
                <td>Enactus</td>
                <td>06 Janvier 2020</td>
                <td>Salle de formation</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="#"><i class="far fa-edit"></i> Modifier</a>
                    <a class="btn btn-sm btn-success" href="#"><i class="fas fa-trash-alt"></i> Approuver</a>
                    <a class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash-alt"></i>Refuser</a> 
                           
                </td>
                
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>séminaire</td>
                <td>Association des étudiants</td>
                <td>12 Janvier 2020</td>
                <td>Salle de coference</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="#"><i class="far fa-edit"></i> Modifier</a>
                    <a class="btn btn-sm btn-success" href="#"><i class="fas fa-trash-alt"></i> Approuver</a>
                    <a class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash-alt"></i>Refuser</a>     
                </td>
                
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Match sportive</td>
                <td>Club du sport</td>
                <td>17 Mars 2020</td>
                <td>Terrain</td>
                <td>       
                    <a class="btn btn-sm btn-primary" href="#"><i class="far fa-edit"></i> Modifier</a>
                    <a class="btn btn-sm btn-success" href="#"><i class="fas fa-trash-alt"></i> Approuver</a>
                    <a class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash-alt"></i>Refuser</a>     
                </td>
                
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