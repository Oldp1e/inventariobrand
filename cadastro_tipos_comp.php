<html>
<head>
<?php 	
	session_start();
	if(is_null($_SESSION['online'])){
		header('Location: '.'/inventariobrand/login/index.html');
	}		
	?>  
</head>
<title> Inventario Brand </title>

<body>
 
 <p><h2>Cadastro de Tipos de Componentes</h2></p>
 <?php INCLUDE "pathing.php"; 


 echo "<form action='$cadastro_sql' method='post'>";
 ?>
  <input type="hidden" name="pagina" value="<?php echo "$cadastro_tipos_comp";?>" /> 
  <label for="Tipo">Tipo:</label><br>
  <input type="text" id="tipo_comp" name="tipo_comp">
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