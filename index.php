<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement Simplon Côte d'Ivoire</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

    <div class="contrainer">
        <a href="Ajouter.php" class="Btn_add"> <img src="images/plus.png"> Ajouter</a>
       
        <table>
            <tr id="items">
                <th>NOM</th>
                <th>PRENOM</th>
                <th>TELEPHONE</th>
                <th>EMAIL</th>
            </tr>
            <?php 
                //inclure la page de connexion
                include_once "connexion.php";
                //requête pour afficher la liste des Participants
                $req = mysqli_query($con , "SELECT * FROM partici");
                if(mysqli_num_rows($req) == 0){
                    //s'il n'existe pas de participants dans la base de donné , alors on affiche ce message :
                    echo "Il n'y a pas encore de participant ajouter !" ;
                    
                }else {
                    //si non , affichons la liste de tous les participants
                    while($row=mysqli_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['NOM']?></td>
                            <td><?=$row['PRENOM']?></td>
                            <td><?=$row['TELEPHONE']?></td>
                            <td><?=$row['EMAIL']?></td>
                            <!--Nous alons mettre l'id de chaque participants dans ce lien -->
                        </tr>
                        <?php
                    }
                }
            ?>
            
        </table>
    </div> 
</body>
</html>