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

        
  $sql = "DELETE FROM equipamentos WHERE ID='".$_POST['ID']."';";
  
  
  
        if (OpenCon()->query($sql) === TRUE) {
            echo "<p>
                <h2>DELETADO</h2>
                </p>";
            echo "<form action=$relatorio method='post'>
            <input type='submit' name='submit' id='submit' class='button' value='Voltar'>
        </form>";
        } else {
            echo "Erro: " . $sql . "<br>" . OpenCon()->error;
        }
    }






?>
<body>

<?php

if(isset($_POST['deletar'])){
    echo "<h1>Clique em confirmar para deletar este equipamento do Inventario</h2>";
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "inventario_brand");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

    $sql = "SELECT * FROM equipamentos WHERE ID=".$_POST['deletar']."";

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
                echo "<form action=$deletar method='post'>";
                echo "<input type='hidden' id='ID' name='ID' value='".$row['ID']."'/>";
                echo "<td id='lineAboveThick'>" . $row['ID'] .          "</td>";                
                echo "<td id='lineAboveThick'>" . $row['Tipo'] .        "</td>";
                echo "<td id='lineAboveThick'>" . $row['Modelo'] .      "</td>";
                echo "<td id='lineAboveThick'>" . $row['Setor'] .       "</td>";
                echo "<td id='lineAboveThick'>" . $row['Processador'] . "</td>";
                echo "<td id='lineAboveThick'>" . $row['Placa_mae'] .   "</td>";
                echo "<td id='lineAboveThick'>" . $row['GPU'] .         "</td>";
                echo "<td id='lineAboveThick'>" . $row['RAM'] .         "</td>";
                echo "<td id='lineAboveThick'>" . $row['MEM_FIS'] .     "</td>";
                echo "<td id='lineAboveThick'>" . $row['Nome_Maq'] .    "</td>";
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