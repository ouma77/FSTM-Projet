<?php
$bdd = new PDO('mysql:host=localhost;dbname=projet_web;charset=utf8', 'root', '');
$html = <<<HTML
<html>
<head>
    <title>plateforme de gestion de manifestation</title>
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Style.css">
    <script src="jquery-3.4.1.min"></script>
</head>
<body>
HTML;
$reponse = $bdd->query('SELECT * FROM events');

while ($donnees = $reponse->fetch())
{ 
   $html.='<tr>';
   $html.= '<td>'. $donnees['intitulé'] .'</td>'.'&nbsp &nbsp';
   $html.=  '<td>'.$donnees['thème'] .'</td>'. '&nbsp &nbsp';
   $html.=  '<td>'.$donnees['date'] .'</td>'. '&nbsp &nbsp';
   $html.=  '<td>'.$donnees['organisateur'] .'</td>'. '&nbsp &nbsp';
   $html.=  '<td>'.$donnees['salle'] .'</td>'. '&nbsp &nbsp';
   $html.=  '<td>'.$donnees['nb_salle'] .'</td>'. '&nbsp &nbsp';
   $html.='</tr>';
   $html.= '<td>'.
   '<button type="button" class="btn btn-info">'.'Detail'.'</button>'.'</td>';
  $html.= '<td>'.'<button type="button" class="btn  btn-success">'.'Aprouver'.'</button>'.'</td>';
  $html.='<td>'.'<button type="button" class="btn btn-danger">'.'Refuser'.'</button>'.'</td>'.'</tr>'.'<br>';
}

$reponse->closeCursor();
echo $html. "</body>\n</html>" ;

?>