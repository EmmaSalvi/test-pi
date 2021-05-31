<!DOCTYPE html>
<html lang="fr">
<head>
    <title>PHP formulaire</title>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" media="all"/>

</head>
<body>


<h2>Votre formulaire à bien été envoyé</h2>

<div>
    <h3>Ci-dessous les informations que nous avons reçu : </h3>
    <p>Nom: <?php echo $_POST['name']; ?></p>
    <p>Mail : <?php echo $_POST['email']; ?></p>
    <p>Téléphone : <?php echo $_POST['phone']; ?></p>
    <?php
        // a mettre dans un fichier séparé
        if($_POST['topic'] === 'commandNoReceive') {
            $_POST['topic'] = "Commande non reçue";
        }
        if($_POST['topic'] === 'productNotConform') {
            $_POST['topic'] = "Produit non conforme";
        }
        if($_POST['topic'] === 'returnProduct') {
            $_POST['topic'] = "Retourner un produit";
        }
        if($_POST['topic'] === 'other') {
            $_POST['topic'] = "Autres";
        }
     ?>
    <p>Votre question concerne la thématique : <?php echo $_POST['topic']; ?></p>
    <p>Votre message : <?php echo $_POST['message']; ?></p>
</div>


</body>

</html>