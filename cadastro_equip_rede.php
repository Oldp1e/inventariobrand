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
 
 <p><h2>Informações do Equipamento na Rede</h2></p>
 <?php INCLUDE "pathing.php"; 
       INCLUDE "$dblogin";

       if(isset($_POST["tipo_comp_box"])){
            $tipo_comp_box = $_POST["tipo_comp_box"];
            $id = $tipo_comp_box[0].$tipo_comp_box[1];
            echo "LOG - VAR ECHO = ".$tipo_comp_box." <br> ID =(".$id.")";
         }

   echo "<form method='post'>";    
   //Preenche a combo box com as informações de Tipos de Componentes
   echo '<select name="tipo_comp_box" onchange="this.form.submit()">';
   if(isset($tipo_comp_box)){
      echo '<option selected>'.$tipo_comp_box.'</option>';
   } else{
      echo '<option selected disabled>Tipo</option>';
   }
   

   $sqli = "SELECT * FROM equipamentos";
   $result = mysqli_query(OpenCon(), $sqli);
   while ($row = mysqli_fetch_array($result)) {
   echo "<option value='".$row['ID']." ".$row['Tipo']." ".$row['Nome_Maq']." ".$row['Modelo']." ".$row['Setor']."'>".$row['ID']." ".$row['Tipo']." ".$row['Nome_Maq']." ".$row['Modelo']." ".$row['Setor']."</option>";
   
   }
   echo '</select>';
   echo "</form>";






 echo "<form action='$cadastro_sql' method='post'>";
 ?>
  <input type="hidden" name="pagina" value="<?php echo "$cadastro_modelos_comp";?>" /> 
  <input type="hidden" name="id_equip" value="<?php echo "$id";?>" /> 
  <label for="IPV4">IPV4:</label><br>
  <input type="text" id="IPV4" name="IPV4">
  <br><br>
  <label for="MAC">Endereco MAC:</label><br>
  <input type="text" id="MAC" name="MAC">
  <br><br>
  <?php 

  
  //FIM PHP?>
  

  <br><br><br>

  <input type="submit" name="submit" id="submit" class="button" value="Submit"/>
  </form>
  <?php
  echo "<form action='$menu'>";
  ?>
  <input type="submit" name="submit" id="submit" class="button" value="Menu"/>
  </form>

  


</body>
</html>