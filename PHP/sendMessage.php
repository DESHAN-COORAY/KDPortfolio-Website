<?php include('./const.php') ?>
<?php

// Check submit button clicked or not 
if (isset($_POST['submit'])) {

    // Get data from the form
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // SQl Query to insert the data into database
    $sql = "INSERT INTO table_messages SET
            full_name = '$full_name',
            email = '$email',
            subject = '$subject',
            message = '$message'
    ";

    // execute the sql query to add data into the database
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
}
else{
?>
    <br>
    <script src="../JavaScript/sweetalert.min.js"></script>
    <script>
        swal({
            title: "Sorry!",
            text: "Your message hasn't been added to the database!",
            icon: "error"
        }).then(function(){
            window.location.href = "../contact.html";
            console.log('The Ok Button was clicked.');
        });
    </script>
<?php
}

    // Check data is inserted to the database
    if($result==TRUE){
?>
        <br>
        <script src="../JavaScript/sweetalert.min.js"></script>
        <script>
            swal({
                title: "Success!",
                text: "Your message has been sent Successful!",
                icon: "success"
            }).then(function(){
                window.location.href = "../contact.html";
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
                text: "Your message hasn't been sent!",
                icon: "error"
            }).then(function(){
                window.location.href = "../contact.html";
                console.log('The Ok Button was clicked.');
            });
        </script>
<?php
    }
?>