<?php
class ProdottoModel{
    public $titolo;
    public $prezzo;
    public $descrizione;
    public $id;
    public $tipo;
    public $img;

    public function __construct($row,$tipo){
        $this->tipo=$tipo;
        
        $this->id=$row['id'];
        $this->img= isset($row['immagine']) && $row['immagine']!=''?"/pizzeria2/img/".$row['immagine']:"/pizzeria2/img/product1.jpg";
         switch ($tipo) {
            case 'pizze':
                $this->titolo=$row['nome_pizza'];
                $this->descrizione=$row['ingredienti'];
                $this->prezzo=$row['prezzo'];
                break;
            case 'panini':
                $this->titolo=$row['nome_panino'];
                $this->descrizione=$row['ingredienti'];
                $this->prezzo=$row['prezzo'];
                break;
            case 'insalate':
                $this->titolo=$row['nome_insalate'];
                $this->descrizione=$row['ingredienti'];
                $this->prezzo=$row['prezzo'];
                break;
            case 'bibite':
                $this->titolo=$row['nome_bibite'];
                $this->descrizione="cl ".$row['dimensione'];
                $this->prezzo=$row['prezzo'];
                break;
            default:
                break;
        }
    }
}
