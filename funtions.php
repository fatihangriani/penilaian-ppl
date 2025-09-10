<<<<<<< HEAD
<?php
$conn = mysqli_connect("localhost","root","","fatih1");
function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[]= $row;

    }
    return $rows;
}

function execute($query){
    global $conn;
    return mysqli_query($conn,$query);
}


=======
<?php
$conn = mysqli_connect("localhost","root","","fatih1");
function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[]= $row;

    }
    return $rows;
}

function execute($query){
    global $conn;
    return mysqli_query($conn,$query);
}


>>>>>>> 09c9695149b97245e66d3b766e5947ca1aacd97b
?>