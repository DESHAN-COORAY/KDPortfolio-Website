<?php include('./const.php') ?>
<?php

// Check submit button clicked or not 
if (isset($_POST['submit'])) {

    // Get data from the form
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $requirement = $_POST['requirement'];

    $ADate = date_create($_POST['date']);
	$date = date_format($ADate,"Y-m-d"); // date_format() function returns a date formatted according to the specified format

    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    // SQl Query to insert the data into database
    $sql = "INSERT INTO table_appointments SET
            full_name = '$full_name',
            email = '$email',
            address = '$address',
            phone = '$phone',
            requirement = '$requirement',
            date = '$date',
            start_time = '$start_time',
            end_time = '$end_time'
    ";

    // execute the sql query to add data into the database
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

    // Check data is inserted to the database
    if($result==TRUE){
?>
        <br>
        <script src="../JavaScript/sweetalert.min.js"></script>
        <script>
            swal({
                title: "Good job!",
                text: "Your Appointment has been added Successful!\nYour appointment will be confirmed by Email or phone call.",
                icon: "success"
            }).then(function(){
                window.location.href = "../appointments.html";
                console.log('The Ok Button was clicked.');
            });
        </script>
<?php
    }
    else{
?>
        <br>
        <script src="../JavaScript/sweetalert.min.js"></script>
        <script>
            swal({
                title: "Sorry!",
                text: "Your Appointment hasn't been added!",
                icon: "error"
            }).then(function(){
                window.location.href = "../appointments.html";
                console.log('The Ok Button was clicked.');
            });
        </script>

<?php
    }
}
else{
?>
    <br>
    <script src="../JavaScript/sweetalert.min.js"></script>
    <script>
        swal({
            title: "Sorry!",
            text: "Your Appointment hasn't been added to database!",
            icon: "error"
        }).then(function(){
            window.location.href = "../appointments.html";
            console.log('The Ok Button was clicked.');
        });
    </script>
<?php
}
?>