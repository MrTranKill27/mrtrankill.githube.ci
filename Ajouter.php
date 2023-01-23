<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($NOM) && isset($PRENOM) && isset ($TELEPHONE) && isset($EMAIL)){
                //connexion à la base de donnée
                include_once "connexion.php";
                //requête d'ajout
                $req = mysqli_query($con , "INSERT INTO partici VALUES(NULL, '$NOM', '$PRENOM','$TELEPHONE', '$EMAIL' )");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: index.php");
                }else {//si non
                    $message = "Participant non ajouté";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Ajouter un participant</h2>
        <p class="erreur_message">
            Veillez remplir tous les champs !
            <?php 
            // si la variable message existe , affichons son contenu
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action=" " method="post">
            <label>NOM</label>
            <input type="text" name="NOM">
            <label>PRENOM</label>
            <input type="text" name="PRENOM">
            <label>TELEPHONE</label>
            <input type="number" name="TELEPHONE">
            <label>EMAIL</label>
            <input type="text" name="EMAIL">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
</body>
</html>