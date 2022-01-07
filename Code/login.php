<?php
session_start();

include('includes/functions.php');
$loginError="";

if(isset($_POST['login'])){
                 $formEmail = validateFormData($_POST['email']);
                 $formPass = validateFormData($_POST['password']);

    //CONNECTING TO DATABASE
                 include('includes/connection.php');

    //CREATE QUERY
                 $query ="SELECT username, password FROM login WHERE email='$formEmail'";

    //STORE RESULT
                 $result = mysqli_query($conn, $query);
    
                  if(mysqli_num_rows($result) > 0){
                                                                        $Name ="";
                                                                        $hashedPass ="";
                                                                        while($row = mysqli_fetch_assoc($result))
                                                                        {
                                                                            $Name = $row['username'];
                                                                            $hashedPass = $row['password'];

                                                                        }
                                       



                                                                    if(password_verify($formPass ,$hashedPass)) {
                                                                                            $_SESSION['loggedInUser'] = $Name;
                                                                                            header("Location: info.php");
                                                                    }   
                                                                        else{
                                                                            $loginError ="<div class='alert alert-danger'>Wrong COMBINATION. Try Again</div>";
                                                                        }
                                                                    }
                                    else{

                                            $loginError ="<div class='alert alert-danger'>No Such DATABASE<a class='close' data-dismiss='alert'>&times;</a></div>";
                                    }
mysqli_close($conn);
}

?>

<!DOCTYPE html>

<html>

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Network Info</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="login.css" type="text/css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body style="padding-top: 60px;">       
        
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">

        <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" >NETWORK<strong>CATALOGUE</strong></a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                
                

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="caccount.php">Create Account</a></li>
                   
                </ul>
                

            </div>

        </div>

    </nav>
        
    <div class="container">
        
        <div class="Img">
        <img src="includes/fabian-grohs-7U-67_T_J34-unsplash.jpg" alt="Welcome Image">
            </div>
<h1 class="display-1">Network Catalogue</h1>
<p class="lead">Log in to your account.</p>
<?php echo $loginError; ?>

<form class="form-inline" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
    <div class="form-group">
        <label for="login-email" class="sr-only">Email</label>
        <input type="text" class="form-control" id="login-email" placeholder="email" name="email">
    </div>
    <div class="form-group">
        <label for="login-password" class="sr-only">Password</label>
        <input type="password" class="form-control" id="login-password" placeholder="password" name="password">
    </div>
    <br><br>
    <a class="raghav" href="www.google.com">Forgotten account?</a>
    <br><br><button type="submit" class="btn btn-primary" name="login">Login</button>
</form>
        </div><!-- end .container -->

         <footer class="text-center">
            <br><br><br><hr>
            <small>Coded with &hearts; by <a href="https://www.facebook.com/raghav.lakhotia.33">Raghav lakhotia</a></small>
        </footer>
        <!-- jQuery -->
        <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </body>
</html>