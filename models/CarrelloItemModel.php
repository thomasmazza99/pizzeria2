<?php
// 'cart item' object
class CarrelloItemModel{

    public $product_id;
    public $quantity;
    public $user_id;
    public $tipo;
    public $img;
    public $titolo;
    public $prezzo;
    public $grandezza;
    // constructor
    public function __construct(){
        
    }
    public function getTotale(){
        $totale=$this->prezzo * $this->quantity;
        return $totale;
    }

}