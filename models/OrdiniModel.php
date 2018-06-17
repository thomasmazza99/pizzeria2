<?php
require_once  $homedir.'/pizzeria2/models/db.php';
require_once  $homedir.'/pizzeria2/models/ProdottoModel.php';
require_once  $homedir.'/pizzeria2/models/ProdottiModel.php';
require_once  $homedir.'/pizzeria2/models/CarrelloItemModel.php';
class CarrelloModel{
 
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
                    $pizze_ordini=array(
                        'id_pizza'=>$item->product_id,
                        'id_ordine'=>$ordineId
                    );
                    $this->conn->insert('pizze_ordini',$pizze_ordini);
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