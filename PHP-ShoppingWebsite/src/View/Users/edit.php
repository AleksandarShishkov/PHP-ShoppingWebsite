<?php

require_once '../../config.php';
require_once '../includes/header.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    if(isset($_SESSION['user_id'])) {

        $conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);
    
        if($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }
    
        $user_id = $_SESSION['user_id'];
    
        $find_user = "SELECT * FROM users WHERE id = '$user_id'";
        $user = $conn->query($find_user);
    
        if($user->num_rows > 0) {
            $record = $user->fetch_assoc();
    
            $name = $record['name'];
            $surname = $record['surname'];
            $email = $record['email'];
            $phone = $record['phone'];
            $city = $record['city'];
    
    
        } else {
            $_SESSION['error_message'] = 'No user located. Try again.';
            header('Location: http://localhost/PHP-ShoppingWebsite/src/View/home.php');
        }
    
        if(!empty($_SESSION['success_message'])) {
            echo "<h4 style='color: green'>" . $_SESSION['success_message'] . "</h4><br>";
            $_SESSION['success_message'] = null;
        } elseif(!empty($_SESSION['error_message'])) {
            echo "<h4 style='color: red'>" . $_SESSION['error_message'] . "</h4><br>";
            $_SESSION['error_message'] = null;
        } 

?>

    <h1 class="edit_h1">Edit profile</h1>
    <hr class="hr">


    <form method="POST" style=" background-color: rgba(240, 255, 240, 0.5)" action="../../../index.php">
        <label for="edit_name">Name:</label><br>
        <input type="text" name="edit_name" id="edit_name" value="<?= $name ?>"><br><br>

        <label for="edit_surname">Surname:</label><br>
        <input type="text" name="edit_surname" id="edit_surname" value="<?= $surname ?>"><br><br>

        <label for="edit_email">Email:</label><br>
        <input type="text" name="edit_email" id="edit_email" value="<?= $email ?>"><br><br>

        <label for="edit_phone">Phone number:</label><br>
        <input type="text" name="edit_phone" id="edit_phone" value="<?= $phone ?>"><br><br>

        <label for="edit_city">City:</label><br>
        <input type="text" name="edit_city" id="edit_city" value="<?= $city ?>"><br><br>

        <label for="edit_password">Edit password:</label><br>
        <input type="edit_password" name="edit_password" id="edit_password" placeholder="Enter the new credentials"><br><br>

        <input type="submit" name="edit_button" value="Edit" class="submit_btn">
    </form>

    <div style="display: flex; justify-content: center; align-items: center; height: 15vh;">
            <a href="../home.php"><button style=" width: 100%; padding: 10px;padding-right: 50px;
                    padding-left: 50px; background-color: #297fb1;
                    color: white; border: none; margin-top: 5px; border-radius: 20px;">Back</button></a>
        </div>

    <?php } else { ?>
        
        <h1 class="edit_h1">Login to your profile first</h1>

    <?php } ?>

<?php require_once '../includes/footer.php'; ?>
