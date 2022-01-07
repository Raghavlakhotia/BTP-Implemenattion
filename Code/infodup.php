<?php
session_start();

//If not loged in send back to login page
if(!$_SESSION['loggedInUser']){
    header("Location: login.php");
}


$Name = $IPA =$MACA = $ISP =$Access = $Status =$Os =$cpu = $Device = $Ram="";
include('includes/connection.php');
include('includes/functions.php');


if(isset($_POST['add'])){


// these inputs are not required
    // so we'll just store whatever has been entered
     $Name    = validateFormData( $_POST["Name"] );
     $IPA    = validateFormData( $_POST["IPA"] );
    $MACA    = validateFormData( $_POST["MACA"] );
        $ISP  =  $_POST["ISP"] ;
    $Access  =  $_POST["Access"] ;
    $Status    =$_POST["Status"] ;
    $OS =$_POST["OS"];
        $cpu=$_POST["cpu"];
        $Device=$_POST["Device"];
        $Ram=$_POST["Ram"];
    
    
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



<h1>New Inventory</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" method="post" class="row">
    <div class="form-group col-sm-6">
        <label for="Name">Name *</label>
        <input type="text" class="form-control " id="name" name="Name" value="">
        
    </div>
<!------------------------------------------------------------------------------------------------------------------------------->
    
    <div class="form-group col-sm-6">
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
    
    <div class="form-group col-sm-6">
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
    <div class="form-group col-sm-6">
        <label for="cpu">CPU *</label>
        <input type="text" class="form-control " id="cpu" name="cpu" value="">
        
    </div>   
<!------------------------------------------------------------------------------------------------------------------------------->
   
    <div class="form-group col-sm-6">
        <label for="Ram">RAM *</label>
        <select id="Ram" class="form-control form-control-lg" id="Ram" name="Ram" value="">
        <option disabled selected>-- Choose an option --</option>
        <option >1 Gb</option><option >2 Gb</option><option >3 Gb</option><option >4 Gb</option><option >5 Gb</option><option >6 Gb</option><option >7 Gb</option><option >8 Gb</option><option >9 Gb</option><option >10 Gb</option><option >11 Gb</option><option >12 Gb</option><option >13 Gb</option><option >14 Gb</option><option >15 Gb</option><option >16 Gb</option>
            
      </select>
    </div>
 <!------------------------------------------------------------------------------------------------------------------------------->

    <div class="form-group col-sm-6">
        <label>ISP *</label>
        <select id="ISP" class="form-control "id="ISP" name="ISP" value="">
        <option disabled selected>-- Choose an option --</option>
        <option >Jio</option>
            <option >Airtel</option>
            <option >Vodafone</option>
            <option >BSNL</option>
            <option >Hathway</option>
      </select>
            </div>
<!------------------------------------------------------------------------------------------------------------------------------->
     
    <div class="form-group col-sm-6">
        <label >IP Address *</label>
        <input type="text" class="form-control " id="IPA" name="IPA" value="">
        </div>
    <div class="form-group col-sm-6">
        <label>MAC Address *</label>
        <input type="text" class="form-control " id="MACA" name="MACA" value="">
    </div>
<!------------------------------------------------------------------------------------------------------------------------------->    
    
    <div class="form-group col-sm-6">
        <label for="Access">Access *</label>
    <select id="Access" class="form-control" id="Access" name="Access" value="">
        <option disabled selected>-- Choose an option --</option>
        <option >Complete</option>
            <option >Limited</option>
      </select>
        </div>
<!------------------------------------------------------------------------------------------------------------------------------->    
    
    <div class="form-group col-sm-6">
        <label for="Status">Status *</label>
        <select id="Status" class="form-control form-control-lg" id="Status" name="Status" value="">
        <option disabled selected>-- Choose an option --</option>
        <option >Enabled</option>
            <option >Disabled</option>
      </select>
    </div> 
 <!------------------------------------------------------------------------------------------------------------------------------->   
   
    <div class="col-sm-12">
            <a href="info.php" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success pull-right" name="add">Add Device</button>
    </div>
</form>

<?php
include('includes/footer.php');
?>