<?php 
    require_once "includes/header.php";     

?>



    <h1 style="display: flex; justify-content: center; align-items: center; height: 30vh; color:darkslategray">Welcome to the Home page</h1>
    <hr style="border-color: white; border-width: 5px">

    <div style="display: flex; justify-content: center; align-items: center; color:blanchedalmond; height: 20vh;">
    <?php
        if(!empty($_GET['success_message'])) {
            echo "<h4 style='color: green'>" . $_GET['success_message'] . "</h4><br>";
            $_GET['success_message'] = null;
        } elseif(!empty($_GET['error_message'])) {
            echo "<h4 style='color: red'>" . $_GET['error_message'] . "</h4><br>";
            $_GET['error_message'] = null;
        }
    ?>
    </div> 

    <div style="display: flex; justify-content: center; align-items: center; height: 5vh;">
    

        <?php if(isset($_SESSION['user_id'])) {?>

            <div>
                <a href="Products/index.php"><button class="btn btn-primary" style="margin-right: 5px; padding: 15px 20px; font-size: 20px; border-radius: 20px;">View Producst</button></a>
                <a href="Users/edit.php"><button class="btn btn-primary" style="margin-right: 5px; padding: 15px 20px; font-size: 20px; border-radius: 20px;">Edit Profile</button></a>
                <a href="Users/Auth/logout.php"><button class="btn btn-primary" style="margin-right: 5px; padding: 15px 20px; font-size: 20px; border-radius: 20px;">Logout</button></a>
            </div>

        <?php } else { ?>
            <div>
                <a href="Users/Auth/login.php"><button class="btn btn-primary" style="margin-right: 5px; padding: 15px 20px; font-size: 20px; border-radius: 20px;">Login</button></a>
                <a href="Users/Auth/register.php"><button class="btn btn-primary" style="margin-right: 5px; padding: 15px 20px; font-size: 20px; border-radius: 20px;">Register</button></a>
            </div>
        <?php } ?>

    </div>


<?php require_once "includes/footer.php"; ?>