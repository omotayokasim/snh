<?php session_start();
include_once('library/header.php');
if(!$_SESSION['loggedin'] && !isset($GET['token']) && !isset($_SESSION['token'])){
  $_SESSSION['error'] = "You are not authorised to view that Page";
  header("Location: login.php");
}

?>
<h3> Reset Password </h3>
<p> Reset Password associated with your account : [email] </p>
<form action = "processreset.php" method = "POST" >

<p>

<?php
      
      if(isset($_SESSION['error']) && !empty($_SESSION['error']))
      {
        echo "<span style = 'color: red'>" . $_SESSION['error'] ."</span>" ;
        session_destroy();
}

?>
</p>

<?php if(!$_SESSION['loggedin']){ ?>

<input

             <?php
                 if(isset($_SESSION['token']))
                 { echo "value='" . $_SESSION['token'] . "'";
                   }else{
                 echo "value='" . $_GET['token'] . "'";
                }
                    ?>

                      type = "hidden" name = "token"  />

            <?php  }  ?>

               <p>
           <label>EMAIL</label>
             </br>
             <input

             <?php
             if(isset($_SESSION['email']))
                 { echo "value=" . $_SESSION['email'];
                   }
                
                    ?>    
    
         type = "text" name = "email" placeholder = "Email" />  
    </p>

    <p>
    <label>Enter New Password</label>
    </br>
    <input type = "password" name = "password" placeholder = "Enter Your Password" />  
    </p>

    <p>
                        <button type = "submit">
                            Reset Password

                        </button>
                    </p> 

                    </form>
              
<?php
include_once('library/footer.php');

?>