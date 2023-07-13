<?php

    class Product {

        private $user_id;
        private $publication_date;
        private $images;
        private $title;
        private $description;

        private $upload_dierectory;

        // create item
        public function create() {

            $this->user_id = $_SESSION['user_id'];
            $this->publication_date = $_POST['publication_date'];
            $this->title = $_POST['title'];
            $this->description = $_POST['description'];


            $this->upload_dierectory = __DIR__ . '../../Images/';

            $create = true;

            $conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);

            if($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
            }

            $item = "SELECT * FROM items WHERE title='$this->title'";
            $validate_item = $conn->query($item);

            if($validate_item->num_rows > 0) {
                $create = false;
            } else {

                $sql = "INSERT INTO items (user_id, publication_date, title, description) 
                        VALUES ('$this->user_id', '$this->publication_date', '$this->title', '$this->description')";

                if($conn->query($sql) == true) {
                    
                    $item_id = $conn->insert_id;
                    
                    if(isset($_FILES['images']) && is_array($_FILES['images']['name'])) {
                        
                        $this->images = $_FILES['images'];
    
                        for($i = 0; $i < count($this->images['name']); $i++) {
    
                            $img_name = $this->images['name'][$i];

                            $tmp_name = $this->images['tmp_name'][$i];
                            $error = $this->images['error'][$i];

                            if($error == 0) {

                                $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
                                $img_ext_to_lower = strtolower($img_ext);

                                $allowed_ext = array('jpg', 'jpeg', 'png');

                                if(in_array($img_ext_to_lower, $allowed_ext)) {

                                    $img_u_name = uniqid('IMG-', true) . '.' . $img_ext_to_lower;

                                    $img_upload_path = $this->upload_dierectory . $img_u_name;

                                    $insert_images = "UPDATE items SET images = CONCAT(IFNULL(images, ''), '$img_u_name,') WHERE id = $item_id";
                                    if(!$conn->query($insert_images)) {
                                        return $create;
                                    }
                                    
                                    move_uploaded_file($tmp_name, $img_upload_path);

                                } else {
                                    $create = false;
                                }

                            } else {
                                $create = false;
                            }
                        }
                    }
                }
            }
            
            $conn->close();
            return $create;
        }


        // edit item
        public function edit() {

            $this->publication_date = $_POST['edit_publication_date'];
            $this->title = $_POST['edit_title'];
            $this->description = $_POST['edit_description'];
            $item_id = $_SESSION['item_id'];


            $edit = true;
            $this->upload_dierectory = __DIR__ . '../../Images/';
            $conn = new mysqli(HOST, USERNAME, PASSWORD, DBNAME);

            if($conn->connect_error) {
                die('Connection failed: ' . $conn->connect_error);
            }


            $edit_item = "UPDATE items SET publication_date='$this->publication_date', title='$this->title', description='$this->description' WHERE id = $item_id";

            if(!$conn->query($edit_item)) {
                $edit = false;
            }
            

            if(isset($_FILES['edit_images']) && is_array($_FILES['edit_images']['name'])) {
                        
                $this->images = $_FILES['edit_images'];

                for($i = 0; $i < count($this->images['name']); $i++) {

                    $img_name = $this->images['name'][$i];

                    $tmp_name = $this->images['tmp_name'][$i];

                    $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ext_to_lower = strtolower($img_ext);

                    $allowed_ext = array('jpg', 'jpeg', 'png');

                    if(in_array($img_ext_to_lower, $allowed_ext)) {

                        $img_u_name = uniqid('IMG-', true) . '.' . $img_ext_to_lower;

                        $img_upload_path = $this->upload_dierectory . $img_u_name;

                        if(!file_exists($img_upload_path)) {

                            $insert_images = "UPDATE items SET images = CONCAT(IFNULL(images, ''), '$img_u_name,') WHERE id = $item_id";
                            if(!$conn->query($insert_images)) {
                                $edit = false;
                            }
                                
                            move_uploaded_file($tmp_name, $img_upload_path);
                        }
                    }
                }
            }

            $conn->close();
            return $edit;
        }
    }
?>