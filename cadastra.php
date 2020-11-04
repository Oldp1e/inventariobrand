<html>
<head> </head>
<title> Inventario Brand </title>

<body>

<?php 
INCLUDE "pathing.php";
INCLUDE "$dblogin";

$pagina_atual = $_POST["pagina"];


//  CADASTRO DE EQUIPAMENTO
//_________________________________________________________________________________________________________
if(strcmp($pagina_atual, $cadastro_equip) == 0){
//POST DO SETOR = "setor"
//POST DO TIPO DE EQUIP = "tipo_equip"-
//POST DO MODELO DE EQUIP = "modelo"-
//POST DO FABRIC DE EQUIP = "fabricante"
//POST DO PROCESSADOR = "processador"
//POST DA PLACA MAE = "placa-mae" 
//POST DA PLACA DE VIDEO = "placa-de-video"
//POST DO DISCO/SSD = "disco"
//POST DE MODELO DE IMPRESSORA = "impressora_mod"
//POST DO NOME DA MAQUINA = "nome_maq"
  if(isset($_POST["tipo_equip_box"])){
    $tipo_equip = $_POST["tipo_equip_box"];
  }
  if(isset($_POST["modelo"])){
    $modelo = $_POST["modelo"];
  }
  if(isset($_POST["setor"])){
    $setor = $_POST["setor"];
  }
  if(isset($_POST['processador'])){
    $processador = $_POST['processador'];
  }
  if(isset($_POST['placa-mae'])){    
  $placa_mae = $_POST['placa-mae'];    
  }
  if(isset($_POST['placa-de-video'])){
    $placa_video = $_POST['placa-de-video'];
  }
  if(isset($_POST['memoria'])){
    $memoria = $_POST['memoria'];
  }
  if(isset($_POST['disco'];)){
    $disco = $_POST['disco'];
  }
  if(isset($_POST['impressora_mod'])){    
  $modelo_impressora = $_POST['impressora_mod'];
  }
  if(isset($_POST['nome_maq'])){
    $nome_maq = $_POST['nome_maq'];
  }






  if(isset($tipo_equip)){

    if(strcmp($tipo_equip, "Notebook") == 0 || strcmp($tipo_equip, "Computador") == 0){
    $sql = "INSERT INTO equipamentos (Tipo, Modelo, Setor, Processador, Placa_mae, GPU, RAM, MEM_FIS, Nome da Máquina) 
    VALUES ('$tipo_equip','$modelo','$setor','$processador','$placa_mae','$placa_video','$memoria','$disco','$nome_maq')";
      
    }else if(strcmp($tipo_equip, "Impressora") == 0){

      $sql = "INSERT INTO equipamentos (Tipo, Modelo, Setor) 
    VALUES ('$tipo_equip','$modelo_impressora','$setor')";

    }
    
  
  
  
  
  
  
  
  
  
  
  
  
  
  }

  
  
  
  if (OpenCon()->query($sql) === TRUE) {
    echo "<p>
        <h2>Informações do equipamento cadastradas</h2>
        </p>";
    echo "<form>
    <input type='button' value='Voltar' onclick='history.back()'>
   </form>";
  } else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
  }

}
//_________________________________________________________________________________________________________

// CADASTRO DE SETORES
//_________________________________________________________________________________________________________
if(strcmp($pagina_atual, $cadastro_setor) == 0)
{

  $setor = $_POST["setor"];
  
  $sql = "INSERT INTO setores (Setor)
  VALUES ('$setor')";
  
  
  
  if (OpenCon()->query($sql) === TRUE) {
    echo "<p>
        <h2>Informações do setor cadastradas</h2>
        </p>";
    echo "<form>
    <input type='button' value='Voltar' onclick='history.back()'>
   </form>";
  } else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
  }


}
//_________________________________________________________________________________________________________

// CADASTRO DE TIPOS DE COMPONENTES
//_________________________________________________________________________________________________________
if(strcmp($pagina_atual, $cadastro_tipos_comp) == 0)
{

  $tipo_comp = $_POST["tipo_comp"];
  
  $sql = "INSERT INTO tipos_comp (Nome)
  VALUES ('$tipo_comp')";
  
  
  
  if (OpenCon()->query($sql) === TRUE) {
    echo "<p>
        <h2>Informações do tipo de componente cadastradas</h2>
        </p>";
    echo "<form>
    <input type='button' value='Voltar' onclick='history.back()'>
   </form>";
  } else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
  }


}
//_________________________________________________________________________________________________________


// CADASTRO DE TIPOS DE EQUIP
//_________________________________________________________________________________________________________
if(strcmp($pagina_atual, $cadastro_tipos_equip) == 0)
{

  $tipo_equip = $_POST["tipo_equip"];
  
  $sql = "INSERT INTO tipos_equip (Nome)
  VALUES ('$tipo_equip')";
  
  
  
  if (OpenCon()->query($sql) === TRUE) {
    echo "<p>
        <h2>Informações do tipo de equipamento cadastradas</h2>
        </p>";
    echo "<form>
    <input type='button' value='Voltar' onclick='history.back()'>
   </form>";
  } else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
  }


}
//_________________________________________________________________________________________________________

// CADASTRO DE MODELOS DE COMPONENTES
//_________________________________________________________________________________________________________
if(strcmp($pagina_atual, $cadastro_modelos_comp) == 0)
{

  $tipo_mod = $_POST["tipo_comp_mod"];
  if(isset($_POST["capacidade"])){
    $capacidade = $_POST["capacidade"] . " " . $_POST["unidade"];
  }
  
  $modelo = $_POST["modelo"];
  $fabricante = $_POST["fabricante"];
  
  if(isset($capacidade)){
    $sql = "INSERT INTO modelos_comp (Nome, Fabricante, Tipo, Capacidade)
    VALUES ('$modelo','$fabricante','$tipo_mod','$capacidade')";
  } else{
    $sql = "INSERT INTO modelos_comp (Nome, Fabricante, Tipo, Capacidade)
    VALUES ('$modelo','$fabricante','$tipo_mod','N/A')";
  }

  
  
  
  if (OpenCon()->query($sql) === TRUE) {
    echo "<p>
        <h2>Informações de modelo de componente cadastradas</h2>
        </p>";
    echo "<form>
    <input type='button' value='Voltar' onclick='history.back()'>
   </form>";
  } else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
  }


}
//_________________________________________________________________________________________________________





?>


</body>
</html>