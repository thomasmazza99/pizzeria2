<?php
require_once  $homedir.'/pizzeria2/models/db.php';
require_once  $homedir.'/pizzeria2/models/ProdottoModel.php';
require_once  $homedir.'/pizzeria2/models/ProdottiModel.php';
require_once  $homedir.'/pizzeria2/models/CarrelloItemModel.php';
class OrdiniModel{
 
    public function createOrder($user,$prodotti){
        $this->conn = new DB();
        $data = array(
                'data' => date('Y-m-d H:i:s'),
                'username' => $user->username,
                'nome_cognome_cliente'=>$user->email,
                'telefono'=>''
            );
        $ordineId=$this->conn->insert('ordine',$data);
        if($ordineId){
            foreach($prodotti as $index => $element) {
                $item=$prodotti[$index];
                if($item->tipo=='pizze'){
                    $data=array(
                        'id_pizza'=>$item->product_id,
                        'id_ordine'=>$ordineId
                    );
                    $okInsert=$this->conn->insert('pizze_ordini',$data);
                }
                if($item->tipo=='panini'){
                    $data=array(
                        'id_panini'=>$item->product_id,
                        'id_ordine'=>$ordineId
                    );
                    $okInsert=$this->conn->insert('panini_ordini',$data);
                }
                if($item->tipo=='insalate'){
                    $data=array(
                        'id_insalate'=>$item->product_id,
                        'id_ordine'=>$ordineId
                    );
                    $okInsert=$this->conn->insert('insalate_ordine',$data);
                }
                if($item->tipo=='bibite'){
                    $data=array(
                        'id_bibite'=>$item->product_id,
                        'id_ordine'=>$ordineId
                    );
                    $okInsert=$this->conn->insert('bibite_ordini',$data);
                }
            }
        }
    }

    public function getOrdini($user){
        $this->conn = new DB();
       $prodotti=array();
        $conditions['where'] = array(
            'username' => $user->username,
        );
        $ordiniRows = $this->conn->getRows('ordini',$conditions);
        foreach ($ordiniRows as $index => $element) {
            $conditions['where'] = array(
                'id_ordine' =>$ordiniRows[$index]['id'],
            );
            $pizze_ordini_rows = $this->conn->getRows('pizze_ordini',$conditions);
            foreach ($pizze_ordini_rows as $index => $element) {
                $conditions['where'] = array(
                    'id' =>$pizze_ordini_rows[$index]['id_pizza'],
                );
                $conditions['return_type'] = 'single';
                $pizze_row = $this->conn->getRows('pizze',$conditions);
                array_push($this->prodotti,new ProdottoModel($pizze_row,'pizza'));
            }
        }
    }
}