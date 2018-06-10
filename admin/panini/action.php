<?php
//start session
session_start();
$homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
require_once  $homedir.'/pizzeria2/models/db.php';
    $db = new DB();
    require_once  $homedir.'/pizzeria2/models/ImmaginiUploader.php';
$immaginiUploader=new ImmaginiUploader();
$tblName = 'Panini';

//set default redirect url
$redirectURL = 'index.php';

if(isset($_POST['formSubmit'])){
    if(!empty($_POST['nome_panino']) && !empty($_POST['ingredienti']) && !empty($_POST['prezzo'])){
        if(!is_numeric($_POST['prezzo'])){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Prezzo deve essere un numero';
            $redirectURL = 'addEdit.php';
        }else{
            $nomeFile=isset($_FILES['immagine']['name'])?$_FILES['immagine']['name']:null;
        if(!empty($_POST['id'])){
            //update data
            $userData = array(
                'immagine' => $nomeFile,
                'nome_panino' => $_POST['nome_panino'],
                'ingredienti' => $_POST['ingredienti'],
                'prezzo' => (float)$_POST['prezzo']
            );
            $condition = array('id' => (int)$_POST['id']);
            $update = $db->update($tblName, $userData, $condition);
            if($update){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operazione conclusa con successo';
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Si è verificato un errore.';
                
                //set redirect url
                $redirectURL = 'addEdit.php?id='.$_POST['id'];
            }
        }else{
            //insert data
            $userData = array(
                'immagine' => $nomeFile,
                'nome_panino' => $_POST['nome_panino'],
                'ingredienti' => $_POST['ingredienti'],
                'prezzo' => $_POST['prezzo']
            );
            $insert = $db->insert($tblName, $userData);
            if($insert){
                $sessData['status']['type'] = 'success';
                $sessData['status']['msg'] = 'Operazione conclusa con successo';
            }else{
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Si è verificato un errore.';
                
                //set redirect url
                $redirectURL = 'addEdit.php';
            }
        }
        $immaginiUploader->Upload('immagine');
    }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Tutti i campi sono obbligatori';
        
        //set redirect url
        $redirectURL = 'addEdit.php';
    }
    
    //store status into the session
    $_SESSION['sessData'] = $sessData;
    
    //redirect to the list page
    header("Location:".$redirectURL);
}elseif((!empty($_REQUEST['action_type']) && $_REQUEST['action_type']== 'delete') && !empty($_GET['id'])){
    //delete data
    $condition = array('id' => (int)$_GET['id']);
    $delete = $db->delete($tblName, $condition);
    if($delete){
        $sessData['status']['type'] = 'success';
        $sessData['status']['msg'] = 'Operazione conclusa con successo';
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Si è verificato un errore.';
    }
    
    //store status into the session
    $_SESSION['sessData'] = $sessData;

    //redirect to the list page
    header("Location:".$redirectURL);
}
exit();
?>