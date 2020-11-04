<html>
<head> </head>
<title> Inventario Brand </title>

<body>
 
 <p><h2>Informações do Tipo de Equipamento</h2></p>
 <?php INCLUDE "pathing.php"; 


 echo "<form action='$cadastro_sql' method='post'>";
 ?>
  <input type="hidden" name="pagina" value="<?php echo "$cadastro_tipos_equip";?>" /> 
  <label for="Tipo">Tipo:</label><br>
  <input type="text" id="tipo_equip" name="tipo_equip">
  <br><br>
  <input type="submit" name="submit" id="submit" class="button" value="Submit"/>
  </form>
  <?php
  echo "<form action='$menu'>";
  ?>
  <input type="submit" name="submit" id="submit" class="button" value="Menu"/>
  </form>

  


</body>
</html>