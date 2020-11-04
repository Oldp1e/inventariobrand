<html>
<head> </head>
<title> Inventario Brand </title>

<body>
 
 <p><h2>Informações de Setor</h2></p>
 <?php INCLUDE "pathing.php"; 


 echo "<form action='$cadastro_sql' method='post'>";
 ?>
  <input type="hidden" name="pagina" value="<?php echo "$cadastro_setor";?>" /> 
  <label for="setor">Setor:</label><br>
  <input type="text" id="setor" name="setor">
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