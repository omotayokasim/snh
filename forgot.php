<?php session_start();
include_once('library/header.php');

?>

<h3> Forgot Password </h3>
<p> Provide the Email Addresss associated with your account </P>

<form action = "processforgot.php" method = "POST">

<p>

<?php
      
      if(isset($_SESSION['error']) && !empty($_SESSION['error']))
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
    echo "value = " . $_SESSION['email'];
}

?>
    
    type = "email" name = "email" placeholder = "Enter Your Email contact" />  
    </p>

    <p>
                        <button type = "submit">
                            Request Password reset

                        </button>
                    </p>               



</form>


<?php
include_once('library/footer.php');

?>