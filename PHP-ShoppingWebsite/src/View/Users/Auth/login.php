<?php 
require_once "../../includes/header.php"; 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

    <h1 style="display: flex; justify-content: center; align-items: center; height: 15vh; color:darkslategray;">Login page</h1>
    <hr style="border-color: white; border-width: 5px">

    <div style="display: flex; justify-content: center; align-items: center; color:darkslategray; height: 10vh;">
        <?php 
            if(!empty($_SESSION['success_message'])) {
                echo "<h4 style='color: green'>" . $_SESSION['success_message'] . "</h4><br>";
                $_SESSION['success_message'] = null;
            } elseif(!empty($_SESSION['error_message'])) {
                echo "<h4 style='color: red'>" . $_SESSION['error_message'] . "</h4><br>";
                $_SESSION['error_message'] = null;
            } else {
                echo "<h4>Log in with your credentials!</h4><br>";
            }

        ?>
    </div>

        <div class="login_div">
            <form style="border: 1px solid #000000; background-color:rgba(240, 255, 240, 0.5); padding: 20px; width: 300px; margin: 0 auto;" method="POST" action="../../../../index.php">
                <label for="email">Email:</label><br>
                <input style="text-align: center;" type="text" name="email" id="email"><br><br>

                <label for="password">Password:</label><br>
                <input style="text-align: center;" type="password" name="password" id="password"><br><br>

                <div style="height: 5vh;">
                    Don`t have an account, <a href="../Auth/register.php">register</a>!
                </div>

                <input type="submit" style=" margin-top: 5px; display: block; width: 100%; padding: 10px; background-color: #4CAF50; color: white;
                            border: none; border-radius: 20px;" name="login_button" value="Login">
            </form>
            </div>
            <div style="display: flex; justify-content: center; align-items: center; height: 15vh;">
            <a href="../../home.php"><button style=" width: 100%; padding: 10px;padding-right: 50px;
                    padding-left: 50px; background-color: #297fb1;
                    color: white; border: none; margin-top: 5px; border-radius: 20px;">Back</button></a>
        </div>

<?php require_once "../../includes/footer.php"; ?>