<?php
session_start();

//$message = ''; $nombre = '';
$variable = $_POST['documents'];
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Subir')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
  	
  	//echo "holac";die();
  	$aniox = $_POST['annio'];
  	$clavex = $_POST['cclv'];
  	$folioxx = $_POST['folioo'];
  	$tipopersz = $_POST['tipopersona'];
  	
  	$length = 5;
  	$foliodecarpeta = str_pad($folioxx,$length,"0", STR_PAD_LEFT);
  	//session_start();
  	
  	$num_id = 340; // $_SESSION["idkey2"];
  	
  	include_once 'bd/conex.php';
  	
  	
  	$target_dir = "files/documentos/";  	
  	$carpeta=$target_dir.$foliodecarpeta."/".$clavex."/";
  	
  	
  	if (!file_exists($carpeta)) {
  		mkdir($carpeta, 0777, true);
  	}
  	
  	
    //switch documentos logicos
    switch ($variable) {
      case 14:
      	$ordenlogico = 14;
      $message = ''; $nombre = '';
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // sanitize file-name
    //$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    $newFileName = 'FormatoFirmadoContribuyente' . '.' . $fileExtension;

    // check if file has one of the following extensions
    $allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
    	$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
      $dest_path = $uploadFileDir . $newFileName;

      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      { 
      	$y = (int) $foliodecarpeta;
      	$c = $coxx;
      	$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
      	pg_query($c, $sqls);
      	pg_close($c);
      	
        $nombre =$newFileName;
        $message ='Documento subido y guardado correctamente.';
        
      }
      else 
      {
        $message = 'Hubo algún error al subir el Documento al servidor';
      }
    }
    else
    {
      $message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
    }

