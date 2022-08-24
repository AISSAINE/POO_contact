<?php
spl_autoload_register (function ($class){
    include ('classes/'.$class.'.php');
    }); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajout contact</title>
</head>
<body>

    <a href="index.php">Retour à l'accueil</a>
    <h1> Créer un contact </h1>
<section>
    <form action="" method = "post">
        <input type="text" name="nom"  placeholder = "Votre nom">
        <br/><br/>
        <input type="text" name="prenom" placeholder = "Votre prenom">
        <br/><br/>
        <input type="email" name="email" placeholder = "Votre email">
        <br/><br/>
        <input type="submit" name="valider" value="Valider">
    </form>
</section>  
<?php
if (isset($_POST['valider'])) {
    if ((empty($_POST['nom'])) || (empty($_POST['prenom'])) || (empty($_POST['email']))) {
        echo $message = '<p class="msgRed">Veuillez remplir tous les champs</p>';
    } else {
        echo '<style> section {display: none; }</style>';

        $_POST['nom'];
        $_POST['prenom'];
        $_POST['email'];

        $lecontact = new Contact ();
        $lecontact -> setNom ($_POST['nom']);
        $lecontact -> setPrenom ($_POST['prenom']);
        $lecontact -> setEmail ($_POST['email']);

        $manager = new ContactManager ();
        $message = $manager -> CreatContact ($lecontact);
        echo '<p class="msgGreen">'.$message.'</p>';
    }
}
?>
</body>
</html>