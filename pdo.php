<?php 

try{
    $pdo = new PDO('mysql:host=localhost;dbname=bd', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*salvar no banco*/
    $stmt = $pdo->prepare('INSERT INTO clientes (nome, idade) VALUES (:nome, :idade)');
    $stmt->execute(array(
        ':nome' => 'Fulano',
        ':idade' => '26'
    ));

    $stmt = $pdo->prepare("SELECT * FROM clientes");
    echo $stmt->rowCount();
}catch(PDOException $e){
    echo 'Error: ' . $e->getMessage();
}
 ?>