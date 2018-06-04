<?php
//start session
session_start();
$homedir = substr($_SERVER['SCRIPT_FILENAME'],0,-strlen($_SERVER['SCRIPT_NAME']) );
require_once  $homedir.'/pizzeria2/models/db.php';
    $db = new DB();

$tblName = 'Pizze';

//set default redirect url
$redirectURL = 'index.php';

if(isset($_POST['formSubmit'])){
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["immagine"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));    
        $check = getimagesize($_FILES["immagine"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["immagine"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["immagine"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["immagine"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    if(!empty($_POST['immagine']) && !empty($_POST['nome_pizza']) && !empty($_POST['ingredienti']) && !empty($_POST['prezzo'])){
        if(!is_numeric($_POST['prezzo'])){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Prezzo deve essere un numero';
            $redirectURL = 'addEdit.php';
        }else{
        if(!empty($_POST['id'])){
            //update data
            $userData = array(
                'immagine' => $_POST['immagine'],
                'nome_pizza' => $_POST['nome_pizza'],
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
                'immagine' => $_POST['immagine'],
                'nome_pizza' => $_POST['nome_pizza'],
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