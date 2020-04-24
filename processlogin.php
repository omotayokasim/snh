<?php

session_start();

$errorCount = 0 ;


$email = $_POST['email'] != ""? $_POST['email']: $errorCount++ ;
$password = $_POST['password'] != ""? $_POST['password']: $errorCount++ ;

$_SESSION['email'] = $email ;

if($errorCount > 0)
{

    $_SESSION['error'] = "You have " . $errorCount . " errors in your form submission";
    header("Location: login.php");
     
}else{
    $allUsers = scandir("dbase/users");
    $countAllUsers = count($allUsers);
    for ($counter = 0 ; $counter < $countAllUsers ; $counter++){

        $currentUser = $allUsers[$counter];

        
        if($currentUser == $email . ".json" ){
        $userString = file_get_contents("dbase/users/" . $currentUser);
        $userObject = json_decode($userString);
        $passwordFromDb = $userObject ->password;
        $passwordFromUser = password_verify ($password, $passwordFromDb);


        if($passwordFromDb == $passwordFromUser){
            $_SESSION['loggedin'] = $userObject ->id;
            $_SESSION['email'] = $userObject ->email;
            $_SESSION['fullName'] = $userObject ->first_name . "" . $userObject ->last_name ;
            $_SESSION['role'] = $userObject ->designation;

            if($currentUser == "superadmin@gmail.com" . ".json") {
            header("Location:dashboardAdmin.php");
            }else if($userObject ->designation == 'Patients'){
                header("Location:dashboardPatient.php");
             }else{
                header("Location:dashboardMed.php");
             } 
                    die();
        
            }
        }
}
      $_SESSION['error'] = "Invalid Email or Password" ;
      header("Location:login.php");
      die();

}

?>