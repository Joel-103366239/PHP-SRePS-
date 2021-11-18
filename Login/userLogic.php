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

        if (empty($_POST["uID"])) {
            $_SESSION['nameErr'] = "User name is required"; // Sessions used for error messages.
            header("Location: loginUser.php"); // Redirected to page to display error messages.
        } 
        else {
            $uName = clean($_POST['uID']);
        }
        

        if (empty($_POST["uPWD"])) {
            $_SESSION['pwdErr'] = "Password is required";
            header("Location: loginAdmin.php");
        } 
        else {
            $aPWD = clean($_POST['uPWD']);
        }
    }

    // If password and username is null then cannot proceed to authentication check.
    if($aPWD != "" && $uName != ""){
        $sql = "SELECT `pwd` from pharma_users WHERE `user` = '$uName' ";
        $result= mysqli_query($conn, $sql);

        if($result == true){
            $row = $row = mysqli_fetch_assoc($result);
            if($aPWD == $row['pwd']){
                $_SESSION['user'] = $uName;
                $_SESSION['rank'] = "Employee";
                header("Location: ../Main/main.php");
            }
            else{
                $_SESSION['Err'] = "Incorrect Username or Password";
                header("Location: loginUser.php");
            }
        }
        else{
            echo "Fail". $conn->error;
        }
    }
    else 
    {
        header("Location: loginUser.php");
    }
?>