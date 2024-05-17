<?php


//$message = ''; $nombre = '';
$variable = $_POST['documents'];
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Subir')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    
    //echo "holac";die();
    //$aniox = $_POST['annio'];
    $clavex = '0942000602000000';
    $folioxx = 'a1';
    ///$tipopersz = $_POST['tipopersona'];
    
    //$length = 5;
    $foliodecarpeta = $folioxx; //str_pad($folioxx,$length,"0", STR_PAD_LEFT);
    //session_start();
    
    $num_id = 340; // $_SESSION["idkey2"];
    
    //include_once 'bd/conex.php';
    
    
    $target_dir = "E:/dictamun/files/documentos";    
    $carpeta=$target_dir."/".$foliodecarpeta."/".$clavex."/";
    
    
    if (!file_exists($carpeta)) {
      mkdir($carpeta, 0777, true);
    }
    
    //codigo orginal de la subida de archivos

    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // sanitize file-name
    //$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    $newFileName = 'subiendo' . '.' . $fileExtension;

    // check if file has one of the following extensions
    $allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = $carpeta; // './documentos/';
      $dest_path = $uploadFileDir . $newFileName;

      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      { 
        echo$message ='Documento subido y guardado correctamente.';
      }
      else 
      {
        echo$message = 'Hubo algún error al subir el Documento al servidor';
      }
    }
    else
    {
     echo $message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
    }


}
}
?>