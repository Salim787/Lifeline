<!-- Ganesh document -->

<?php
 require('connect.php');
 if (isset($_POST['email']) && isset($_POST['password']) ){
    
   $email = htmlentities($_POST['email'] );
   $password = htmlentities($_POST['password'] );

   if (!empty($email) && !empty($password) ){
   $query = "SELECT * FROM `registration` WHERE email='$email' AND Password='$password'";

   $results = mysqli_query($connection, $query);
   $count = mysqli_num_rows($results);
   if($count == 1){
     echo "Login Successfull";
     $field=mysqli_fetch_assoc( $results );
     //GO to next Session after login.
    setcookie('hospitalid', $field['id'], time() + (86400 * 30), "/"); //To set cookie for each login. It contains value of hospital id for use in other pages
    header("Location: index.php");    // To redirect to next page
     
   }else{
     echo "Login Unsuccessful";
   }
 }else{
  echo "Please enter all details!";
 }
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
  <link rel="stylesheet" href="login.css">
  <!--jquery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login |</title>
</head>
  <body>
      <form action="login.php" method="POST">
     <section id="signup-container">
         <div class="row">
         <a class="close_form" href="#"><i class="material-icons">close</i></a>

         <div class="col s12">
         <h4 class="brand-logo">Login</h4>
         </div>
         <div class="input-field col s12">
         <input name="email" id="hospital_name" type="text" class="validate">
         <label for="hospital_name">Email</label>
        </div>
       <div class="input-field col s12">
          <input name="password" id="password" type="password" class="validate">
          <label for="password" >Password</label>
        </div>
        <div  class="col s12">
            <button type="submit" id="register-btn" name="submit" class="waves-effect waves-light btn btn-large">Login</button>
        </div>
        <div class="col s12">
          <span class="agree-terms">New user? Please Register <a href="register.php">here</a></span>
        </div>
         <div class="col s12">
          <span class="agree-terms">Back to <a href="index.php">home</a></span>
        </div>


        </form>




       </div>
     </section>

    <!--Materailze css script-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
  </body>
</html>
