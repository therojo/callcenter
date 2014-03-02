<?
extract($_GET);
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Registro de Llamadas</title>
      <script>
         function validar(){
            if (document.frmAlta.txtUsername.value==""){
               alert("El nombre de usuario es obligatorio.");return;
            }
            if (document.frmAlta.txtpassword.value==""){
               alert("El password es obligatorio");return;
            }                           
            if (confirm("¿Estan correctos los datos?"))
               document.frmAlta.submit();
         }
      </script>
   </head>
   <body>
      <a href="menu.html"><img src="images/home.png" title="Ir al menu"></a>
      <h3>Registro de Llamadas transferidas en el Call Center</h3>
      <h4><?php echo $mensaje ?></h4>
      <form action="insertLlamada.php" method="post" name="frmAlta">
          <table>             
              <tr>            
                <td>Capture la extensi&oacute;n que transfirio <br/>
                  <input type="text" name="txtExtension" id="txtExtension" style="width:400px; height:80px; font-size: xx-large;color: blue" />
                </td>
             </tr>   
             <tr>
                <td><input type="submit" value="Registrar"/>&nbsp;<input type="reset" value="Limpiar"/> </td>
             </tr>
          </table>
      </form>
   </body>
</html>