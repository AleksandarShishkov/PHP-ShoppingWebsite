<?php require_once '../includes/header.php'; 
      require_once '../../config.php';
      
      if (session_status() === PHP_SESSION_NONE) {
          session_start();
      }
?>


<?php if(isset($_SESSION['user_id'])) {?>

<h1 class="product_h1">Products</h1>

<div class="session_messages">
<?php  

    if(!empty($_SESSION['success_message'])) {
        echo "<h4 style='color: green'>" . $_SESSION['success_message'] . "</h4><br>";
        $_SESSION['success_message'] = null;
    } elseif(!empty($_SESSION['error_message'])) {
        echo "<h4 style='color: red'>" . $_SESSION['error_message'] . "</h4><br>";
        $_SESSION['error_message'] = null;
    } else {
        echo "<h4>Browse through the products!</h4><br>";
    }

    $conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);

    if($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $find_items = "SELECT * FROM items ORDER BY id ASC";
    $items = $conn->query($find_items);

?>

</div>

<a style="display: flex; justify-content: center; border: none; align-items: center; text-decoration: none; border-radius: 20px;" href="create.php"><button class="new_product_btn">Create new product:</button></a>

<div>
    <h2 class="product_h2">Available products:</h2><br>
</div>


<div>
    <?php if($items->num_rows > 0) { ?>
        <table>
            <thead>
                <tr>
                    <th>Publication date</th>
                    <th>Images</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                    <?php while($item = $items->fetch_assoc()) {?>                
                    <tr>
                        <td><?= $item['publication_date'] ?></td>
                        <td>
                            <div class="image-gallery">
                                <?php
                                    $images = explode(',', $item['images']);

                                    foreach ($images as $image) { ?>

                                        <div class="image-item">
                                            <img src="../../Images/<?php echo $image; ?>" alt="<?php echo $image; ?>" >
                                        </div>
                                <?php } ?>
                            </div>
                        </td>
                        <td><?= $item['title'] ?></td>
                        <td><?= $item['description'] ?></td>
                        <td>
                            <div class="index_product_buttons">
                                <a href="show.php?id=<?=$item['id']?>"><button style="border-radius: 20px; background-color: #297fb1; color: white;">Show</button></a>
                                <a href="edit.php?id=<?=$item['id']?>"><button style="border-radius: 20px; background-color: #297fb1; color: white;">Edit</button></a>
                                <a href="delete.php?id=<?=$item['id']?>"><button style="border-radius: 20px; background-color: #297fb1; color: white;">Delete</button></a>
                            </div>
                        </td>
                    </tr>
        <?php } 
    } else { ?>
        <tr>
            <td colspan="5"><h4 style="color:cornflowerblue;">No products listed yet.</h4></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>


<div style="display: flex; justify-content: center; align-items: center; height: 15vh;">
        <a href="../home.php"><button style=" width: 100%; padding: 10px;padding-right: 50px;
                padding-left: 50px; background-color: #297fb1;
                color: white; border: none; margin-top: 5px; border-radius: 20px;">Back</button></a>
</div>

<?php } else { ?>
    <h1 style="display: flex; justify-content: center; align-items: center; height: 15vh; color:blanchedalmond;">Login to your profile first!</h1>

<?php } ?>

<?php require_once "../includes/footer.php"; ?>