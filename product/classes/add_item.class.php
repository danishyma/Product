<?php

class AddItem extends Db {

    public function addItem() {

        $product_sku = $_POST['product_sku'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_type = $_POST['product_type'];
        $product_descr = $_POST['product_descr'];
        $product_descr2 = $_POST['product_descr2'];
        $product_descr3 = $_POST['product_descr3'];

        $descr = (object) [
            'DVD-Disc' =>  'Size: ' . $product_descr .' MB',
            'Book' => 'Weight: ' . $product_descr .'KG',
            'Furniture' => 'Dimension: ' . $product_descr .'x'. $product_descr2 .'x'. $product_descr3,
        ];

        $product_descr = $descr->$product_type; 

        $sql = "INSERT INTO product_list (product_sku, product_name, product_price, product_type, product_descr) VALUES ('$product_sku', '$product_name', '$product_price', '$product_type', '$product_descr')";
        $result  = $this->connect()->query($sql);

        $result = null;
        exit;
    }
}
