<?php
class ImmaginiUploader{
     public function __construct(){}
    public function Upload($nomeInput = null)
    {
        // per prima cosa verifico che il file sia stato effettivamente caricato
        if (!isset($_FILES[$nomeInput]) || !is_uploaded_file($_FILES[$nomeInput]['tmp_name'])) {
        echo 'Non hai inviato nessun file...';
        return;
        }
        $homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
        //percorso della cartella dove mettere i file caricati dagli utenti
        $uploaddir = $homedir."/pizzeria2/img/";

        //Recupero il percorso temporaneo del file
        $immagine_tmp = $_FILES[$nomeInput]['tmp_name'];

        //recupero il nome originale del file caricato
        $immagine_name = $_FILES[$nomeInput]['name'];

        //copio il file dalla sua posizione temporanea alla mia cartella upload
        if (move_uploaded_file($immagine_tmp, $uploaddir . $immagine_name)) {
        //Se l'operazione è andata a buon fine...
        echo 'File inviato con successo.';
        }else{
        //Se l'operazione è fallta...
        echo 'Upload NON valido!'; 
        
        exit;    
        }
    }
}