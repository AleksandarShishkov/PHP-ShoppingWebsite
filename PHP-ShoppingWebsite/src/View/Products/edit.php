<?php 

require_once '../includes/header.php';
require_once '../../config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    if(isset($_SESSION['user_id'])) {

        $item_id = $_GET['id'];
        $_SESSION['item_id'] = $item_id;
    
        $conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);
    
        if($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }
    
        $find_item = "SELECT * FROM items WHERE id = $item_id";
        $item = $conn->query($find_item);
    
        if($item->num_rows > 0) {
            $record = $item->fetch_assoc();
    
            $user_id = $record['user_id'];
            $publication_date = $record['publication_date'];
            $images = $record['images'];
            $title = $record['title'];
            $desription = $record['description'];
    
    
        } else {
            $_SESSION['error_message'] = 'No item located. Try again.';
            header('Location: http://localhost/indeavr_website/src/View/Products/index.php');
        }
    
        if(!empty($_SESSION['success_message'])) {
            echo "<h4 style='color: green'>" . $_SESSION['success_message'] . "</h4><br>";
            $_SESSION['success_message'] = null;
        } elseif(!empty($_SESSION['error_message'])) {
            echo "<h4 style='color: red'>" . $_SESSION['error_message'] . "</h4><br>";
            $_SESSION['error_message'] = null;
        } 



?>

<h1 class="product_h1" style="margin-bottom: 100px;">Edit item:</h1>


<div class="product_div" style="margin-bottom: 100px;;">
    <form method="POST" action="../../../index.php" enctype="multipart/form-data">
        
        <label for="edit_publication_date">Publication date:</label><br>
        <input type="date" name="edit_publication_date" id="edit_publication_date" value="<?= $publication_date ?>"><br><br>

        <div class="mb-3">
            <label for="edit_images" class="form-label">Update the images:</label><br>
            <input class="form-control" type="file" id="edit_images" name="edit_images[]" multiple>

            <div class="image-item">
            <?php $images = explode(',', $record['images']);

            foreach ($images as $image) { ?>
                <img src="../../Images/<?php echo $image; ?>" alt="<?php echo $image; ?>" >
            <?php } ?>
                    
            </div>
        </div>

        <label for="edit_title">Title:</label><br>
        <input type="text" name="edit_title" id="edit_title" value="<?= $record['title'] ?>"><br><br>

        <label for="edit_description">Description:</label><br>
        <input type="text" name="edit_description" id="edit_description" value="<?= $record['description'] ?>"><br><br>

        <input type="submit" style=" margin-top: 5px; display: block; width: 100%; padding: 10px; background-color: #4CAF50; color: white;
                            border: none; border-radius: 20px;" name="edit_product_button" value="Edit">

        <!-- <a href="../Products/index.php"><button style="display: block; width: 100%; padding: 10px; background-color: #297fb1; color: white; border: none;
                        margin-top: 5px; border-radius: 20px;">Back</button></a> -->
    </form>

</div>
<div style="display: flex; justify-content: center; align-items: center; height: 15vh;">
    <a href="../Products/index.php"><button style=" width: 100%; padding: 10px;padding-right: 50px;
            padding-left: 50px; background-color: #297fb1;
            color: white; border: none; margin-top: 5px; border-radius: 20px;">Back</button></a>
</div>


<?php } else { ?>

    <h1 style="display: flex; justify-content: center; align-items: center; height: 15vh; color:blanchedalmond;">Login to your profile first!</h1>
<?php } ?>



<?php require_once '../includes/footer.php'; ?>