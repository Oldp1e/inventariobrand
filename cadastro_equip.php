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
 
 <p><h2>Informações do equipamento</h2></p>
 <?php INCLUDE "pathing.php"; 
       INCLUDE "$dblogin";?>

  <label for="tipo_equip">Tipo de equipamento:</label>
  <?php 
  
  if(isset($_POST["tipo_equip_box"])){
    $tipo_equip_box = $_POST["tipo_equip_box"];
  }

  echo "<form method='post'>";    
  //Preenche a combo box com as informações de Tipos de Equipamentos
  echo '<select name="tipo_equip_box" onchange="this.form.submit()">';
  if(isset($tipo_equip_box)){
  echo '<option selected>'.$tipo_equip_box.'</option>';
  } else{
  echo '<option selected disabled>Tipo</option>';
  }


  $sqli = "SELECT * FROM tipos_equip";
  $result = mysqli_query(OpenCon(), $sqli);
  while ($row = mysqli_fetch_array($result)) {
  echo "<option value='".$row['Nome']."'>".$row['Nome']."</option>";
  }

  echo '</select>';

  echo "</form>";



  ?>

  
<label for="setor">Setor:</label>
  <?php 
  
  if(isset($_POST["setores"])){
    $setores_box = $_POST["setores"];
  }

  echo "<form method='post'>";    

  if(isset($tipo_equip_box)){
    echo "<input type='hidden' id='tipo_equip' name='tipo_equip_box' value='".$tipo_equip_box."'>";
  }

  //Preenche a combo box com as informações de Setores
  echo '<select name="setores" onchange="this.form.submit()">';
  if(isset($setores_box)){
    echo '<option selected>'.$setores_box.'</option>';
    } else{
    echo '<option selected disabled>Setor</option>';
    }


  $sqli = "SELECT * FROM setores";
  $result = mysqli_query(OpenCon(), $sqli);
  while ($row = mysqli_fetch_array($result)) {
  echo "<option value='".$row['Setor']."'>".$row['Setor']."</option>";
  }

  echo '</select>';

  echo "</form>";



  ?>
  














