<?php

    include '../classes/db.class.php';
    include '../classes/add_item.class.php';
    include '../classes/form_validator.class.php';

    if(isset($_POST['submit'])){
        $product_sku = $_POST['product_sku'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_type = $_POST['product_type'];
        $product_descr = $_POST['product_descr'];
        $product_descr2 = $_POST['product_descr2'];
        $product_descr3 = $_POST['product_descr3'];

        $postData = [
            'product_sku' => $product_sku, 
            'product_name' => $product_name,  
            'product_price' => $product_price, 
            'product_type' => $product_type,
            'product_descr' => $product_descr, 
            'product_descr2' => $product_descr2, 
            'product_descr3' => $product_descr3
        ];

        $validation = new FormValidator($postData);
        $errors = $validation->validateForm();

        if (!empty($errors)) {

            // with errors return error messages to main.js
            foreach($errors as $key => $value){
                echo  $key .':' , $value .',';
            }
            return json_encode(array($errors));
            exit;

        } else if ((empty($errors))) {
            
            // no errors add item do DB
            $add = new AddItem();
            $add->addItem();
            print_r($errors);
            exit;

        };
        
    }