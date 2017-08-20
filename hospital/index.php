<?php
 require_once('connect.php');
if (isset($_COOKIE['hospitalid'])){

    $hid= $_COOKIE['hospitalid']; // Extracting value of hospital id from set cookie
     $result = mysqli_query($connection, "SELECT id,hospital,address,latitude,longitude FROM registration where id='$hid' ");
     $user= mysqli_fetch_assoc($result);
     $loggedin=1;
  }
  else{
    $loggedin=0;
  }

?>

<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">

    <!--style.css-->
    <link rel="stylesheet" href="style.css">
    <!--jquery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>LifeLine</title>
</head>
<body>

   <div id="container" class="row">
       <header id="nav-bar" class="row s12">
       <nav id="nav-header">
         <div class="nav-wrapper">
           <a href="#" class="brand-logo left">Lifeline</a>
           <ul id="nav-mobile" class="right hide-on-med-and-down">
             <li><a href="#">Home</a></li>
             <li><a href="#">Find</a></li>
             <li><a href="#">Records</a></li>
             <li><a href="#">About</a></li>
              <li><a href=<?php  if($loggedin){echo 'logout.php?';}else{echo 'login.php?';}  ?> >
                <?php 
               if($loggedin){
                  echo "Logout  ".$user['hospital'];
                 
                }else{
                  echo "Login";
                  }
              ?>
            </a></li>
           </ul>
         </div>
       </nav>
     </header>

    <main>
    <!--carousel-->
    <section id="carousel">
      <div  class="carousel carousel-slider center" data-indicators="true">
        <div class="carousel-item orange white-text" href="#one!">

          <h2>First Panel</h2>
          <p class="white-text">This is your first panel</p>
        </div>
        <div class="carousel-item blue white-text" href="#two!">

          <h2>Second Panel</h2>
          <p class="white-text">This is your second panel</p>
        </div>
        <div class="carousel-item red white-text" href="#three!">

          <h2>Third Panel</h2>
          <p class="white-text">This is your third panel</p>
        </div>
        <div class="carousel-item green white-text" href="#four!">

          <h2>Fourth Panel</h2>
          <p class="white-text">This is your fourth panel</p>
        </div>
      </div>
    </section >


    <section id="main-body">
      <div  class="row">
      <div id="card" class="row z-depth-3">
        <div  class="col s5 red">
          <div id="card-content" class="row">
            <h3 class="white-text">Strategy</h1>
            <span id="infomation" class=" white-text">I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
            </span>
          </div>
        </div>
        <div class="col s7 ">
          <!--image for strategy-->

        </div>
      </div>
      <a href="find.php">
      <div id="card" class="row z-depth-3">
        <div class="col s7 grey">
          <!--image for Connect-->
        </div>
        <div  class="col s5 white">
          <div id="card-content" class="row">
            <h3 class="black-text">Search</h1>
            <span id="infomation" class="black-text">Navigating the hospital world can be complicated. We help mediate the space between
                Hospitals to build a whole new
                Blood Communication.
            </span>
          </div>
        </div>
      </div></a>

      <a href="hospital_record.php"><div id="card" class="row z-depth-3">
        <div  class="col s5 black">
          <div id="card-content" class="row">
            <h3 class="white-text">Records</h1>
            <span id="infomation" class="white-text">We maintain comprehensive and consistant record of each Hospital.</span>
          </div>
        </div>
        <div class="col s7 grey">
          <!--image for Record-->
        </div>
      </div></a>

      <section class="connect-with-us">
        <div id="ready-to-connect" class="row">
          <div>
            <h4 class="center-align">Ready to Connect?</h4>
            <div id="connect-btn" class="center-align">
              <a href="" class="waves-effect waves-light btn btn-large">Connect with Us</a>
            </div>
          </div>
        </div>
      </section>


    </div>
   </section><!--main-section-->
 </main>

      <footer class="page-footer">
        <div>
          <nav id="nav-footer">
             <div class="nav-wrapper">
              <ul class=" right hide-on-med-and-down">
                <li><a href="#">Home</a></li>
                <li><a href="#">Find</a></li>
                <li><a href="#">Records</a></li>
                <li><a href="#">About</a></li>
                </ul>
              </div>
          </nav>
        </div>
     </footer>


</div><!--container-->


 <script src="script.js"></script>

    <!--Materailze css script-->

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
     
</body>
</html>
