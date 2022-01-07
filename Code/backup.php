<?php
session_start();

//If not loged in send back to login page
if(!(isset($_SESSION['loggedInUser'])))
    header("Location:login.php");

include('includes/connection.php');
include('includes/functions.php');
//Initialization
$Name = $IPA =$MACA = $ISP =$Access = $Status =$OS =$cpu = $Device = $Ram="";
$nameError = $IPAError =$MACAError = $ISPError =$AccessError = $StatusError =$OsError = $DeviceError = "";

if(isset($_POST['add'])){

    // so we'll just store whatever has been entered
     $Name  = validateFormData( $_POST["Name"] );
     $IPA   = validateFormData( $_POST["IPA"] );
    $MACA   = validateFormData( $_POST["MACA"] );
    $ISP    = $_POST["ISP"];
    $Access = $_POST["Access"];
    $Status = $_POST["Status"];
    $OS     = $_POST["OS"];
    $cpu    = $_POST["cpu"];
    $Device = $_POST["Device"];
    $Ram    = $_POST["Ram"];
    
    // if required fields have data
    if( $Name && $IPA && $MACA && $ISP && $Access && $Status) {
    
        // create query
        
        $query ="INSERT INTO `user` (`id`, `Name`, `OS`, `CPU`, `RAM`, `IP Address`, `MAC Address`, `Device`, `ISP`, `Access`, `Status`) VALUES (NULL, '$Name', '$OS', '$cpu', '$Ram', '$IPA', '$MACA', '$Device', '$ISP', '$Access', '$Status');";
        
        $result = mysqli_query( $conn, $query );
        
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

<h1>New Inventory</h1><!--<?php echo $_SESSION['loggedInUser']?>-->

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="row">
    <div class="form-group col-sm-6">
        <label for="Name">Name </label>
        <input type="text" class="form-control " id="name" name="Name" value="">
        
    </div>
<!------------------------------------------------------------------------------------------------------------------------------->
    
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
    </div>
<!------------------------------------------------------------------------------------------------------------------------------->
    
    <div class="form-group col-sm-3">
        <label for="OS">OS *</label>
        <select id="OS" class="form-control form-control-lg" id="OS" name="OS" value="">
        <option disabled selected>-- Choose an option --</option>
        <option >Windows</option>
            <option>MAC OS</option>
            <option>Linux</option>
            <option >iOS</option>
            <option>Android</option>
      </select>
    </div>
<!------------------------------------------------------------------------------------------------------------------------------->
    
    <div class="form-group col-sm-3">
        <label for="cpu">BMI</label>
        <select id="cpu" class="form-control "id="cpu" name="cpu" value="">
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
        <label for="Ram">Tested Positive Before?</label>
        <select id="Ram" class="form-control form-control-lg" id="Ram" name="Ram" value="">
        <option disabled selected>-- Choose an option --</option>
            <option >Yes</option>
            <option >No</option>
      </select>
    </div>
 <!------------------------------------------------------------------------------------------------------------------------------->

    <div class="form-group col-sm-3">
        <label>Smoking</label>
        <select id="ISP" class="form-control "id="ISP" name="ISP" value="">
        <option disabled selected>-- Choose an option --</option>
        <option >Yes</option>
            <option >No</option>
            <option >Former</option>
            
      </select>
            </div>
<!------------------------------------------------------------------------------------------------------------------------------->
     
    <div class="form-group col-sm-3">
        <label >IP Address *</label>
        <input type="text" class="form-control " id="IPA" name="IPA" value="">
        </div>
<!------------------------------------------------------------------------------------------------------------------------------->
    
       <div class="form-group col-sm-3">
        <label >IP Address *</label>
        <input type="text" class="form-control " id="IPA" name="IPA" value="">
        </div>
<!------------------------------------------------------------------------------------------------------------------------------->    
    <!-- <div class="form-group col-sm-6">
        <label>MAC Address *</label>
        <input type="text" class="form-control " id="MACA" name="MACA" value="">
    </div>
    
    <div class="form-group col-sm-6">
        <label for="Access">Access *</label>
    <select id="Access" class="form-control" id="Access" name="Access" value="">
        <option disabled selected>-- Choose an option --</option>
        <option >Complete</option>
            <option >Limited</option>
      </select>
        </div>
    
    <div class="form-group col-sm-6">
        <label for="Status">Status *</label>
        <select id="Status" class="form-control form-control-lg" id="Status" name="Status" value="">
        <option disabled selected>-- Choose an option --</option>
        <option >Enabled</option>
            <option >Disabled</option>
      </select>
    </div> --> 
<!------------------------------------------------------------------------------------------------------------------------------->    
 <!------------------------------------------------------------------------------------------------------------------------------->   
   
    <div class="col-sm-12">
            <a href="info.php" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success pull-right" name="add">Add Device</button>
    </div>
    
</form>

<?php
include('includes/footer.php');
?>