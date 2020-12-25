<?php

class DeleteItem extends Db {

    public function delItem() {

        if(!empty($_POST['checkbox'])) {

            foreach($_POST['checkbox'] as $selected) {
                
                $sql = "DELETE FROM product_list WHERE product_sku='".$selected."'";
                $result  = $this->connect()->query($sql);

                header("Location: ../product/list?delete=sucess");
        
                $result = null;
            }
        } else {
            header("Location: ../product/list?delete=empty");
        }
    }

}