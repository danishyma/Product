<?php

class AddItem extends Db {

    public function addItem() {

        $product_sku = $_POST['product_sku'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_type = $_POST['product_type'];

        function description($stmt) {
            switch ($stmt) {       
                case ("DVD-Disc"):
                    $result = 'Size: ' . $_POST['product_descr'] .' MB';
                    return $result;
                    break;
                case ("Book"):
                    $result = 'Weight: ' . $_POST['product_descr'] .'KG';
                    return $result;
                    break;
        
                case ("Furniture"):
                    $result = 'Dimension: ' . $_POST['product_descr'] .'x'. $_POST['product_descr2'] .'x'. $_POST['product_descr3'];
                    return $result;
                    break;
            }
        }
        
        $product_descr = description($product_type); 

        $sql = "INSERT INTO product_list (product_sku, product_name, product_price, product_type, product_descr) VALUES ('$product_sku', '$product_name', '$product_price', '$product_type', '$product_descr')";
        $result  = $this->connect()->query($sql);

        $result = null;
        exit;
    }
}