<?php

class ViewProduct extends Products {

    public function showProducts() {
        $datas = $this->getProducts();
        if ($datas > 0) {
            foreach($datas as $data) {
                $name = $data['product_sku'];

                echo '<div class="product-wrapper"> 
                <input type="checkbox" name="checkbox[]" value='.$name.'>
                <p class="pr-sku">'.$data['product_sku'].'</p>
                <p class="pr-name">'.$data['product_name'].'</p>
                <p class="pr-price">'.$data['product_price']." $".'</p>
                <p class="pr-descr">'.$data['product_descr'].'</p>
                </div>';
            }
        }
    }
}