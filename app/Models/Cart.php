<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart {

    private $contents;
    private $totalQty;
    private $totalPrice;

    public function __construct($oldCart) {

        if($oldCart) {
            $this->contents = $oldCart->contents;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;

        }
    }

    public function getContents() {
        return $this->contents;

    }

    public function addProduct($product, $image, $qty) {


        $products = ['qty' => 0, 'price' => $product->price, 'product' => $product, 'image' => $image];

        if($this->contents) {
            if(array_key_exists($product->title, $this->contents)) {
                $products = $this->contents[$product->title];

            }
        }

        $products['image'] = $image;
        $products['qty'] += $qty;
        $products['price'] = $product->price * $products['qty'];
        $this->contents[$product->name] = $products;
        $this->totalQty+= $qty;
        $this->totalPrice += $product->price;
    }

    public function updateProduct($product, $qty) {

        if($this->contents) {

            if(array_key_exists($product->name, $this->contents)) {

                $products = $this->contents[$product->name];
             
            }
        }


        $this->totalQty -= $products['qty']; 
        $this->totalPrice -= $products['price'];
        $products['qty'] = $qty;
        $products['price'] = $product->price * $qty;
        $this->totalPrice += $products['price']; 
        $this->totalQty += $qty;
        $this->contents[$product->name] = $products;
    }

    public function removeProduct($product) {

        if($this->contents) {

            if(array_key_exists($product->name, $this->contents)) {

                $rProduct = $this->contents[$product->name];
                $this->totalQty -= $rProduct['qty']; 
                $this->totalPrice -= $rProduct['price'];
                array_forget($this->contents, $product->name);

            }
 
        }
    }

    public function getTotalQty() {

        return $this->totalQty;
    }

    public function getTotalPrice() {

        return $this->totalPrice;
    }

    public function countProduct() {
        return count($this->contents);
    }

}