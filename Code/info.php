<?php

// if user is not logged in
session_start();

if( !$_SESSION['loggedInUser'] ) {
    
    // send them to the login page
    header("Location: login.php");
}

$alertMessage ="";

// connect to database
include('includes/connection.php');

// query & result
$query = "SELECT * FROM `user_data` order by id asc";
$result = mysqli_query( $conn, $query );

// check for query string
if( isset( $_GET['alert'] ) ) {
    
    // new device added
    if( $_GET['alert'] == 'success' ) {
        $alertMessage = "<div class='alert alert-success'>New Profile added! <a class='close' data-dismiss='alert'>&times;</a></div>";
        
    // device updated
    } elseif( $_GET['alert'] == 'updatesuccess' ) {
        $alertMessage = "<div class='alert alert-success'>Data updated! <a class='close' data-dismiss='alert'>&times;</a></div>";
    
    // device deleted
    } elseif( $_GET['alert'] == 'deleted' ) {
        $alertMessage = "<div class='alert alert-success'>Record deleted! <a class='close' data-dismiss='alert'>&times;</a></div>";
    }
      
}

// close the mysql connection
mysqli_close($conn);

include('includes\header.php');
?>

<h1>Vaccination Drive</h1><br>

<?php echo $alertMessage; ?>

<table class="table table-striped table-bordered">
    <tr>
        <th>id</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Aadhaar</th>
        <th>Vaccine</th>
        <th>Scheduled</th>
        <th>Dose 1</th>
        <th>Dose 2</th>
        <th>Edit</th>
    </tr>
    
    <?php
    
    if( mysqli_num_rows($result) > 0 ) {
        
        // we have data!
        // output the data
        
        while( $row = mysqli_fetch_assoc($result) ) {
            echo "<tr>";
            
            echo "<td>" . $row['id'] . "</td><td>" . $row['Name'] . "</td><td>" . $row['Age'] . "</td><td>" . $row['Gender'] . "</td><td>" . $row['aadhar'] . "</td><td>" . $row['vaccine'] . "</td><td>" . $row['schedule'] . "</td><td>". $row['dose1'] . "</td><td>" . $row['dose2'] ;
            
            echo '<td><a href="edit.php?id=' . $row['id'] . '" type="button" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-edit"></span>
                    </a></td>';
            
             
            
            echo "</tr>";
        }
    } else { // if no entries
        echo "<div class='alert alert-warning'>You have no Data!</div>";
    }

    //mysqli_close($conn);

    ?>

    <tr>
        <td colspan="12"><div class="text-center"><a href="add.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Candidature</a></div></td>
    </tr>
</table>

<?php
include('includes\footer.php');
?>