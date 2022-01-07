<?php
session_start();

// if user is not logged in
if( $_SESSION['loggedInUser']=="" ) {
    
    // send them to the login page
    header("Location: login.php");
}

$SNO="";
$alertMessage ="";

// get ID sent by GET collection
// $Name = $IPA =$MACA = $ISP =$Access = $Status =$OS =$cpu = $Device = $Ram="";


$name = "";
$vaccine = "";
$dose1 ="";
$dose2="";
$schedule="";

// connect to database
include('includes/connection.php');

// include functions file
include('includes/functions.php');

$SNO = $_GET['id'];

// query the database with client ID
$query = "SELECT * FROM user_data WHERE id='$SNO'";
$result = mysqli_query( $conn, $query );    

// if result is returned
if( mysqli_num_rows($result) > 0 ) {
    
    // we have data!
    // set some variables
    while( $row = mysqli_fetch_assoc($result) ) {
        
        $name = $row["Name"];
        $vaccine = $row["vaccine"];
        $dose1 =$row["dose1"];
        $dose2=$row["dose2"];
        $schedule=$row["schedule"];
                
    }
} else { // no results returned
    $alertMessage = "<div class='alert alert-warning'>Nothing to see here. <a href='info.php'>Head back</a>.</div>";
}

// if update button was submitted
if( isset($_POST['update']) ) {
    
    // set variables
    $name = $_POST["name"];
    $vaccine = $_POST["vaccine"];
    $dose1 =$_POST["dose1"];
    $dose2=$_POST["dose2"];
    $schedule=$_POST["schedule"];
    
    
    // new database query & result
    
    // $queryy ="UPDATE `user_data` SET `Name`='$Name',`OS`='$OS',`CPU`='$cpu',`RAM`='$Ram',`IP Address`='$IPA',`MAC Address`='$MACA',`Device`='$Device',`ISP`='$ISP',`Access`='$Access',`Status`='$Status' WHERE id='$SNO' ";
    

    $queryy = "UPDATE `user_data` SET `vaccine`='$vaccine',`dose1`='$dose1',`dose2`='$dose2',`schedule`='$schedule' WHERE `user_data`.`id`=$SNO";
    $result = mysqli_query( $conn, $queryy );
    
    if( $result ) {
        
        // redirect to client page with query string
        header("Location: info.php?alert=updatesuccess");
    } else {
        echo "Error updating record: " . mysqli_error($conn); 
    }
}

// if delete button was submitted
if( isset($_POST['delete']) ) {
    
    $formURL = htmlspecialchars( $_SERVER["PHP_SELF"]) . "?id=".$SNO;
    
    $alertMessage = "<div class='alert alert-danger'>
    
                        <p>Are you sure you want to delete this Record? No take backs!</p><br>
                        
                        <form action='".$formURL."'  method='post'>
                        
                            <input type='submit' class='btn btn-danger btn-sm' name='confirm-delete' value='Delete'>
                            
                            <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Cancel</a>
                        </form>
                    </div>";
    
}

// if confirm delete button was submitted
if( isset($_POST['confirm-delete']) ) {
    echo $_GET['id'];
    
    $idToDelete = $_GET['id'];
    // new database query & result
    $query = "DELETE FROM `user_data` WHERE id='".$idToDelete."'";
    
    $resultt = mysqli_query( $conn, $query );
    
    if( $resultt ) {
        
        // redirect to client page with query string
        header("Location: info.php?alert=deleted");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
}

// close the mysql connection
mysqli_close($conn);

include('includes/header.php');
?>



<h1>Update the Current Status of Candidate</h1>
<?php echo $alertMessage; ?>

<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>?id=<?php echo $SNO; ?>" method="post" class="row">
    <div class="form-group col-sm-12">
        <label for="name">Name *</label>
        <input type="text" class="form-control " disabled  id="name" name="name" value="<?php echo $name;?>">
    </div>
    
<!------------------------------------------------------------------------------------------------------------------------------->
      <div class="form-group col-sm-12">
        <label for="vaccine">Vaccine Name</label>
        <select id="vaccine" class="form-control form-control-lg" id="vaccine" name="vaccine" value="<?php echo $vaccine?>">
        <option <?php if($vaccine== "Covisheild") echo "selected";?>>Covisheild</option>
            <option <?php if($vaccine== "Covaxin") echo "selected";?>>Covaxin</option>
            <option <?php if($vaccine== "Stutnik") echo "selected";?>>Stutnik</option>
            <option <?php if($vaccine== "Pfizer") echo "selected";?>>Pfizer</option>
        </select>
    </div>
<!------------------------------------------------------------------------------------------------------------------------------->
    
    <div class="form-group col-sm-12">
        <label for="schedule">Schedule</label>
        <input type="text" class="form-control "   id="schedule" name="schedule" value="<?php echo $schedule;?>">
    </div>
    

      <div class="form-group col-sm-12">
        <label for="dose1">Dose 1</label>
        <select id="dose1" class="form-control form-control-lg" id="dose1" name="dose1" value="<?php echo $dose1?>">
        <option <?php if($dose1== "Pending") echo "selected";?>>Pending</option>
            <option <?php if($dose1== "scheduled") echo "selected";?>>scheduled</option>
            <option <?php if($dose1== "Done") echo "selected";?>>Done</option>
        </select>
    </div>


      <div class="form-group col-sm-12">
        <label for="dose2">Dose 2</label>
        <select id="dose2" class="form-control form-control-lg" id="dose2" name="dose2" value="<?php echo $dose2?>">
        <option <?php if($dose2== "Pending") echo "selected";?>>Pending</option>
            <option <?php if($dose2== "scheduled") echo "selected";?>>scheduled</option>
            <option <?php if($dose2== "Done") echo "selected";?>>Done</option>
        </select>
    </div>
 <!------------------------------------------------------------------------------------------------------------------------------->   
     <div class="col-sm-12">
        <hr>
         <input type="hidden" name="what2del" value="<?php echo $_GET['id']; ?>">
        <button type="submit" class="btn btn-lg btn-danger pull-left" name="delete">Delete</button>
        <div class="pull-right">
            <a href="info.php" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success" name="update">Update</button>
        </div>
    </div>
</form>


<?php
include('includes/footer.php');
?>