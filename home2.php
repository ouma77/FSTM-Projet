<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>plateforme de gestion de manifestation</title>
    <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.min.css">
    
    <!--<script src="jquery-3.4.1.min"></script>-->
    <!-- partie du head du calendrier -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />

   <link rel="stylesheet" href="style.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
   <script>
   
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable: false,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    },
    <?php $bdd = new PDO('mysql:host=localhost;dbname=projet_web;charset=utf8', 'root', ''); ?>
    events:[ <?php $reponse = $bdd->query('SELECT * FROM events'); 
                  while ($donnees = $reponse->fetch())
    { ?>
        {
            'title':<?php echo  $donnees['intitulé']?>,
            'start':<?php echo $donnees['date_db']; ?>,
            'end':<?php echo $donnees['date_fn']; ?>
        }
    
<?php } ?>],

    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id = event.id;
      $.ajax({
       url:"../Calendar/delete.php",
       type:"POST",
       data:{id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
       }
      })
     }
    },

   });
  });
   
  </script>

  <!-- fin de partie head du calendar -->
</head>

<body>
    <div class="container_fluid head">
        <div class="shadow_head">
        <div class="header">
            <ul class="header_list">
                <li> <a href="LOGIN/login.php"><button type="button" class="btn btn-outline-light">Espace Administrateur</button> </a> </li>
                
            </ul>
        </div>
        <div class="calendarImg">
            <img src="images/Calendar_Img.png" alt="Illustration d'un Calendrier">
        </div>
        
        <div class="header_text">
            <h1>Platforme de gestion <br> d'évenement</h1>
            <p>Notre plateforme vous permet de visualiser régulièrement les différents évenement <br>de votre université (conférence, séminaire, soirée, manifestation sportive,  <br>assemblée générale ...)</p>
            <a href="#calend"> <button id="btn_calendar" type="button" class="btn btn-primary btn-lg">View Calendar</button></a>
        </div>
        </div>

    </div>

        <!-- Timeline bootsnip 

        <div class="container mt-5 mb-5">
            <div class="row">
                <div class="timee col-md-6 offset-md-3">
                    <h4>Latest News</h4>
                    <ul class="timeline">
                        <li>
                            <a target="_blank" href="https://www.totoprayogo.com/#">New Web Design</a>
                            <a href="#" class="float-right">21 March, 2014</a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                        </li>
                        <li>
                            <a href="#">21 000 Job Seekers</a>
                            <a href="#" class="float-right">4 March, 2014</a>
                            <p>Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                        </li>
                        <li>
                            <a href="#">Awesome Employers</a>
                            <a href="#" class="float-right">1 April, 2014</a>
                            <p>Fusce ullamcorper ligula sit amet quam accumsan aliquet. Sed nulla odio, tincidunt vitae nunc vitae, mollis pharetra velit. Sed nec tempor nibh...</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>-->
        
    <!-- div du view calendar -->
    <center>
    <div id='calend' class="container Cald">
        <br />
        <h2 align="center"><a href="#">Calendrier d'évenement</a></h2>
        <br />
        <div id="calendar"></div>
    </div></center>



    <!-- Footer -->
    <footer class="footer">
        <p>Copyright © 2020</p>
    </footer>

    <!-- fonction de scroll vers le bas si on click sur view calendar -->
    <script>
        $("a[href^='#']").click(function(e) {
	e.preventDefault();
	
	var position = $($(this).attr("href")).offset().top;

	$("body, html").animate({
		scrollTop: position
	} /* speed */ );
});
    </script>
</body>
</html>