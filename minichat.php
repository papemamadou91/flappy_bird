<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>TP : Mini-chat !</title>
    </head>
     
        <style>
        form
        {
            text-align:center;
        }
        </style>
         
    <body>
         
        <form action="minichat_post.php" method="post">
            <p>
                <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /> </br>
                <label for="message">Message</label> :  <input type="text" name="message" id="message" /> </br>
                <input type="submit" value="Envoyer" />
            </p>
        </form>
         
        <?php
        // Connexion à la base de données
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=tests;charset=utf8', 'admin', 'password');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }
 
        // Récupération des 10 derniers messages
        $reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC             LIMIT 10');
 
        // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
        while ($donnees = $reponse->fetch())
        {
            echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
        }
 
        $reponse->closeCursor();
        ?>
         
    </body>
</html>
