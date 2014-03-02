<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExtensionDao
 *
 * @author rojo
 */
class ExtensionDao {
   
   private $connDb;
   
   function __construct($connDb) {
      $this->connDb = $connDb;
   }
   
   /**
    * 
    * @param type $extension
    * @return type registro
    */
   function existeExtension($extension){
     
     $sql="select id from Extensiones where numero=".$extension;
     $objLlamada=new Llamada();
     
     $query = @mysql_query($sql);
     $registro = mysql_fetch_array($query); 
     $key = array_keys($registro);
     
     for($x = 0; $x < count($key); $x++){
        // Sanitizes keys so only alphavalues are allowed
        if(!is_int($key[$x])){
          if(mysql_num_rows($query) >= 1){
            $objLlamada->setIdExtension($registro[$key[$x]]);
          }
        }
					}
     
     return $objLlamada;
     
   }
}

?>
