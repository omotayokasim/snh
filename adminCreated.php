<?php session_start();


?>


<p><strong> Welcome to SNG : Hospital for the Ignorant, Please register </strong></p>
<p> Please note that all fields below are required for successful Login </p>


<form action = "processAdminCreated.php" method = "POST">

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
<label>FIRST NAME</label>
</br>
<input

<?php
if(isset($_SESSION['first_name'])){
    echo "value =" . $_SESSION['first_name'];
}

?>

type = " text" name = "firstName" placeholder = "Enter Your First Name" />
</p>

<p>
<label>LAST NAME</label>
</br>
<input 

<?php
if(isset($_SESSION['last_name'])){
    echo "value =" . $_SESSION['last_name'];
}

?>


type = "text" name = "lastName" placeholder = "Enter Your Last Name"/>
 </p>

<p>
    <label>EMAIL</label>
    </br>
    <input type = "email" name = "email" placeholder = "Enter Your Email contact" />  
    </p>

    <p>
        <label>DEPARTMENT</label>
        </br>
        <select name = "department">

            <option value = "" > select department </option>
            <option
            <?php
                  if(isset($_SESSION['department']) && $_SESSION['department'] == 'Laboratory')
                {
                    echo "selected";
                 }

                ?>
            > Laboratory </option>

            <option

            <?php
                  if(isset($_SESSION['department']) && $_SESSION['department'] == 'Paediatrics ward')
                {
                    echo "selected";
                 }

                ?>
            
            > Paediatrics ward </option>

            <option
            <?php
                  if(isset($_SESSION['department']) && $_SESSION['department'] == 'Offices')
                {
                    echo "selected";
                 }

                ?>
            
            > Offices </option>

            <option
            <?php
                  if(isset($_SESSION['department']) && $_SESSION['department'] == 'Patients Ward')
                {
                    echo "selected";
                 }

                ?>
            
            > Patients Ward </option>

            <option
            <?php
                  if(isset($_SESSION['department']) && $_SESSION['department'] == 'Operations Theatre')
                {
                    echo "selected";
                 }

                ?>
                        
            > Operations Theatre </option>

            <option
            <?php
                  if(isset($_SESSION['department']) && $_SESSION['department'] == 'Eye clinic')
                {
                    echo "selected";
                 }

                ?>
                        
            > Eye Clinic </option>
            
        </select>   
        </p>

        <p>
            <label for = "gender"> GENDER </label>
            </br>
            <select name = "gender">
    
                <option value = ""> select your gender </option>

                <option
                <?php
                  if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male')
                {
                    echo "selected";
                 }

                ?> 
                  > Male </option>

                <option
                <?php
                  if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female')
                {
                    echo "selected";
                 }

                ?> 
                
                > Female </option>
                                
            </select>   
            </p>

            <p>
    <label>PASSWORD</label>
    </br>
    <input type = "password" name = "password" placeholder = "Enter Your Password" />  
    </p>

    <p>
        <label>DESIGNATION</label>
        </br>
        <select name = "designation">

            <option value = ""> select your designation </option>
            <option
            <?php
                  if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patients')
                {
                    echo "selected";
                 }


                ?>
            > Patients </option>
            
            <option
            <?php
                  if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team (MT)')
                {
                    echo "selected";
                 }

                ?>

            > Medical Team (MT) </option>

            <option
            <?php
                  if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Super Admin')
                {
                    echo "selected";
                 }

                ?>

            
            > Super Admin </option>
            
            
        </select>   
        </p>

                        
                    <p>
                        <button type = "submit">
                            Register

                        </button>
                    </p>               



</form>



<?php

include_once('library/footer.php');

?>