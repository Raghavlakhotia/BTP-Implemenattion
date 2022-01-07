<?php 
$cssurl='stylesheet_register.css';
$GLOBALS['cssurl'];


include('includes/commonContent.php');
include('includes/config.php');


$metaDescription="Sign up as a volunteer to gain access to tons of volunteering opportunities";
$title="Volunteer registration";

?>


<!--Navigation Bar-->
<?php  

$toShow = str_replace('DDDDD', $metaDescription, $preHeader);
$toShow = str_replace('TTTTT', $title, $toShow);
echo $toShow;
echo $navbar; 

?>


<!--log in modal-->
<?php echo $loginModal ?>



<!--success alert-->
<div class='alert alert-success alert-dismissible d-none text-center' role='alert' style='margin-bottom:0; z-index:999;' id="successmsg">Registration successful!
    <a data-toggle='modal' data-target='#loginModal' style='text-decoration: underline; cursor:pointer;' id='alerta'> Login </a>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close' id='alertsuccess'>
        <span aria-hidden='true' class="close">&times;</span>
    </button>
</div>

<!--failure alert-->
<div class='alert alert-danger alert-dismissible d-none text-center' role="alert" style='margin-bottom:0; z-index:999;' id="duplicatemsg">Email already exists! Register with another email address or click
    <a data-toggle='modal' data-target='#loginModal' style='text-decoration: underline; cursor:pointer;' id='alerta'> here </a>to login.
    <button type='button' class="close" aria-label='Close' id='alertfailure'>
        <span aria-hidden='true'>&times;</span>
    </button>
</div>

<!--Background-->
<div id="bg1">
    <div id="table" style="height: 100%; width: 100%; padding-top: 3em;">
        <div id="tableContent" class="container">
            <h1>Register as Volunteer</h1>
            <form class="form" id="registerForm">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="content-form">
                            <label for="fName" class="col-form-label">First Name <sup><i class="fas fa-asterisk"></i></sup>
                            </label>
                            <input class="form-control" name="fname" type="text" placeholder="First name" id="fName">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="content-form">
                            <label for="lName" class="col-form-label">Last Name <sup><i class="fas fa-asterisk"></i></sup></label>
                            <input class="form-control" name="lname" type="text" placeholder="Last name" id="lName">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="content-form">
                            <label for="emailV" class="col-form-label">Email <sup><i class="fas fa-asterisk"></i></sup></label>
                            <input class="form-control" name="email" type="text" placeholder="johndoe@example.com" id="emailV">
                            <small class="form-text float-right" id="help">This will serve as your login ID</small>
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="content-form">
                            <label for="numberV" class=" col-form-label">Phone Number <sup><i class="fas fa-asterisk"></i></sup></label>
                            <div class="input-group" id="number">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+91</span>
                                </div>
                                <input class="form-control" name="number" type="tel" placeholder="1234567890" id="numberV">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="content-form">
                            <label for="passwordv" class="col-form-label">Password <sup><i class="fas fa-asterisk"></i></sup></label>
                            <input class="form-control" name="password" type="password" id="passwordv">
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="content-form">
                            <label for="cPasswordV" class="col-form-label">Confirm Password <sup><i class="fas fa-asterisk"></i></sup></label>
                            <input class="form-control" name="conpassword" type="password" id="cpasswordV">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <div class="content-form">
                            <label for="dobV" class="col-form-label">Date of birth <sup><i class="fas fa-asterisk"></i></sup></label>
                            <input class="form-control" name="dob" type="date" id="dobV">
                        </div>
                    </div>
                </div>
                
                  <div class="row">
                    <div class="col content-form">
                        <button class="btn btn-success btn-lg float-right mb-2" value="register" name="register" type="submit" id="registerbtn">Register</button>
                    </div>
                </div>

                <!--previous stuff-->
<!--
                <div class="form-group row">

                </div>

                <div class="form-group row">
                    <label for="lName" class="col-md-4 col-form-label">Last Name <sup><i class="fas fa-asterisk"></i></sup></label>
                    <div class="col-md-8">
                        <input class="form-control" name="lname" type="text" placeholder="Last name" id="lName">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="numberV" class="col-md-4 col-form-label">Phone Number <sup><i class="fas fa-asterisk"></i></sup></label>
                    <div class="col-md-8">
                        <div class="input-group" id="number">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+91</span>
                            </div>
                            <input class="form-control" name="number" type="tel" placeholder="1234567890" id="numberV">
                        </div>
                    </div>
                </div>
-->
<!--

                <div class="form-group row">
                    <label for="emailV" class="col-md-4 col-form-label">Email <sup><i class="fas fa-asterisk"></i></sup></label>
                    <div class="col-md-8">
                        <input class="form-control" name="email" type="text" placeholder="johndoe@example.com" id="emailV">
                        <small class="form-text float-right" id="help">This will serve as your login ID</small>
                    </div>
                </div>

                <div class="form-group row">

                </div>

                <div class="form-group row">
                    <label for="cPasswordV" class="col-md-4 col-form-label">Confirm Password <sup><i class="fas fa-asterisk"></i></sup></label>
                    <div class="col-md-8">
                        <input class="form-control" name="conpassword" type="password" id="cpasswordV">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="dobV" class="col-md-4 col-form-label">Date of birth <sup><i class="fas fa-asterisk"></i></sup></label>
                    <div class="col-md-8">
                        <input class="form-control" name="dob" type="date" id="dobV">
                    </div>
                </div>
-->

              
            </form>
        </div>
        <!--tablecontent end-->
    </div>
    <!--table end-->
</div>

<!--Footer-->
<?php echo $footer ?>



<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>


<!-- JavaScript -->
<script src="js/script_signupV.js"></script>
<script src="js/script_login_modal.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>

</html>
