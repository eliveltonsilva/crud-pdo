<?php 

try{
    $pdo = new PDO('mysql:host=localhost;dbname=bd', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*salvar no banco*/
    $stmt = $pdo->prepare('INSERT INTO clientes (nome, idade) VALUES (:nome, :idade)');
    $stmt->execute(array(
        ':nome' => 'Fulano2',
        ':idade' => '26'
    ));
    
    echo $stmt->rowCount() . '<br/>';

    $id = 1;
    $nome = "Fulano2";
    $idade = 12;

    /*update no banco*/
    $stmt = $pdo->prepare("UPDATE clientes SET nome = :nome, idade = :idade WHERE id = :id");
    $stmt->execute(array(
        ':nome' => $nome,
        ':idade' => $idade,
        ':id' => $id
    ));

    /*update no banco*/
    $stmt = $pdo->prepare("DELETE FROM clientes WHERE id = :id");
    $stmt->execute(array(
        ':id' => 1
    ));

    /*select no banco*/
    $consult = $pdo->query("SELECT * FROM clientes");
    while($line = $consult->fetch(PDO::FETCH_ASSOC)){
        echo "Id: {$line['id']} - Nome: {$line['nome']} - Idade: {$line['idade']}<br/>";
    }

}catch(PDOException $e){
    echo 'Error: ' . $e->getMessage();
}
 ?>