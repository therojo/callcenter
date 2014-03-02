<?php
   require_once 'classes/Connection.php';
   require_once 'classes/LlamadaDao.php';
   
   // Creamos conexion a base de datos
   $conn = new Connection();
   $llamadaDao = new LlamadaDao($conn->getConexion());   
   $llamadas=$llamadaDao->getLlamadasPorDependenciaMes();
?>   
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Llamadas por Dependencia y Mes</title>
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
      <h3>Llamadas por Dependencia y Mes</h3>
      <table border="1">
         <thead>
            <tr>
               <th>Id</th>
               <th>Dependencia</th>		
               <th>Total</th>		
               <th>Ene</th>		
               <th>Feb</th>		
               <th>Mar</th>		
               <th>Abr</th>		
               <th>May</th>		
               <th>Jun</th>		
               <th>Jul</th>		
               <th>Ago</th>		
               <th>Sep</th>		
               <th>Oct</th>		
               <th>Nov</th>		
               <th>Dic</th>		
             </tr>  
         </thead>
         <?php
           $total=0;
           $ene=0;
           $feb=0;
           $mar=0;
           $abr=0;
           $may=0;
           $jun=0;
           $jul=0;
           $ago=0;
           $sep=0;
           $oct=0;
           $nov=0;
           $dic=0;

         
           while ($row = mysql_fetch_array($llamadas)) {
             $total+=$row['totalDependencia'];
             $ene+=$row['Ene'];
             $feb+=$row['Feb'];
             $mar+=$row['Mar'];
             $abr+=$row['Abr'];
             $may+=$row['May'];
             $jun+=$row['Jun'];
             $jul+=$row['Jul'];
             $ago+=$row['Ago'];
             $sep+=$row['Sep'];
             $oct+=$row['Oct'];
             $nov+=$row['Nov'];
             $dic+=$row['Dic'];

             echo "<tr>";
                echo "<td><center>" . $row['id'] . "</center></td>";
                echo "<td>" . $row['dependencia'] . "</td>";
                echo "<td><center>" . $row['totalDependencia'] . "</center></td>";
                echo "<td><center>" . $row['Ene'] . "</center></td>";
                echo "<td><center>" . $row['Feb'] . "</center></td>";
                echo "<td><center>" . $row['Mar'] . "</center></td>";
                echo "<td><center>" . $row['Abr'] . "</center></td>";
                echo "<td><center>" . $row['May'] . "</center></td>";
                echo "<td><center>" . $row['Jun'] . "</center></td>";
                echo "<td><center>" . $row['Jul'] . "</center></td>";
                echo "<td><center>" . $row['Ago'] . "</center></td>";
                echo "<td><center>" . $row['Sep'] . "</center></td>";
                echo "<td><center>" . $row['Oct'] . "</center></td>";
                echo "<td><center>" . $row['Nov'] . "</center></td>";
                echo "<td><center>" . $row['Dic'] . "</center></td>";
              echo "<tr>";
           }
         
         echo "<tr>";
              echo "<td><center>" . $row['id'] . "</center></td>";
              echo "<td>Subtotales</td>";
              echo "<td><center></center></td>";
              echo "<td><center>" . $ene . "</center></td>";
              echo "<td><center>" . $feb. "</center></td>";
              echo "<td><center>" . $mar. "</center></td>";
              echo "<td><center>" . $abr. "</center></td>";
              echo "<td><center>" . $may. "</center></td>";
              echo "<td><center>" . $jun. "</center></td>";
              echo "<td><center>" . $jul. "</center></td>";
              echo "<td><center>" . $ago. "</center></td>";
              echo "<td><center>" . $sep. "</center></td>";
              echo "<td><center>" . $oct . "</center></td>";
              echo "<td><center>" . $nov . "</center></td>";
              echo "<td><center>" . $dic. "</center></td>";
            echo "<tr>";
        
         
         ?> 
         <tfoot>
            <tr>
               <td colspan="2"><center>Total</center></td>
               <td colspan="13"><center><?php echo $total ?></center></td>
            </tr>   
         </tfoot>
         
      </table>
   </body>
</html>
