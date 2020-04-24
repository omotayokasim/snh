<?php session_start();

if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin']))
{
  header("Location:dashboard.php");

}

include_once('library/header.php');

?>

<h3> Login </h3>

<p>

<?php
if(isset($_SESSION['success']) && !empty($_SESSION['success']))
{
    echo "<span style = 'color: green'>" . $_SESSION['success'] ."</span>" ;
     session_destroy();

}

?>

</p>
<form method = "POST" action = "processlogin.php">
<p>

<?php
      
      if(isset($_SESSION['error']) && !empty($_SESSION["error"]))
      {
        echo "<span style = 'color: red'>" . $_SESSION['error'] ."</span>" ;
        session_destroy();
    
 }

?>
</p>


<p>
    <label>EMAIL</label>
    </br>
    <input 
    
    <?php
if(isset($_SESSION['email'])){
    echo "value =" . $_SESSION['email'];
}

?>
    
    type = "email" name = "email" placeholder = "Enter Your Email contact" />  
    </p>

    <p>
    <label>PASSWORD</label>
    </br>
    <input type = "password" name = "password" placeholder = "Enter Your Password" />  
    </p>

    <p>
                        <button type = "submit">
                            Login

                        </button>
                    </p>               

</form>


<?php
include_once('library/footer.php');

?>