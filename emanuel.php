<?php
//variables

    $name = 'abdel';
    $lastname = 'aouini';
    $birth = '1999-12-21';

//connexion a la basde de donnees

    $base = new PDO('mysql:host=127.0.0.1; dbname=atelier', 'root', '');
//sql qui sera executé

    $sql = 'insert into user (u_name, u_lastname, u_birth) values(:name, :lastname, :birth)';

//prepare la recquette a etre execute

    $sth = $base->prepare($sql);
//    proteger les donnees que l'on insere

    $sth->bindParam(':name',$name, PDO::PARAM_STR);
    $sth->bindParam(':lastname',$lastname, PDO::PARAM_STR);
    $sth->bindParam(':birth',$birth, PDO::PARAM_STR);

//    executer la requette

    $sth->execute();
    $sql = 'select u_id, u_name, u_lastname, u_birth from user';
    $sth = $base->prepare($sql);
    $sth->execute();
//    le resultat de ma requette est stocke dans la variable users
    $users = $sth->fetchAll(PDO::FETCH_ASSOC);
    ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>liste des personne </h1>
<?php
foreach ($users as $user){

?>
    <p>Nom : <?php echo $user['u_name']; ?> Prenom : age : </p>
<?php
}
?>
</body>
</html>
