<?php

var_dump($_POST);

// connection My sql

$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "meteon";

try    
{
    $bdd = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8', ''.$username.'', ''.$password.'');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
};

$mail=$_POST['mail'];

$reponse = $bdd->query('SELECT uti_nom, uti_prenom FROM utilisateur WHERE uti_mail="'.$mail.'";');


while ($donnees = $reponse->fetch()) 
    {
        
        mail($mail,"Mot de passe oublie","Voici ton mot de passe : $donnees[0]$donnees[1]");
           
    }

    $reponse->closeCursor();

//connexion bdd locale postgre sql
// $test = "host=localhost port=3306 dbname=meteon user=root password=admin";

// $connect = pg_connect($test);


// $mail=$_POST['mail'];

// $foo = pg_query("SELECT nom, prenom FROM utilisateur WHERE  mail='".$mail."';");
// $resultat = pg_fetch_array($foo);

// var_dump($foo);



// var_dump(mail($mail,"Mot de passe oublie","Voici ton mot de passe : $resultat[0]$resultat[1]"));

// pg_close($connect);
//bouton deconnexion


?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>

    <?php // echo "$resultat[0]$resultat[1]";
        echo "$donnees[0]$donnees[1]";

    ?>

</p>
</body>
</html>
