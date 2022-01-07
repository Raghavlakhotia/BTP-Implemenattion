<?php
session_start();

//If not loged in send back to login page
if(!(isset($_SESSION['loggedInUser'])))
    header("Location:login.php");

include('includes/connection.php');
include('includes/functions.php');
//Initialization
// $Name = $IPA =$MACA = $ISP =$Access = $Status =$OS =$cpu = $Device = $Ram="";
// $nameError = $IPAError =$MACAError = $ISPError =$AccessError = $StatusError =$OsError = $DeviceError = "";

        
        $name= "";
        $gender = "";
        $pregnant= "";
        $age= "";
        $bmi= "";
        $tested_positive= "";
        $smoke= "";
        $workout= "";
        $immune= "";
        $sleep= "";
        $active= "";
        $heart= "";
        $lung= "";
        $diabetes= "";
        $kidney= "";
        $digestion= "";
        $aadhar="";
        $vaccine="Covisheild";
        $dose1="Pending";
        $dose2="Pending";
        $schedule = "";

if(isset($_POST['add'])){


    $name       = $_POST["name"];
    $gender     = $_POST["gender"];
    $pregnant   = $_POST["pregnant"];
    $age        = $_POST["age"];
    $bmi       = $_POST["bmi"];
    $tested_positive = $_POST["tested_positive"];
     $smoke      = $_POST["smoke"];
    $workout    = $_POST["workout"];
    $immune     = $_POST["immune"];
    $sleep      = $_POST["sleep"];
    $active     = $_POST["active"];
    $heart      = $_POST["heart"];
    $lung       = $_POST["lung"];
    $diabetes   = $_POST["diabetes"];
    $kidney     = $_POST["kidney"];
    $digestion  = $_POST["digestion"];
    $aadhar    = $_POST["aadhar"];





    
    // if required fields have data
    if( $name && $age) {
    
        // create query
        
        // $query ="INSERT INTO `user` (`id`, `Name`, `OS`, `CPU`, `RAM`, `IP Address`, `MAC Address`, `Device`, `ISP`, `Access`, `Status`) VALUES (NULL, '$Name', '$OS', '$cpu', '$Ram', '$IPA', '$MACA', '$Device', '$ISP', '$Access', '$Status');";
        

        $query ="INSERT INTO `user_data`(`id`, `Name`, `Age`, `Gender`, `Pregnant`, `Bmi`, `Positive`, `Smoke`, `Workout`, `Immune`, `Sleep`, `Active`, `Heart`, `Lungs`, `Diabetes`, `Kidney`, `Digestion`, `aadhar`, `vaccine`, `dose1`, `dose2`, `schedule`) VALUES (NULL,'$name','$age','$gender','$pregnant','$bmi','$tested_positive','$smoke','$workout','$immune','$sleep','$active','$heart','$lung','$diabetes','$kidney','$digestion','$aadhar','$vaccine','$dose1','$dose2','$schedule');";


        $result = mysqli_query( $conn, $query );
        
        echo "Error: ". $query ."<br>" . mysqli_error($conn);

        // if query was successful
        if( $result ) {
            
            // refresh page with query string
            header( "Location: info.php?alert=success" );
        } else {
            
            // something went wrong
            echo "Error: ". $query ."<br>" . mysqli_error($conn);
        }
        
    }
    
}

// close the mysql connection
mysqli_close($conn);
include('includes/header.php');
?>

<h1>New Candidature</h1><!--<?php echo $_SESSION['loggedInUser']?>-->

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="row">
    <div class="form-group col-sm-6">
        <label for="Name">Name </label>
        <input type="text" class="form-control " id="name" name="name" value="">
        
    </div>
<!------------------------------------------------------------------------------------------------------------------------------->
    <!-- 
    <div class="form-group col-sm-3">
        <label for="Device">Device type *</label>
        <select id="Device" class="form-control form-control-lg" id="Device" name="Device" value="">
        <option disabled selected>-- Choose an option --</option>
        <option >Laptop</option>
            <option >Desktop</option>
            <option>Mobile</option>
            <option>Printer</option>
            <option>Router</option>
            <option>Server</option>
        </select>
    </div> -->
       <div class="form-group col-sm-3">
        <label for="Device">Age *</label>
        <input type="text" class="form-control form-control-lg" id="age" name="age" value="">
       
    </div>
<!------------------------------------------------------------------------------------------------------------------------------->
    
    <div class="form-group col-sm-3">
        <label for="OS">Gender *</label>
        <select id="OS" class="form-control form-control-lg" id="gender" name="gender" value="">
        <option disabled selected>-- Choose an option --</option>
            <option >Male</option>
            <option>Female</option>
      </select>
    </div>
