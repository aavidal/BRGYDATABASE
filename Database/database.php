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
    session_start();
        $_SESSION['viewIdNumber'] = $viewIdNumber;
        $_SESSION['viewLastName'] = $viewLastName;
        $_SESSION['viewFirstName'] = $viewFirstName;
        $_SESSION['viewMiddleName'] = $viewMiddleName;
        $_SESSION['viewAlias'] = $viewAlias;
        $_SESSION['viewMonth'] = $viewMonth;
        $_SESSION['viewDay'] = $viewDay;
        $_SESSION['viewYear'] = $viewYear;
        $_SESSION['viewPOB'] = $viewPOB;
        $_SESSION['viewGender'] = $viewGender;
        $_SESSION['viewCivilStatus'] = $viewCivilStatus;
        $_SESSION['viewVoterStatus'] = $viewVoterStatus;
        $_SESSION['viewIfActive'] = $viewIfActive;
        $_SESSION['viewReligion'] = $viewReligion;
        $_SESSION['viewNationality'] = $viewNationality;
        $_SESSION['viewOccupation'] = $viewOccupation;
        $_SESSION['viewSector'] = $viewSector;
        $_SESSION['viewCityAddress'] = $viewCityAddress;
        $_SESSION['viewProvAddress'] = $viewProvAddress;
        $_SESSION['viewPurok'] = $viewPurok;
        $_SESSION['viewEmail'] = $viewEmail;
        $_SESSION['viewMobileNumberA'] = $viewMobileNumberA;
        $_SESSION['viewMobileNumberB'] = $viewMobileNumberB;
        $_SESSION['viewHomeNumberA']  = $viewHomeNumberA;
        $_SESSION['viewHomeNumberB'] = $viewHomeNumberB;
        $_SESSION['viewResidentType'] = $viewResidentType;
        $_SESSION['viewResidentStatus'] = $viewResidentStatus;
        $_SESSION['viewEncoder'] = $viewEncoder;
        $_SESSION['viewEncoderPosition'] = $viewEncoderPosition;
        $_SESSION['viewImageLocation'] = $viewImage;
        header("Location: ../viewResident.php");

}