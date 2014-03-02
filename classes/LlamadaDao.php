<?php
/**
 * Description of LlamadaDao
 *
 * @author itinajero
 */
class LlamadaDao {
   private $connDb;
   
   function __construct($connDb) {
      $this->connDb = $connDb;
   }

   function getLlamadasPorDependencia(){
      $sql="select Dependencias.id,Dependencias.nombre,count(Dependencias.id) as NoLlamadas from Llamadas  ".
           " inner join Extensiones on Extensiones.id=Llamadas.idExtension ".
           " inner join Dependencias on Dependencias.id=Extensiones.idDependencia".
           " group by Dependencias.id".
           " order by count(Dependencias.id) desc";
      
      $llamadas = mysql_query($sql,$this->connDb);  
      return $llamadas;
   }
   /**
    * 
    */
   
   function getLlamadasPorDependenciaMes(){
     
     $sql="select t1.id,t1.nombre as dependencia,
      max(t1.Enero) as Ene,
      max(t1.Febrero) as Feb,
      max(t1.Marzo) as Mar,
      max(t1.Abril) as Abr,
      max(t1.Mayo) as May,
      max(t1.Junio) as Jun,
      max(t1.Julio) as Jul,
      max(t1.Agosto) as Ago,
      max(t1.Septiembre) as Sep,
      max(t1.Octubre) as Oct,
      max(t1.Noviembre) as Nov,
      max(t1.Diciembre) as Dic,
      
      (max(t1.Enero)+max(t1.Febrero)+max(t1.Marzo)+ max(t1.Abril) +max(t1.Mayo)+ max(t1.Junio)
      +max(t1.Julio)+max(t1.Agosto)+max(t1.Septiembre)+max(t1.Octubre)+max(t1.Noviembre)+max(t1.Diciembre) )
      as totalDependencia

      from

      (select Dependencias.id,Dependencias.nombre,
      if(month(Llamadas.fecha)=1,count(Dependencias.id),0) as Enero,
      if(month(Llamadas.fecha)=2,count(Dependencias.id),0) as Febrero,
      if(month(Llamadas.fecha)=3,count(Dependencias.id),0) as Marzo,
      if(month(Llamadas.fecha)=4,count(Dependencias.id),0) as Abril,
      if(month(Llamadas.fecha)=5,count(Dependencias.id),0) as Mayo,
      if(month(Llamadas.fecha)=6,count(Dependencias.id),0) as Junio,
      if(month(Llamadas.fecha)=7,count(Dependencias.id),0) as Julio,
      if(month(Llamadas.fecha)=8,count(Dependencias.id),0) as Agosto,
      if(month(Llamadas.fecha)=9,count(Dependencias.id),0) as Septiembre,
      if(month(Llamadas.fecha)=10,count(Dependencias.id),0) as Octubre,
      if(month(Llamadas.fecha)=11,count(Dependencias.id),0) as Noviembre,
      if(month(Llamadas.fecha)=12,count(Dependencias.id),0) as Diciembre

      from Llamadas  
      inner join Extensiones on Extensiones.id=Llamadas.idExtension
      inner join Dependencias on Dependencias.id=Extensiones.idDependencia
      group by month(Llamadas.fecha),Dependencias.id)t1
      group by t1.id
      order by t1.nombre";
     
      $llamadas = mysql_query($sql,$this->connDb);  
      
      return $llamadas;
     
     
   }
   
   function addLlamada($objLlamada){
     
     $sql="insert into Llamadas values (0,now(),".
        $objLlamada->getIdUsuario().",".
        $objLlamada->getIdExtension().")";
    
     mysql_query($sql,$this->connDb);
     
     return 1;
     
     
   }
}
