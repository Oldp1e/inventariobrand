<html>
<head>
<?php 	
	session_start();
	if(is_null($_SESSION['online'])){
		header('Location: '.'/inventariobrand/login/index.html');
	}		
	?>
<style type="text/css">
#lineAboveThick {
    border-style: solid;
    border-width: 2px;
    text-align: center;
}
#lineAboveThin {
    border-style: solid;
    border-width: 2px;
    text-align: center;
}
#lineBelowThick {
    border-style: solid;
    border-width: 2px;
    text-align: center;
}
table {
    border-collapse: collapse;
}
th {
    border-style: solid;
    border-width: 2px;
    text-align: center;
}
</style>






</head>
<title> Inventario Brand </title>



<?php
INCLUDE "pathing.php"; 
INCLUDE $dblogin ;

    if(isset($_POST['ID'])){

        
  $sql = "UPDATE equipamentos SET Tipo='".$_POST['Tipo']."', Modelo='".$_POST['Modelo']."', Setor='".$_POST['Setor']."', 
  Processador='".$_POST['Processador']."', Placa_mae='".$_POST['Placa_mae']."', GPU='".$_POST['GPU']."', RAM='".$_POST['RAM']."',
  MEM_FIS='".$_POST['MEM_FIS']."', Nome_Maq='".$_POST['Nome_Maq']."' WHERE ID='".$_POST['ID']."';";
  
  
  
        if (OpenCon()->query($sql) === TRUE) {
            echo "<p>
                <h2>Informações do setor alteradas</h2>
                </p>";
            echo "<form>
            <input type='button' value='Voltar' onclick='history.back()'>
        </form>";
        } else {
            echo "Erro: " . $sql . "<br>" . OpenCon()->error;
        }
    }






?>
<body>

<?php

if(isset($_POST['alterar'])){
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "inventario_brand");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

    $sql = "SELECT * FROM equipamentos WHERE ID=".$_POST['alterar']."";

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
        echo '<col width="80">
        <col width="140">
        <col width="140">
        <col width="140">
        <col width="140">
        <col width="140">
        <col width="140">
        <col width="140">
        <col width="140">';
            echo "<tr>";
                echo "<th> ID </th>";
                echo "<th> Tipo </th>";
                echo "<th> Modelo </th>";
                echo "<th> Setor </th>";
                echo "<th> Processador </th>";
                echo "<th> Placa Mae </th>";
                echo "<th> GPU </th>";
                echo "<th> RAM  </th>";
                echo "<th> Memoria Fisica </th>";
                echo "<th> Nome da Maquina </th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<form action=$alterar method='post'>";
                echo "<input type='hidden' id='ID' name='ID' value='".$row['ID']."'/>";
                echo "<td id='lineAboveThick'>" . $row['ID'] . "</td>";                
                echo "<td id='lineAboveThick'><input type='text' id='Tipo' name='Tipo' value='" . $row['Tipo'] . "'></td>";
                echo "<td id='lineAboveThick'><input type='text' id='Modelo' name='Modelo' value='" . $row['Modelo'] . "'></td>";
                echo "<td id='lineAboveThick'><input type='text' id='Setor' name='Setor' value='" . $row['Setor'] . "'></td>";
                echo "<td id='lineAboveThick'><input type='text' id='Processador' name='Processador' value='" . $row['Processador'] . "'></td>";
                echo "<td id='lineAboveThick'><input type='text' id='Placa_mae' name='Placa_mae' value='" . $row['Placa_mae'] . "'></td>";
                echo "<td id='lineAboveThick'><input type='text' id='GPU' name='GPU' value='" . $row['GPU'] . "'></td>";
                echo "<td id='lineAboveThick'><input type='text' id='RAM' name='RAM' value='" . $row['RAM'] . "'></td>";
                echo "<td id='lineAboveThick'><input type='text' id='MEM_FIS' name='MEM_FIS' value='" . $row['MEM_FIS'] . "'></td>";
                echo "<td id='lineAboveThick'><input type='text' id='Nome_Maq' name='Nome_Maq' value='" . $row['Nome_Maq'] . "'></td>";
                echo '<br>';
                echo '<input type="submit" name="submit" id="submit" class="button" value="Confirmar"/>';
                echo '<br>';

                echo "</form>";
            echo "</tr>";
            echo '<br>';
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "Não há resultados para a busca.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);




}

?>

<br>
<?php
  echo "<form action='$menu'>";
  ?>
  <input type="submit" name="submit" id="submit" class="button" value="Menu"/>
  </form>


</body>
</html>