<?php
require_once  $homedir.'/pizzeria2/models/db.php';
require_once  $homedir.'/pizzeria2/models/ProdottoModel.php';
require_once  $homedir.'/pizzeria2/models/ProdottiModel.php';
require_once  $homedir.'/pizzeria2/models/CarrelloItemModel.php';
class CarrelloModel{
 
    // database connection and table name
    private $conn;

    public $items;
 
    // constructor
    public function __construct(){
        $this->conn = new DB();
        $this->items=array();
    }
    public function add($product_id, $quantity, $tipo){
        $prodottiModel=new ProdottiModel();
        $prodotto=$prodottiModel->getProdotto($product_id,$tipo);
        $item=$this->getItem($product_id,$tipo);
        if($item==null){
            $item=new CarrelloItemModel();
            $item->product_id = $product_id;
            $item->quantity = $quantity;
            $item->tipo = $tipo;
            $item->img=$prodotto->img;
            $item->titolo=$prodotto->titolo;
            $item->prezzo=$prodotto->prezzo;
            array_push($this->items,$item);
        }
        else{
            $item->quantity++;
        }
    }

    public function aggiorna($product_id, $quantity, $tipo){
        $item=$this->getItem($product_id,$tipo);  
        if($item!=null){
            $item->quantity=$quantity;
        }
    }
    public function delete($product_id, $tipo){
        foreach($this->items as $index => $element) {
            $item=$this->items[$index];
            if($item->product_id==$product_id && $item->tipo==$tipo)
            {
                 array_splice($this->items,$index,1);
            }
        }
    }

    public function getTotale(){
        $somma=0;
        foreach($this->items as $index => $element) {
            $item=$this->items[$index];
            $somma=$somma+((float)$item->prezzo*$item->quantity);
        }
        return $somma;
    }

    public function getItem($product_id,$tipo){
        foreach($this->items as $index => $element) {
            $item=$this->items[$index];
            if($item->product_id==$product_id && $item->tipo==$tipo)
            {
                 return $item;
            }
        }
        return null;
    }
    
}