<?php
require_once  $homedir.'/pizzeria2/models/db.php';
class BuonAppetitoModel{
    private $conn;
    public $items;
    public function __construct(){
        $this->conn = new DB();
        $this->loadItems();
    }

    public function loadItems($take=8){
        $this->items = $this->conn->getRows('pizze',array('limit'=>$take));
    }
}
