<?php

class FormValidator extends Db {
    private $data;
    private $errors = [];
    private static $fields = ['product_sku', 'product_name', 'product_price', 'product_type', 'product_descr', 'product_descr2', 'product_descr3'];

    public function __construct($postData) {
        $this->data = $postData;
    }

    public function validateForm(){
        foreach(self::$fields as $field){
            if(!array_key_exists($field, $this->data)){
                trigger_error('$field is required!');
                return;
            }
        }

        $this->validateSku();
        $this->validateName();
        $this->validatePrice();
        $this->validateType();
        return $this->errors;
    }

    private function validateSku() {
        $val = trim($this->data['product_sku']);

        $sql =  "SELECT * FROM product_list WHERE product_sku='$val'";
        $result  = $this->connect()->query($sql);
        $count = $result->rowCount();


        if(empty($val)){
            $this->addError('product_sku', '*Add a SKU value.');
        } else if (strlen($val) < 3) {
            $this->addError('product_sku', '*Too short! Use at least 3 characters.');
        } else if (strlen($val) > 11) {
            $this->addError('product_sku', '*Too long! the max is 11 characters.');
        } else if (!preg_match('/^[a-zA-Z0-9]{1,11}$/', $val)) {
            $this->addError('product_sku', '*Must use only numbers and letters.');
        } else if ($count > 0){
            $this->addError('product_sku', '*This SKU already exists.');
        }
    }

    private function validateName() {
        $val = $this->data['product_name'];
        
        if(empty($val)){
            $this->addError('product_name', '*Add a Name value.');
        } else if (strlen($val) < 3) {
            $this->addError('product_name', '*Too short! Use at least 3 characters.');
        } else if (strlen($val) > 40) {
            $this->addError('product_name', '*Too long! the max is 40 characters.');
        } else if (!preg_match('/^[a-zA-Z0-9\_ -]{2,40}$/', $val)) {
            $this->addError('product_name', '*Must use only numbers and letters.');
        }
    }

    private function validatePrice() {
        $val = trim($this->data['product_price']);

        if(empty($val)){
            $this->addError('product_price', '*Add a price value.');
        } else if (!preg_match('/^(0|[1-9]\d*)(\.\d{1,2})?$/', $val)) {
            $this->addError('product_price', '*Add a price value in a valid format.');
        }
    }

    private function validateType() {
        $val = $this->data['product_type'];

        if(empty($val)){
            $this->addError('product_type', '*Choose a Product type.');
        } else {
            $this->validateDescr();
            $this->validateDescr2();
            $this->validateDescr3();
        }
    }

    private function validateDescr() {
        $val = trim($this->data['product_descr']);

        if(empty($val)){
            $this->addError('product_descr', '*Add a description value.');
        } else if (!preg_match('/^(0|[1-9]\d*)(\.\d{1,3})?$/', $val)) {
            $this->addError('product_descr', '*Add a description value in the right format.');
        }
    }

    private function validateDescr2() {
        $val = trim($this->data['product_descr2']);
        $val2 = $this->data['product_type'];

        if ($val2 == "Furniture") {
            if(empty($val)){
                $this->addError('product_descr2', '*Add a description value.');
            } else if (!preg_match('/^(0|[1-9]\d*)(\.\d{1,3)?$/', $val)) {
                $this->addError('product_descr2', '*Add a description value in the right format.');
            }
        }            
    }

    private function validateDescr3() {
        $val = trim($this->data['product_descr3']);
        $val2 = $this->data['product_type'];

        if ($val2 == "Furniture") {
            if(empty($val)){
                $this->addError('product_descr3', '*Add a description value.');
            } else if (!preg_match('/^(0|[1-9]\d*)(\.\d{1,3})?$/', $val)) {
                $this->addError('product_descr3', '*Add a description value in the right format.');
            }
        }
    }

    private function addError($key, $val) {
        $this->errors[$key] = $val;
    }

}
