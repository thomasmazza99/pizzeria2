<?php
require_once  $homedir.'/pizzeria2/models/db.php';
require_once  $homedir.'/pizzeria2/models/ProdottoModel.php';
require_once  $homedir.'/pizzeria2/models/ProdottiModel.php';
require_once  $homedir.'/pizzeria2/models/CarrelloItemModel.php';
class CarrelloModel{
 
    // database connection and table name
    private $conn;
    private $aumentoGrandezza = 2;
    public $items;
    public $ritiro = true;
 
    // constructor
    public function __construct($ritiro){
        $this->conn = new DB();
        $this->items=array();
        $this->ritiro=$ritiro;
    }
    public function add($product_id, $quantity, $tipo, $grandezza=''){
        $prodottiModel=new ProdottiModel();
        $prodotto=$prodottiModel->getProdotto($product_id,$tipo);
        $item=$this->getItem($product_id,$tipo, $grandezza);
        if($item==null){
            $item=new CarrelloItemModel();
            $item->product_id = $product_id;
            $item->quantity = $quantity;
            $item->tipo = $tipo;
            $item->img=$prodotto->img;
            $item->titolo=$prodotto->titolo;            
            if($grandezza && $grandezza=="doppioimpasto"){
                $item->prezzo=$prodotto->prezzo + $this->aumentoGrandezza;
                $item->grandezza=$grandezza;
            }else{
                $item->prezzo=$prodotto->prezzo;

            }
            array_push($this->items,$item);
        }
        else{
            $item->quantity++;

        }
    }

    public function aggiorna($product_id, $quantity, $tipo, $grandezza = ''){
        $item=$this->getItem($product_id,$tipo,$grandezza);  
        if($item!=null){
            $item->quantity=$quantity;
        }
    }
    public function delete($product_id, $tipo, $grandezza = ''){
        foreach($this->items as $index => $element) {
            $item=$this->items[$index];
            if($item->product_id==$product_id && $item->tipo==$tipo && $item->grandezza==$grandezza)
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

    public function getItem($product_id,$tipo, $grandezza=''){
        foreach($this->items as $index => $element) {
            $item=$this->items[$index];
            if($item->product_id==$product_id && $item->tipo==$tipo && $item->grandezza==$grandezza)
            {
                 return $item;
            }
        }
        return null;
    }
    public function createOrder($user){
        $this->conn = new DB();
        $data = array(
                'data' => date('Y-m-d H:i:s'),
                'username' => $user->username,
                'nome_cognome_cliente'=>$user->email,
                'telefono'=>''
            );
        $ordineId=$this->conn->insert('ordine',$data);
        if($ordineId){
            foreach($this->items as $index => $element) {
                $item=$this->items[$index];
                if($item->tipo=='pizze'){
                    $pizze_ordini=array(
                        'id_pizza'=>$item->product_id,
                        'id_ordine'=>$ordineId
                    );
                    $this->conn->insert('pizze_ordini',$pizze_ordini);
                }
            }
        }
    }
}