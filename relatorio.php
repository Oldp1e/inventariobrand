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
echo "<form action='$relatorio' method='post'>";
 ?>
  <label for="setor">PESQUISAR:</label><br>
  <input type="text" id="pesquisa" name="pesquisa">
  <input type="submit" name="submit" id="submit" class="button" value="Pesquisa"/>
  </form>






<body>
<?php


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "inventario_brand");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
if(isset($_POST["pesquisa"])){
    if(strcmp($_POST["pesquisa"], '') == 0){
        $sql = "SELECT * FROM equipamentos";
    }else{
        $searchQuery = $_POST["pesquisa"];
        $sql = "SELECT * FROM equipamentos WHERE ID LIKE '%$searchQuery%' OR Tipo LIKE '%$searchQuery%' OR Modelo LIKE '%$searchQuery%' OR Setor LIKE '%$searchQuery%' OR
        Processador LIKE '%$searchQuery%' OR Placa_mae LIKE '%$searchQuery%' OR GPU LIKE '%$searchQuery%' OR RAM LIKE '%$searchQuery%' OR MEM_FIS LIKE '%$searchQuery%' OR
        Nome_Maq LIKE '%$searchQuery%'";
    }
}else{
    $sql = "SELECT * FROM equipamentos";
}


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
                echo "<th> Patrimonio </th>";
                echo "<th> Tipo </th>";
                echo "<th> Modelo </th>";
                echo "<th> Setor </th>";
                echo "<th> Processador </th>";
                echo "<th> Placa Mae </th>";
                echo "<th> GPU </th>";
                echo "<th> RAM  </th>";
                echo "<th> Memoria Fisica </th>";
                echo "<th> Nome da Maquina </th>";
                echo "<th> Usuario </th>";
                echo "<th> Nota Fiscal </th>";
                echo "<th>  Alterar </th>";
                echo "<th>  Deletar </th>";
                
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td id='lineAboveThick'>" . $row['ID'] . "</td>";
                echo "<td id='lineAboveThick'>" . $row['Tipo'] . "</td>";
                echo "<td id='lineAboveThick'>" . $row['Modelo'] . "</td>";
                echo "<td id='lineAboveThick'>" . $row['Setor'] . "</td>";
                echo "<td id='lineAboveThick'>" . $row['Processador'] . "</td>";
                echo "<td id='lineAboveThick'>" . $row['Placa_mae'] . "</td>";
                echo "<td id='lineAboveThick'>" . $row['GPU'] . "</td>";
                echo "<td id='lineAboveThick'>" . $row['RAM'] . "</td>";
                echo "<td id='lineAboveThick'>" . $row['MEM_FIS'] . "</td>";
                echo "<td id='lineAboveThick'>" . $row['Nome_Maq'] . "</td>";
                echo "<td id='lineAboveThick'>" . $row['Usuario'] . "</td>";
                echo "<td id='lineAboveThick'><a href='./document/".$row['NOTA_FIS']."'>".$row['NOTA_FIS']."</a></td>";
                echo '<td id="lineAboveThick">
                <br>
                <form action='.$alterar.' method="post">     
                <input type="hidden" id="alterar" name="alterar" value="'.$row["ID"].'"/>          
                <input type="submit" name="submit" id="submit" class="button" value="Alterar"/>
                </form>
                </td>';
                echo '<td id="lineAboveThick">
                <br>               
                <form action="'.$deletar.'" method="post">      
                <input type="hidden" id="deletar" name="deletar" value="'.$row["ID"].'"/>         
                <input type="submit" name="submit" id="submit" class="button" value="Deletar"/>
                </form>
                </td>';
            echo "</tr>";
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
?>

<br>
<?php
  echo "<form action='$menu'>";
  ?>
  <input type="submit" name="submit" id="submit" class="button" value="Menu"/>
  </form>


</body>
</html>