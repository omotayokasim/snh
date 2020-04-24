<?php session_start();

$errorCount = 0 ;



$First_Name = $_POST['firstName'] != ""? $_POST['firstName']: $errorCount++ ;
$last_Name = $_POST['lastName'] != ""? $_POST['lastName']: $errorCount++ ;
$email = $_POST['email'] != ""? $_POST['email']: $errorCount++ ;
$department = $_POST['department'] != ""? $_POST['department']: $errorCount++ ;
$gender = $_POST['gender'] != ""? $_POST['gender']: $errorCount++ ;
$password = $_POST['password'] != ""? $_POST['password']: $errorCount++ ;
$designation = $_POST['designation'] != ""? $_POST['designation']: $errorCount++ ;


$_SESSION['first_Name'] = $first_name ;
$_SESSION['last_Name'] = $last_name ;
$_SESSION['email'] = $email ;
$_SESSION['department'] = $department ;
$_SESSION['gender'] = $gender ;
$_SESSION['designation'] = $designation ;


if($errorCount > 0)
{

    $_SESSION['error'] = "You have " . $errorCount . " errors in your form submission";
    header("Location:register.php");

}
else

{
    $allUsers = scandir("dbase/users");
    $countAllUsers = count($allUsers);
    $newUserId = ($countAllUsers - 1);

     $userDetails = [

        'id' => $newUserId,
        'first_name' => $first_Name,
        'last_name' => $last_Name,
        'email' => $email,
        'department' => $department,
        'gender' => $gender,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'designation' => $designation
      
     ] ;

     for ($counter = 0 ; $counter < $countAllUsers ; $counter++){
         $currentUser = $allUsers[$counter];
         if($currentUser == $email . ".json" ){
             $_SESSION["error"] = "Registration Failed, User already exists";
             header("Location:register.php");
             die(); 
         }
     }

     file_put_contents("dbase/users/" . $email . ".json" , json_encode($userDetails));

     $_SESSION['success'] = "Registration successful,You can now login". $first_name;
     header("Location:login.php");
     
     


    

}


?>











