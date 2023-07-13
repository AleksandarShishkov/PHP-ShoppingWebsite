<?php

require_once '../../config.php';
require_once '../includes/header.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    if(isset($_SESSION['user_id'])) {

        $item_id = $_GET['id'];
    
        $conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);
    
        if($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }
    
        $delete_item = "DELETE FROM items WHERE id = $item_id";
        $images = $conn->query("SELECT images FROM items WHERE id = $item_id")->fetch_assoc()['images'];
        if ($images) {
            
            $image_names = explode(',', $images);
            foreach ($image_names as $image_name) {
                $image_path = '../../Images/' . $image_name;
                
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

        }
        if($conn->query($delete_item) === true) {
            $_SESSION['success_message'] = "The item has been deleted successfully!";
            $conn->close();
            header("Location: http://localhost/indeavr_website/src/View/Products/index.php");
        } else {
            $_SESSION['error_message'] = "There was an issue. Try again!";
            $conn->close();
            header("Location: http://localhost/indeavr_website/src/View/Products/index.php");
        }
        
    } else {

?>

<h1 style="display: flex; justify-content: center; align-items: center; height: 15vh; color:blanchedalmond;">Login to your profile first!</h1>

    <div style="display: flex; justify-content: center; align-items: center;">
    <a href="../home.php"><button style=" width: 100%; padding: 10px;padding-right: 50px;
            padding-left: 50px; background-color: #297fb1;
            color: white; border: none; border-radius: 20px;">Back</button></a>
    </div>

<?php } 

require_once '../includes/footer.php'; ?>