<?php

require_once '../../config.php';
require_once '../includes/header.php';

    if(isset($_SESSION['user_id'])) {

        $item_id = $_GET['id'];
    
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
            $description = $record['description'];
    
            $find_user = "SELECT * FROM users WHERE id = $user_id";
            $user = $conn->query($find_user);
    
            if($user->num_rows > 0) {
                $record_user = $user->fetch_assoc();
    
                $user_name = $record_user['name'];
                $user_surname = $record_user['surname'];
                $user_email = $record_user['email'];
                $user_phone = $record_user['phone'];
                $user_city = $record_user['city'];
    
            } else {
                $_SESSION['error_message'] = 'No seller located. Try again.';
                header('Location: http://localhost/PHP-ShoppingWebsite/src/View/Products/index.php');
            }
    
    
        } else {
            $_SESSION['error_message'] = 'No item located. Try again.';
            header('Location: http://localhost/PHP-ShoppingWebsite/src/View/Products/index.php');
        }

?>

<div>
    <h1 class="product_h1">'<?= $title ?>':</h1><br>
</div>


<div>
    <table>
        <thead>
            <tr>
                <th>Publication date</th>
                <th>Images</th>
                <th>Title</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $publication_date ?></td>
                <td>
                    <div class="image-gallery">
                        <?php
                        $images = explode(',', $images);
                        foreach ($images as $image) { ?>
                            <div class="image-item">
                                <img class="zoomable-image" src="../../Images/<?php echo $image; ?>" alt="<?php echo $image; ?>">
                            </div>
                        <?php } ?>
                    </div>
                </td>
                <td><?= $title ?></td>
                <td><?= $description ?></td>
            </tr> 
        </tbody>
    </table>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        var zoomableImages = document.getElementsByClassName('zoomable-image');
        for (var i = 0; i < zoomableImages.length; i++) {
            zoomableImages[i].addEventListener('click', function() {
                this.classList.toggle('zoomed');
            });
        }
    });

</script>

<br><br>
<hr class="hr">
<div>
    <h3 class="product_h2">Seller details:</h3><br>
</div>


<div>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Available</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $user_name ?></td>
                <td><?= $user_surname ?></td>
                <td><?= $user_email ?></td>
                <td><?= $user_phone ?></td>
                <td><?= $user_city ?></td>
                <td>Monday - Friday</td>
            </tr> 
        </tbody>
    </table>
</div>



<div style="display: flex; justify-content: center; align-items: center; height: 15vh;">
    <a href="../Products/index.php"><button style=" width: 100%; padding: 10px;padding-right: 50px;
            padding-left: 50px; background-color: #297fb1;
            color: white; border: none; margin-top: 5px; border-radius: 20px;">Back</button></a>
</div>


<?php } else { ?>
    <h1 style="display: flex; justify-content: center; align-items: center; height: 15vh; color:blanchedalmond;">Login to your profile first!</h1>
<?php } ?>

<?php require_once "../includes/footer.php"; ?>
