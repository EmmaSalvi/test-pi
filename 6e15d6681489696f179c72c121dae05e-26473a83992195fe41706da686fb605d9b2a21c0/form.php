<?php
session_start();

?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <title>PHP formulaire</title>
        <meta charset="UTF-8">
        <link href="style.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>


            <div class="jumbotron text-center">
                <h1>WCS quêtes : PHP formulaire</h1>
            </div>

            <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2>Nous contacter : </h2>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12">
                <?php if (array_key_exists('errors', $_SESSION)): ?>
                    <p>Alerte : erreur dans le formulaire</p>

                    <?= implode('<br>', $_SESSION['errors']); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <form action="validation.php" method="post">
                    <div class="form-group">
                        <label for="inputName">Nom :</label>
                        <input type="text" id="inputName" name="name" class="form-control"
                               value="<?php echo isset($_SESSION['inputs']['name']) ? $_SESSION['inputs']['name'] : ""; ?>" required>
                        <p class="error">
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Courriel :</label>
                        <input type="email" id="inputEmail" name="email" placeholder="courriel@lettre.com"
                               class="form-control"
                               value="<?php echo isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ""; ?>" required>
                        <p class="error">
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="inputPhone">Téléphone :</label>
                        <input type="tel" id="inputPhone" name="phone" class="form-control"
                               value="<?php echo isset($_SESSION['inputs']['phone']) ? $_SESSION['inputs']['phone'] : ""; ?>" required>
                        <p class="error">
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="topic">Merci de choisir une thématique</label> <br>
                        <select id="topic" name="topic">
                            <option value="choose">Thématique</option>
                            <option value="commandNoReceive"
                                <?php echo ((($_SESSION['inputs']['topic']) AND ($_SESSION['inputs']['topic']) === 'commandNoReceive') ? "selected" : ""); ?>> Commande non reçu</option>
                            <option value="productNotConform"
                                <?php echo ((($_SESSION['inputs']['topic']) AND ($_SESSION['inputs']['topic']) === 'productNotConform') ? "selected" : ""); ?>>Produit non conforme</option>
                            <option value="returnProduct"
                                <?php echo ((($_SESSION['inputs']['topic']) AND ($_SESSION['inputs']['topic']) === 'returnProduct') ? "selected" : ""); ?>>Retourner un produit</option>
                            <option value="other"
                                <?php echo ((($_SESSION['inputs']['topic']) AND ($_SESSION['inputs']['topic']) === 'other') ? "selected" : ""); ?>>Autres</option>
                        </select>

                        <br>
                    </div>
                    <div class="form-group">
                        <label for="inputMessage">Message :</label>
                        <textarea id="inputMessage" name="message" class="form-control"><?php echo isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : ""; ?></textarea>

                    </div>
                    <div class="form-group">
                        <button type="submit">Envoyer votre message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </body>

    </html>

<?php
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['errors']);