<?php       

  //FORMULARIO PRINCIPAL
 echo "<form action='$cadastro_sql' method='post' enctype='multipart/form-data'>";
 ?>
 <!-- PAGE INFO SENT TO PATHING -->
 <?php 
 if(isset($_POST['tipo_equip_box'])){
 $tipo_equip_box = $_POST['tipo_equip_box']; 
 }
 if(isset($_POST['setores'])){
  $setores = $_POST['setores']; 
  //POST DO SETOR = "setor"
  echo "<input type='hidden' id='setor' name='setor' value='".$setores."'/>";
  }
 ?>
  <input type="hidden" id="pagina" name="pagina" value="<?php echo "$cadastro_equip";?>" /> 
  <!--POST DO TIPO DE EQUIP = "tipo_equip"-->
  <input type="hidden" id="tipo_equip" name="tipo_equip_box" value="<?php echo "$tipo_equip_box";?>" /> 

  <?php 
  if(isset($tipo_equip_box)){
    if(strcmp($tipo_equip_box, "Notebook") == 0 || strcmp($tipo_equip_box, "Computador") == 0){
          
      
      
         
          echo " <label for='modelo'>Modelo:</label><br>
           <input type='text' id='modelo' name='modelo'> 
           <br>
           <br>";
           echo '<label for="setor">Nota Fiscal em PDF:</label>
           <div class="formgroup container-fluid">
               <input type="file" id="file" name="file" accept=".pdf"/>
               <input type="hidden" name="MAX_FILE_SIZE" value="67108864"/> <!--64 MBs worth in bytes-->
           </div>
           <br>';
         //POST DO NOME DA MAQUINA = "nome_maq"
         // <!--POST DO MODELO DE EQUIP = "modelo"-->
      echo "<label for='nome_maq'>Nome da Máquina:</label><br>
      <input type='text' id='nome_maq' name='nome_maq'> 
      <br>";
      //POST DO NOME DO USUARIO
      echo '<br>';
      echo "<label for='nome_maq'>Usuario:</label><br>
      <input type='text' id='usuario' name='usuario'> 
      <br>";

      //Preenche a combo box com as informações de processador
      echo "<br><label for='processador'>Processador:</label>";
      //POST DO PROCESSADOR = "processador"
    echo '<select name="processador"">';
  
  
    $sqli = "SELECT * FROM modelos_comp WHERE Tipo='Processador'";
    $result = mysqli_query(OpenCon(), $sqli);
    while ($row = mysqli_fetch_array($result)) {
    echo "<option value='".$row['Fabricante']." ".$row['Nome']." ".$row['Capacidade']."'>".$row['Fabricante']." ".$row['Nome']." ".$row['Capacidade']."</option>";
    }
  
    echo '</select> <br><br>';
  
     //Preenche a combo box com as informações de Placa Mae
     echo "<label for='placa-mae'>Placa Mae:</label>";
     //POST DA PLACA MAE = "placa-mae" 
     echo '<select name="placa-mae"">';
   
   
     $sqli = "SELECT * FROM modelos_comp WHERE Tipo='Placa-Mae'";
     $result = mysqli_query(OpenCon(), $sqli);
     while ($row = mysqli_fetch_array($result)){
     echo "<option value='".$row['Fabricante']." ".$row['Nome']." ".$row['Capacidade']."'>".$row['Fabricante']." ".$row['Nome']." ".$row['Capacidade']."</option>";
     }
   
     echo '</select> <br><br>';
  
      //Preenche a combo box com as informações de Placa de Video
      echo "<label for='tipo_equip'>Placa de Video:</label>";
      //POST DA PLACA DE VIDEO = "placa-de-video"
    echo '<select name="placa-de-video"">';
  
  
    $sqli = "SELECT * FROM modelos_comp WHERE Tipo='Placa-de-Video'";
    $result = mysqli_query(OpenCon(), $sqli);
    while ($row = mysqli_fetch_array($result)) {
    echo "<option value='".$row['Fabricante']." ".$row['Nome']." ".$row['Capacidade']."'>".$row['Fabricante']." ".$row['Nome']." ".$row['Capacidade']."</option>";
    }
  
    echo '</select> <br><br>';
    
     //Preenche a combo box com as informações de Memoria
     echo "<label for='tipo_equip'>Memoria:</label>";
     //POST DA MEMORIA = "memoria"
     echo '<select name="memoria"">';
   
   
     $sqli = "SELECT * FROM modelos_comp WHERE Tipo='Memoria'";
     $result = mysqli_query(OpenCon(), $sqli);
     while ($row = mysqli_fetch_array($result)) {
     echo "<option value='".$row['Fabricante']." ".$row['Nome']." ".$row['Capacidade']."'>".$row['Fabricante']." ".$row['Nome']." ".$row['Capacidade']."</option>";
     }
   
     echo '</select> <br><br>';
  
       //Preenche a combo box com as informações de Memoria
       echo "<label for='tipo_equip'>HD/SSD:</label>";
       //POST DO DISCO/SSD = "disco"
       echo '<select name="disco"">';
     
     
       $sqli = "SELECT * FROM modelos_comp WHERE Tipo='Disco' OR Tipo='SSD'";
       $result = mysqli_query(OpenCon(), $sqli);
       while ($row = mysqli_fetch_array($result)) {
       echo "<option value='".$row['Fabricante']." ".$row['Nome']." ".$row['Capacidade']."'>".$row['Fabricante']." ".$row['Nome']." ".$row['Capacidade']."</option>";
       }
     
       echo '</select> <br><br>';
  
  
    }else if(strcmp($tipo_equip_box, "Impressora") == 0){
     
      echo "<br>";
      //POST DE MODELO DE IMPRESSORA = "impressora_mod"
            echo '<label for="setor">Nota Fiscal em PDF:</label>
      <div class="formgroup container-fluid">
          <input type="file" id="file" name="file" accept=".pdf"/>
          <input type="hidden" name="MAX_FILE_SIZE" value="67108864"/> <!--64 MBs worth in bytes-->
      </div>
      <br>';

        //Preenche a combo box com as informações de Impressora
        echo "<label for='tipo_equip'>Modelo de Impressora:</label>";
      echo '<select name="impressora_mod">';
      $sqli = "SELECT * FROM modelos_comp WHERE Tipo='Impressora'";
      $result = mysqli_query(OpenCon(), $sqli);
      while ($row = mysqli_fetch_array($result)) {
      echo "<option value='".$row['Fabricante']." ".$row['Nome']."'>".$row['Fabricante']." ".$row['Nome']."</option>";
      }

      echo '</select> <br><br>';


    }else{
      //<!--POST DO MODELO DE EQUIP = "modelo"-->      
 echo " <label for='modelo'>Modelo:</label><br>
  <input type='text' id='modelo' name='modelo'> 
  <br>
  <br>";
  echo '<label for="setor">Nota Fiscal em PDF:</label>
  <div class="formgroup container-fluid">
      <input type="file" id="file" name="file" accept=".pdf"/>
      <input type="hidden" name="MAX_FILE_SIZE" value="67108864"/> <!--64 MBs worth in bytes-->
  </div>
  <br>';
    }

  }
  
  ?>
 
 

 <input type="submit" name="submit" id="submit" class="button" value="Cadastrar"/>
 <br>
 
  </form>
  <?php
  echo "<form action='$menu'>";
  ?>
  <input type="submit" name="submit" id="submit" class="button" value="Menu"/>
  </form>
</body>
</html>