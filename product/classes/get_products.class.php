<?php

class Products extends Db {

    public function getProducts() {
        $sql = "SELECT * FROM product_list";
        $result = $this->connect()->query($sql);
        
        if ($result->rowCount() > 0){
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        }

    }
}