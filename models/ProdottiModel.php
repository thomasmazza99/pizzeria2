<?php
require_once  $homedir.'/pizzeria2/models/db.php';
require_once  $homedir.'/pizzeria2/models/ProdottoModel.php';
class ProdottiModel{
    private $conn;
    public $prodotti=array();
    public function __construct(){
        $this->conn = new DB();
    }

    public function getProdotti($start=0,$limit=9,$conditions=array('tipo'=>'pizze')){
        $sqlConditions=array('limit'=>$limit,'start'=>$start);
        if(array_key_exists("tipo",$conditions)){
            $tipo =$conditions['tipo'];
        }
        $rows = $this->conn->getRows($tipo,array('limit'=>$limit,'start'=>$start));
        foreach ($rows as $index => $element) {
            array_push($this->prodotti,new ProdottoModel($rows[$index],$tipo));
        }
        return $this->prodotti;
    }
    public function getProdotto($id,$tipo){
        $conditions['where'] = array(
            'id' => $_GET['id'],
        );
        $conditions['return_type'] = 'single';
        $row = $this->conn->getRows($tipo,$conditions);
        return new ProdottoModel($row,$tipo);
    }
    public function countPizze($conditions=array()){
        $sqlConditions=array('return_type'=>'count');
        if(array_key_exists("bianche",$conditions)){
            $sqlConditions =array_merge($sqlConditions,array('where'=>array('id'=>12)));
        }
        $count=$this->conn->getRows('pizze',$sqlConditions);
        return $count;
    }
    public function countPanini($conditions=array()){
        $sqlConditions=array('return_type'=>'count');
        if(array_key_exists("bianche",$conditions)){
            $sqlConditions =array_merge($sqlConditions,array('where'=>array('id'=>12)));
        }
        $count=$this->conn->getRows('panini',$sqlConditions);
        return $count;
    }
    public function countInsalate($conditions=array()){
        $sqlConditions=array('return_type'=>'count');
        if(array_key_exists("bianche",$conditions)){
            $sqlConditions =array_merge($sqlConditions,array('where'=>array('id'=>12)));
        }
        $count=$this->conn->getRows('insalate',$sqlConditions);
        return $count;
    }
    public function countBibite($conditions=array()){
        $sqlConditions=array('return_type'=>'count');
        if(array_key_exists("bianche",$conditions)){
            $sqlConditions =array_merge($sqlConditions,array('where'=>array('id'=>12)));
        }
        $count=$this->conn->getRows('bibite',$sqlConditions);
        return $count;
    }
}
