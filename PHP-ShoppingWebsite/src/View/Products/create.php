<?php require_once '../includes/header.php'; ?>

<?php if(isset($_SESSION['user_id'])) {?>

<h1 style="display: flex; justify-content: center; align-items: center; margin-bottom: 100px; margin-top: 50px; color:darkslategray;">Create new product:</h1>

<div class="product_div">
    <form method="POST" style="border: 1px solid #000000; background-color:rgba(240, 255, 240, 0.5); padding: 20px; width: 300px; margin: 0 auto;" action="../../../index.php" enctype="multipart/form-data">
        
        <label for="publication_date">Publication date:</label>
        <input type="date" name="publication_date" id="publication_date" required><br><br>

        <div class="mb-3">
            <label for="images" class="form-label">Images:</label>
            <input class="form-control" type="file" id="images" name="images[]" multiple required>
        </div>

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br><br>

        <label for="description">Description:</label>
        <input type="text" name="description" id="description" requried><br><br>

        <input type="submit" style=" margin-top: 5px; display: block; width: 100%; padding: 10px; background-color: #4CAF50; color: white;
                            border: none; border-radius: 20px;" name="create_product_button" value="Create">
    </form>
</div>
<div style="display: flex; justify-content: center; align-items: center; height: 30vh;">
    <a href="../Products/index.php"><button style=" width: 100%; padding: 10px;padding-right: 50px;
            padding-left: 50px; background-color: #297fb1;
            color: white; border: none; margin-top: 5px; border-radius: 20px;">Back</button></a>
</div>

<?php } else { ?>
    <h1 style="display: flex; justify-content: center; align-items: center; height: 15vh; color:blanchedalmond;">Login to your profile first!</h1>
<?php } ?>

<?php require_once '../includes/footer.php'; ?>