<?php
include('includes/connection.php');
   // set all variables to empty by default
    $username = $email = $password = $gender = "";
    
     $nameError = $emailError = $genderError = $passwordError = "";

if( isset( $_POST["add"] ) ) {
        
    // build a function that validates data
    function validateFormData( $formData ) {
        $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
        return $formData;
    }


 
    
    // check to see if inputs are empty
    // create variables with form data
    // wrap the data with our function
    
    if( !$_POST["username"] ) {
        $nameError = 'Please enter a username';
    } else {
        $username = validateFormData( $_POST["username"] );
    }
    
     

    
    if (empty($_POST["gender"])) {
    $genderError = "Gender is required";
  } else {
    $gender = $_POST["gender"];
  }
        
 
   /* if( !$_POST["email"] ) {
        $emailError = "Please enter your email <br>";}
        
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format"; 
    }
    else {
        $email = validateFormData( $_POST["email"] );
    }*/
    
    
     if (empty($_POST["email"])) {
    $emailError = "Email is required";
  } else {
    $email = $_POST["email"];
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailError = "Invalid email format"; 
    }
  }
    

   /* if( !$_POST["password"] ) {
        $passwordError = "Please enter a password <br>";
    } else {
           // Validate password strength
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);

if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    
}else{
    echo 'Strong password.';
        $password = validateFormData( $_POST["password"] );
}    
    }*/
    
    
    if( !$_POST["password"] ) {
        $passwordError = "Please enter a password <br>";
    }
    
else{
    $password = $_POST["password"] ;
    /*if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
    echo 'the password does not meet the requirements!';}
       else{
           
       }*/
    
        
}    
    
    
    
    

    
    
    
    
    
    
    
    
    
    $hashedpassword = password_hash( $password, PASSWORD_DEFAULT );
    
    // check to see if each variable has data
    if( $username && $email && $password ) {
        
        $query = "INSERT INTO `login` (`id`, `username`, `email`, `password`, `gender`) VALUES (NULL, '$username', '$email', '$hashedpassword', '$gender')";

        if( mysqli_query( $conn, $query ) ) {
              header("Location: back.php");
            /*echo "<div class='alert alert-success'>New record in database!</div>";*/
        } else {
            echo "Error: ". $query . "<br>" . mysqli_error($conn);
        }
    }
    
}



mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="caccount.css">
      <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro|Stylish&display=swap" rel="stylesheet">

    <title>Sign-up</title>
  </head>
  <body>
   <div class="container">
       <img src="includes/64572.png" id="person">
            <h1><u>Create Account</u></h1><br>

            <p class="text-danger">
                <?php if(!$nameError== "" || !$genderError== "" || !$emailError== "" || !$passwordError == "")
{echo "* Required fields";}?></p>
            
            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
                
                
                
                   <div class="form-group row">
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg white">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control form-control-lg black" id="colFormLabelLg" placeholder="Enter Username" name="username">
    </div>
                   <small class="text-danger"> <?php if(!$nameError==""){echo "* ".$nameError;}  ?></small>
                </div>
                
   <!------------------------------------------------------------------------------------------------------------------------------->             
                
                
                
                 <div class="form-group row">
                     <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg white">Gender</label>
        <div class="col-sm-10">
            <select id="Gender" class="form-control  form-control-lg black" id="gender" name="gender" value="">
        <option  disabled selected>-- Choose an option --</option>
        <option >Male</option>
            <option >Female</option>
      </select></div>
                <small class="text-danger"> <?php if(!$genderError==""){echo "* ".$genderError;} ?></small>
    </div>
                
    <!------------------------------------------------------------------------------------------------------------------------------->           
    
                
                <div class="form-group row">
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg white">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control form-control-lg black" id="colFormLabelLg" placeholder="Enter Email" name="email">
    </div>
                <small class="text-danger"> <?php if(!$emailError==""){echo "* ".$emailError;}  ?></small>
                    
  </div>

     <!----------------------------------------------------------------------------------------------------------------------------->
    <div class="form-group row">
    <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg white">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control form-control-lg black" id ="password" placeholder="Password" name="password">
    </div>
         <small class="text-danger"><?php if(!$passwordError==""){echo "* ".$passwordError;}?></small>
        </div>
    <button type="submit" class="btn btn-secondary btn-lg"   name="add" >Sign up</button>    
            </form>
            </div>
      
     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>