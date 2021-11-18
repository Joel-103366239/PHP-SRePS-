<?php
include_once '../Database/connectLogin.php';
session_start();
// Cleans data to make it harder for hackers to gain acces throught SQL injections.
function clean($data) {
  $data = trim($data); // Removes whitespace.
  $data = stripslashes($data); // Removes '/' or '-'
  $data = htmlspecialchars($data); // Removes special characters.
  return $data;
}

// Error validators makesure all inputs are filled
 if(isset($_POST['submit'])){

    if (empty($_POST["aID"])) {
       $_SESSION['nameErr'] = "User name is required"; // Sessions used for error messages.
       header("Location: loginAdmin.php"); // Redirected to page to display error messages.
    } 
    else{
        $uName = clean($_POST['aID']);
    }
    if (empty($_POST["aPWD"])) {
        $_SESSION['pwdErr'] = "Password is required";
        header("Location: loginAdmin.php");
    } 
    else {
        $aPWD = clean($_POST['aPWD']);
    }

    // If password and username is null then cannot proceed to authentication check.
    if($aPWD != "" && $uName != ""){
        $sql = "SELECT `pwd` from pharma_admins WHERE `admin` = '$uName' ";
        $result= mysqli_query($conn, $sql);
    
        if($result == true){
            $row = $row = mysqli_fetch_assoc($result);
            if($aPWD != $row['pwd']){
                $_SESSION['Err'] = "Incorrect Username or Password";
                header("Location: loginAdmin.php");
            }
            else{
                $_SESSION['user'] = $uName;
                $_SESSION['rank'] = "Manager";
                header("Location: ../Main/main.php");
            }
        }
        else{
            echo "Fail". $conn->error;
        }
    }
    else{
        header("Location: loginAdmin.php");
    }
   
}

   


?>