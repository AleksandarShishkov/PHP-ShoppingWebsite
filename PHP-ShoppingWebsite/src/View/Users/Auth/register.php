<?php require_once "../../includes/header.php"; 

?>


    <h1 style="display: flex; justify-content: center; align-items: center; height: 15vh; color:darkslategray;">Register</h1>
    <hr style="border-color: white; border-width: 5px">
    
        <form method="POST" style="border: 1px solid #000000; background-color:rgba(240, 255, 240, 0.5); padding: 20px; width: 300px; margin: 0 auto;" action="../../../../index.php">
            <label for="name">Name:</label><br>
            <input style="text-align: center;" type="text" name="name" id="name" required><br><br>

            <label for="surname">Surname:</label><br>
            <input style="text-align: center;" type="text" name="surname" id="surname" required><br><br>

            <label for="email">Email:</label><br>
            <input style="text-align: center;" type="text" name="email" id="email" required><br><br>

            <label for="phone">Phone number:</label><br>
            <input style="text-align: center;" type="text" name="phone" id="phone" requried><br><br>

            <label for="city">City:</label><br>
            <input style="text-align: center;" type="text" name="city" id="city" required><br><br>

            <label for="password">Password:</label><br>
            <input style="text-align: center;" type="password" name="password" id="password" requried><br><br>

            <input style=" margin-top: 5px; display: block; width: 100%; padding: 10px; background-color: #4CAF50; color: white;
                            border: none; border-radius: 20px;" type="submit" name="register_button" value="Register">
        </form>
        <div style="display: flex; justify-content: center; align-items: center; height: 15vh;">
            <a href="../../home.php"><button style=" width: 100%; padding: 10px;padding-right: 50px;
                    padding-left: 50px; background-color: #297fb1;
                    color: white; border: none; margin-top: 5px; border-radius: 20px;">Back</button></a>
        </div>

<?php require_once "../../includes/footer.php"; ?>