<?php
session_start() ; 
$connection=mysqli_connect("localhost" , "root" , "" , "note_classe") ; 
   if($connection)
   {
      $query ="SELECT *from etudiants where email='".$_SESSION["mail_2"]."' " ;
      $res=mysqli_query($connection , $query) ; 
      if($res)
      {
        $row=mysqli_fetch_assoc($res) ; 
      }
   } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>note</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="titre">
    <h2><?php echo "bienvenue {$row["nom"]} {$row["prenom"]}"?></h2>
</div>
 <div class="wrapper">
    <form action="" method="post">

    <label class="text">NOM : </label><br>
    <input class="inputbox" type="text" readonly value="<?php echo $row["nom"]?>"><br>
    
    <label class="text">PRENOM : </label><br>
    <input class="inputbox" type="text" readonly value="<?php echo $row["prenom"]?>"><br>
    
    <label class="text">NOTE EXAMEN : </label><br>
    <input class="inputbox" type="text" readonly value="<?php echo $row["note"]?>"><br>
    <input type="submit" class="bouton" name="deconnexion" value="Deconnexion">
   </form>
 </div>

   <?php
   if(isset($_POST["deconnexion"]))
   {
    session_destroy() ; 
    header("location:index.html") ; 
   }
   ?>

</body>
</html>