<?php
  require_once 'classes/Connection.php';
  require_once 'classes/Llamada.php';
  require_once 'classes/LlamadaDao.php';
  require_once 'classes/ExtensionDao.php';
  
   EXTRACT($_POST);
   $mensaje="";
   
   // Creamos conexion a base de datos
   
   $conn = new Connection();
   $objExtensionDao = new ExtensionDao($conn->getConexion());
   $objLlamadaDao=new LlamadaDao($conn->getConexion());
   
   $objLlamada=$objExtensionDao->existeExtension($txtExtension);
   
   if($objLlamada->getIdExtension()){ // Regresa idExtension en objLlamada en caso de existir
     
     $objLlamada->setIdUsuario(1);
     $objLlamada->setFecha(date('Y-m-d'));
     $objLlamadaDao->addLlamada($objLlamada);
     
     $mensaje= "<font color=green>Se registro la llamada ".$txtExtension."</font>";
     
   }else{
     $mensaje="<font color=red>No se registro la extension ". $txtExtension." , ya que no existe en el directorio, favor de verificar.</font>";
   }
   
   header("Location: frmAddLlamada.php?mensaje=$mensaje");
   
?>
