<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>TP : Mini-chat !</title>
    </head>
 
    <body>
 
        <?php
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
                die('Erreur : '.$e->getMessage());
        }
         
        //Récupération des données du formulaire et du dernier id
        $pseudo = $_POST['pseudo'] ;
        $message = $_POST['message'] ;
         
        $reponse = $bdd->query('SELECT ID FROM minichat ORDER BY ID DESC LIMIT 0, 1');
 
        while ($donnees = $reponse->fetch())
        {
            $id = $donnees['ID'];
        }
 
        // Insertion du message dans la base de données
        $req = $bdd->prepare('INSERT INTO minichat(id, pseudo, message) VALUES(:id, :pseudo, :message)');
        $req->execute(array(
            'id' => $id + 1,
            'pseudo' => $pseudo,
            'message' => $message,
            ));
     
        header('Location: minichat.php');
        ?>
 
    </body>
</html>
