<?php
include_once('connection.php');


if (isset($_POST['btnLogin'])) {
    $adminUsername = $_POST['username'];
    $adminPassword = $_POST['password'];
    $loginQuery = "SELECT * FROM officials where (email = '$adminUsername' OR username = '$adminUsername') AND officialPassword = '$adminPassword';";
    $login = mysqli_query($conn, $loginQuery);
    
    if ($adminUsername == "admin" && $adminPassword == "admin") {
        $name = "ADMIN NAME";
        $purok = "ADMIN PUROK";
        $position = "ADMIN POSITION";        
        $imageLocation = "../assets/images/sample.jpg";
        session_start();
        $_SESSION['name'] = $name;
        $_SESSION['purok'] = $purok;
        $_SESSION['position'] = $position;
        $_SESSION['imageLocation'] = $imageLocation;
        header("Location: ../registerOfficial.php");
    }

    if (mysqli_num_rows($login) == 1) {
        while ($dashboard = mysqli_fetch_assoc($login)) {
            $name = $dashboard['nameAlias'];
            $position = $dashboard['position'];
            $purok = $dashboard['purok'];
            $image = $dashboard['imageLocation'];
        }
        session_start();
        $_SESSION['imageLocation'] = $image;
        $_SESSION['name'] = $name;
        $_SESSION['position'] = $position;
        $_SESSION['purok'] = $purok;
        header("Location: ../dashboard.php");
    }

    else{
        echo '<script> alert("Error credentials"); </script>';
        header("Location: ../index.php");
    }

}