$_SESSION['message14'] = $message;
$_SESSION['filenameavg14'] = $nombre;
        
        break;
        
        
        case 10:
        	
        	$ordenlogico = 10;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'Avaluos' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message10'] = $message;
        	$_SESSION['filenameavg10'] = $nombre;
        	
        	
        
        break;
        case 11:
        	
        	$ordenlogico = 11;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'Construcciones' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message11'] = $message;
        	$_SESSION['filenameavg11'] = $nombre;
        	
        
        break;
        
        case 99:
        	
        	$ordenlogico = 99;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'TituloPropiedad' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message99'] = $message;
        	$_SESSION['filenameavg99'] = $nombre;
        	
        	break;
        case 98:
        	
        	$ordenlogico = 98;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'BoletaPredial' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message98'] = $message;
        	$_SESSION['filenameavg98'] = $nombre;
        	
        	
        	break;
        case 83:
        	
        	$ordenlogico = 83;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'Documentoacreditapropiedad' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message83'] = $message;
        	$_SESSION['filenameavg83'] = $nombre;
        	
        	break;
        	
        case 97:
        	
        	$ordenlogico = 97;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'IdentificacionOficial' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message97'] = $message;
        	$_SESSION['filenameavg97'] = $nombre;
        	
        	break;
        case 96:
        	
        	$ordenlogico = 96;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'Planos' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message96'] = $message;
        	$_SESSION['filenameavg96'] = $nombre;
        	
        	break;
        case 95:
        	
        	$ordenlogico = 95;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'CroquisLocalizacion' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message95'] = $message;
        	$_SESSION['filenameavg95'] = $nombre;
        	
        	break;
        	
        case 82:
        	
        	$ordenlogico = 82;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'Planoarquitectonicocroquisconstruccion' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message82'] = $message;
        	$_SESSION['filenameavg82'] = $nombre;
        	
        	break;
        case 81:
        	
        	$ordenlogico = 81;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'Planoarquitectonicodesuusoprivativo' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message81'] = $message;
        	$_SESSION['filenameavg81'] = $nombre;
        	
        	break;
        case 80:
        	
        	$ordenlogico = 80;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'Planodelconjuntosuperficiesconstructivas' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message80'] = $message;
        	$_SESSION['filenameavg80'] = $nombre;
        	
        	
        	break;
        case 79:
        	
        	$ordenlogico = 79;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'PlanosdeFactores' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message79'] = $message;
        	$_SESSION['filenameavg79'] = $nombre;
        	
        	break;
        case 15:
        	
        	$ordenlogico = 15;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'IndivisosdeCondominio' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message15'] = $message;
        	$_SESSION['filenameavg15'] = $nombre;
        	
        	
        	break;
        case 94:
        	
        	$ordenlogico = 94;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'Otros' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message94'] = $message;
        	$_SESSION['filenameavg94'] = $nombre;
        	
        	break;
        case 120:
        	
        	$ordenlogico = 120;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'Imagen_de_pachada' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message121'] = $message;
        	$_SESSION['filenameavg121'] = $nombre;
        	
        	
        	break;
        	
        	// fin de acesso a fisico
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	
        	/// morales
        	
        case 90: 
        	
        	$ordenlogico = 90;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'ActaConstitutiva' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message90'] = $message;
        	$_SESSION['filenameavg90'] = $nombre;
        	
        	
        	break;
        case 89:
        	
        	$ordenlogico = 89;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'NombramientoLegal' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message89'] = $message;
        	$_SESSION['filenameavg89'] = $nombre;
        	
        	break;
        	
        case 88:
        	
        	$ordenlogico = 88;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'BoletaPredial' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message88'] = $message;
        	$_SESSION['filenameavg88'] = $nombre;
        	
        	break;
        	
        case 87:
        	
        	$ordenlogico = 87;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'IdentificacionOficialdelpropietarioorepresentantelegal' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message87'] = $message;
        	$_SESSION['filenameavg87'] = $nombre;
        	
        	break;
        	
        case 86:
        	
        	$ordenlogico = 86;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'Planos' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message86'] = $message;
        	$_SESSION['filenameavg86'] = $nombre;
        	
        	break;
        	
        case 85:
        	
        	$ordenlogico = 85;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'CroquisLocalizacion' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message85'] = $message;
        	$_SESSION['filenameavg85'] = $nombre;
        	
        	break;
        	
        case 84:
        	
        	$ordenlogico = 84;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'Otros' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message84'] = $message;
        	$_SESSION['filenameavg84'] = $nombre;
        	
        	break;
        	
        	
        case 78:
        	
        	$ordenlogico = 78;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'Documentoacreditapropiedad' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message78'] = $message;
        	$_SESSION['filenameavg78'] = $nombre;
        	
        	break;
        	
        case 77:
        	
        	$ordenlogico = 77;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'Planoarquitectonicocroquisconstruccion' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message77'] = $message;
        	$_SESSION['filenameavg77'] = $nombre;
        	
        	break;
        	
        case 76:
        	
        	$ordenlogico = 76;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'Planoarquitectonicodesuusoprivativo' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message76'] = $message;
        	$_SESSION['filenameavg76'] = $nombre;
        	
        	break;
        	
        case 75:
        	
        	$ordenlogico = 75;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'Planodelconjuntosuperficiesconstructivas' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message75'] = $message;
        	$_SESSION['filenameavg75'] = $nombre;
        	
        	break;
        	
        case 74:
        	
        	$ordenlogico = 74;
        	$message = ''; $nombre = '';
        	// get details of the uploaded file
        	$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        	$fileName = $_FILES['uploadedFile']['name'];
        	$fileSize = $_FILES['uploadedFile']['size'];
        	$fileType = $_FILES['uploadedFile']['type'];
        	$fileNameCmps = explode(".", $fileName);
        	$fileExtension = strtolower(end($fileNameCmps));
        	
        	// sanitize file-name
        	//$newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        	$newFileName = 'PlanosdeFactores' . '.' . $fileExtension;
        	
        	// check if file has one of the following extensions
        	$allowedfileExtensions = array('pdf','dwg','pptx','ppt','jpg', 'gif', 'png','rar' , 'zip', 'txt', 'xls', 'doc', 'docx', 'val', 'exe');
        	
        	if (in_array($fileExtension, $allowedfileExtensions))
        	{
        		// directory in which the uploaded file will be moved
        		$uploadFileDir = './files/documentos/'.$foliodecarpeta.'/'.$clavex.'/';
        		$dest_path = $uploadFileDir . $newFileName;
        		
        		if(move_uploaded_file($fileTmpPath, $dest_path))
        		{
        			$y = (int) $foliodecarpeta;
        			$c = $coxx;
        			$sqls="INSERT INTO listadocumentos_v2(nombredoc, orden, id_dictamen, id_dictaminador,clavecastatral) VALUES ('$newFileName', $ordenlogico , $y, $num_id,'$clavex');";
        			pg_query($c, $sqls);
        			pg_close($c);
        			
        			$nombre =$newFileName;
        			$message ='Documento subido y guardado correctamente.';
        			
        		}
        		else
        		{
        			$message = 'Hubo algún error al subir el Documento al servidor';
        		}
        	}
        	else
        	{
        		$message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
        	}
        	
        	$_SESSION['message74'] = $message;
        	$_SESSION['filenameavg74'] = $nombre;
        	
        	break;
      
      default:      
        $message = 'Error de Servidor con logica de documentos';
        break;
    }

    /*
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
      $uploadFileDir = './archivos_/';
      $dest_path = $uploadFileDir . $newFileName;

      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      { 
        $message ='Documento subido y guardado correctamente.';
      }
      else 
      {
        $message = 'Hubo algún error al subir el Documento al servidor';
      }
    }
    else
    {
      $message = 'Documento fallido. Tipos de Documentos permitidos: ' . implode(',', $allowedfileExtensions);
    }
*/









  }
  else
  {
    $message = 'Hay algún error en la carga del Documento. Compruebe el siguiente error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}

//$f = $_SESSION['message'] = $message;
//print_r($f);
//echo"error";
//die();

$aniox = $_POST['annio'];
$clavex = $_POST['cclv'];
$folioxx = $_POST['folioo'];
$tipopersz = $_POST['tipopersona'];

header("Location: filessx/".$folioxx."/".$clavex."/".$aniox."/".$tipopersz);


?>