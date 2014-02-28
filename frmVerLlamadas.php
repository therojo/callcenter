<?php
   require_once 'classes/Connection.php';
   require_once 'classes/LlamadaDao.php';
   
   // Creamos conexion a base de datos
   $conn = new Connection();
   $llamadaDao = new LlamadaDao($conn->getConexion());   
   $llamadas=$llamadaDao->getLlamadasPorDependencia();
?>   
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Llamadas por Dependencia</title>
      <style>
         thead {color:green;}
         tbody {color:blue;}
         tfoot {color:red;}
         table,th,td
         {
          border:1px solid black;
         }
      </style>
   </head>
   <body>
      <a href="menu.html"><img src="images/home.png" title="Ir al menu"></a>
      <h3>Llamadas por Dependencia</h3>
      <table border="1">
         <thead>
            <tr>
               <th>Id</th>
               <th>Dependencia</th>		
               <th>No Llamadas</th>
             </tr>  
         </thead>
         <?php
         $total=0;
         while ($row = mysql_fetch_array($llamadas)) {
            $total += $row['NoLlamadas'];
            echo "<tr>";
            echo "<td><center>" . $row['id'] . "</center></td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td><center>" . $row['NoLlamadas'] . "</center></td>";
            echo "<tr>";
         }
         ?> 
         <tfoot>
            <tr>
               <td colspan="2"><center>Total</center></td>
               <td><center><?php echo $total ?></center></td>
            </tr>   
         </tfoot>
      </table>
   </body>
</html>
