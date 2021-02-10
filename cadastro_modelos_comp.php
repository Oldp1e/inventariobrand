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
 
 <p><h2>Informações do Modelo de Componente</h2></p>
 <?php INCLUDE "pathing.php"; 
       INCLUDE "$dblogin";

       if(isset($_POST["tipo_comp_box"])){
            $tipo_comp_box = $_POST["tipo_comp_box"];
         }

   echo "<form method='post'>";    
   //Preenche a combo box com as informações de Tipos de Componentes
   echo '<select name="tipo_comp_box" onchange="this.form.submit()">';
   if(isset($tipo_comp_box)){
      echo '<option selected>'.$tipo_comp_box.'</option>';
   } else{
      echo '<option selected disabled>Tipo</option>';
   }
   

   $sqli = "SELECT * FROM tipos_comp";
   $result = mysqli_query(OpenCon(), $sqli);
   while ($row = mysqli_fetch_array($result)) {
   echo "<option value=".$row['Nome'].">".$row['Nome']."</option>";
   }
   
   echo '</select>';
   
   echo "</form>";






 echo "<form action='$cadastro_sql' method='post'>";
 ?>
  <input type="hidden" name="pagina" value="<?php echo "$cadastro_modelos_comp";?>" /> 
  <input type="hidden" name="tipo_comp_mod" value="<?php echo "$tipo_comp_box";?>" /> 
  <label for="Modelo">Modelo:</label><br>
  <input type="text" id="modelo" name="modelo">
  <br><br>
  <label for="Fabricante">Fabricante:</label><br>
  <input type="text" id="fabricante" name="fabricante">
  <br><br>
  <?php 
  if(isset($tipo_comp_box) ){
        $checkString = array("Impressora", "Placa-Mae","Placa-de-Video");
      if(!in_array($tipo_comp_box, $checkString)) {
            echo "<label for='Capacidade'>Capacidade:</label><br>";
            echo "<input type='text' id='capacidade' name='capacidade'>";
            echo "  
            <select name='unidade'>"; 
            if(strcmp($tipo_comp_box , "Disco") == 0 || strcmp($tipo_comp_box , "SSD") == 0 ){
            echo "<option value='KB'>KB</option>
            <option value='MB'>MB</option>
            <option value='GB'>GB</option>
            <option value='TB'>TB</option>";
            }
          if(strcmp($tipo_comp_box , "Memoria") == 0){  
           echo"
            <option value='MB/DDR2'>MB/DDR2</option>            
            <option value='MB/DDR3'>MB/DDR3</option>
            <option value='MB/DDR4'>MB/DDR4</option>
            <option value='GB/DDR2'>GB/DDR2</option>
            <option value='GB/DDR3'>GB/DDR3</option>            
            <option value='GB/DDR4'>GB/DDR4</option>";
          }if(strcmp($tipo_comp_box , "Roteador") == 0){  
           echo " <option value='Kb/s'>Kb/s</option>
            <option value='Mb/s'>Mb/s</option>
            <option value='Gb/s'>Gb/s</option>";
           } 
          if(strcmp($tipo_comp_box , "Processador") == 0){  
            echo "<option value='MHz'>MHz</option>
            <option value='GHz'>GHz</option>
            </select>";
          }  
       }
 }

  
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