<!------------------------------------------------------------------------------------------------------------------------------->
    
    <div class="form-group col-sm-3">
        <label for="cpu">BMI</label>
        <select id="bmi" class="form-control "id="bmi" name="bmi" value="">
        <option disabled selected>-- Choose an option --</option>
        
            <option >Thinness (< 18.5)</option>
            <option >Normal (18.5 - 25)</option>
            <option >Overweight (25 - 30)</option>
            <option >Obese Class I (30 - 35)</option>
            <option >Obese Class II (35 - 40)</option>
            <option >Obese Class III (> 40)</option>

      </select>         
    </div>   
<!------------------------------------------------------------------------------------------------------------------------------->
   
    <div class="form-group col-sm-3">
        <label for="tested_positive">Tested Positive Before?</label>
        <select id="tested_positive" class="form-control form-control-lg" id="tested_positive" name="tested_positive" value="">
        <option disabled selected>-- Choose an option --</option>
            <option >Yes</option>
            <option >No</option>
      </select>
    </div>
 <!------------------------------------------------------------------------------------------------------------------------------->

    <div class="form-group col-sm-3">
        <label>Smoking</label>
        <select id="smoke" class="form-control "id="smoke" name="smoke" value="">
        <option disabled selected>-- Choose an option --</option>
        <option >Yes</option>
            <option >No</option>
            <option >Former</option>
            
      </select>
            </div>
     
    <div class="form-group col-sm-3">
        <label >Pregnant</label>
        <select id="pregnant" class="form-control "id="pregnant" name="pregnant" value="">
        <option disabled selected>-- Choose an option --</option>
            <option >Yes</option>
            <option >No</option>      
      </select>

        </div>
<!--------------------------------------------------------------->    
          
    <div class="form-group col-sm-3">
        <label for="workout">Workout</label>
        <select id="workout" class="form-control "id="workout" name="workout" value="">
        <option disabled selected>-- Choose an option --</option>
            <option >1</option>
            <option >2</option>
            <option >3</option>
            <option >4</option>
            <option >5</option>
      </select>         
    </div>  
       <div class="form-group col-sm-3">
        <label for="immune">Imunity</label>
        <select id="immune" class="form-control "id="immune" name="immune" value="">
        <option disabled selected>-- Choose an option --</option>
            <option >1</option>
            <option >2</option>
            <option >3</option>
            <option >4</option>
            <option >5</option>
      </select>         
    </div> 
       <div class="form-group col-sm-3">
        <label for="sleep">Sleep</label>
        <select id="sleep" class="form-control "id="sleep" name="sleep" value="">
        <option disabled selected>-- Choose an option --</option>
            <option >1</option>
            <option >2</option>
            <option >3</option>
            <option >4</option>
            <option >5</option>
      </select>         
    </div> 
       <div class="form-group col-sm-3">
        <label for="active">Active Lifestyle</label>
        <select id="active" class="form-control "id="active" name="active" value="">
        <option disabled selected>-- Choose an option --</option>
            <option >1</option>
            <option >2</option>
            <option >3</option>
            <option >4</option>
            <option >5</option>
      </select>         
    </div> 

<!--------------------------------------------------------------->    

<div class="form-group col-sm-3">
        <label for="heart">Heart Disease?</label>
        <select id="heart" class="form-control "id="heart" name="heart" value="">
        <option disabled selected>-- Choose an option --</option>
            <option >Yes</option>
            <option >No</option>
      </select>         
</div>

<div class="form-group col-sm-3">
        <label for="lung">Lungs Disease?</label>
        <select id="lung" class="form-control "id="lung" name="lung" value="">
        <option disabled selected>-- Choose an option --</option>
            <option >Yes</option>
            <option >No</option>
        </select>         
</div> 
       <div class="form-group col-sm-3">
        <label for="diabetes">Diabetes ?</label>
        <select id="diabetes" class="form-control "id="diabetes" name="diabetes" value="">
        <option disabled selected>-- Choose an option --</option>
 <option >Yes</option>
            <option >No</option>
      </select>         
    </div> 
       <div class="form-group col-sm-3">
        <label for="kidney">Kidney Disease?</label>
        <select id="kidney" class="form-control "id="kidney" name="kidney" value="">
        <option disabled selected>-- Choose an option --</option>
  <option >Yes</option>
            <option >No</option>
      </select>         
    </div> 
<!--------------------------------------------------------------->    
 

     <div class="form-group col-sm-3">
        <label for="digestion">Digestion Problem?</label>
        <select id="digestion" class="form-control "id="digestion" name="digestion" value="">
        <option disabled selected>-- Choose an option --</option>
            <option >Yes</option>
            <option >No</option>
      </select>         
    </div> 

       <div class="form-group col-sm-9">
        <label for="aadhar">Aadhaar Number </label>
        <input type="text" class="form-control " id="aadhar" name="aadhar" value="">
        
    </div> 
   
    <div class="col-sm-12">
            <a href="info.php" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success pull-right" name="add">Add Candidate</button>
    </div>
    
</form>

<?php
include('includes/footer.php');
?>