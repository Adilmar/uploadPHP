<?php

//Adilmar C Dantas



//se existir o arquivo
if(isset($_FILES["arquivo"])){

$arquivo = $_FILES["arquivo"];

$pasta_dir = "arquivos/";//diretorio dos arquivos
//se não existir a pasta ele cria uma
if(!file_exists($pasta_dir)){
mkdir($pasta_dir);
}

$arquivo_nome = $pasta_dir . $arquivo["name"];

// Fazendo a conexão com o servidor MySQL
$conexao = mysql_pconnect("localhost","root","") or die($msg[0]);
mysql_select_db("fotos",$conexao) or die($msg[1]);

$query1 = mysql_query("INSERT INTO imagem(foto) values('$arquivo_nome')");


// Faz o upload da imagem
move_uploaded_file($arquivo["tmp_name"], $arquivo_nome);

$msg[0] = "Conexão com o banco falhou!";
$msg[1] = "Não foi possível selecionar o banco de dados!";




}

?>
