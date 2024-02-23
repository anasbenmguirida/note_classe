<?php
session_start() ; 
$connection=mysqli_connect("localhost" , "root" , "" , "note_classe") ; 
$sql="SELECT *FROM etudiants " ;
$result=mysqli_query($connection , $sql) ; 
if($result)
{
    echo "<form method='post' action=''>";
    echo "<table class='tableau'><tr><th>Identifiant</th><th>Prenom</th><th>NOm</th><th>Note</th></tr>";
    // afficher les données du tableau 
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row["num_exam"]."</td><td>".$row["prenom"]."</td><td>".$row["nom"]."</td>
        <td><input type='text' name='note[".$row["num_exam"]."]' value='".$row["note"]."'></td></tr>";
    }
    echo "</table><input type='submit' name='sauvegarde' class ='button2 'value='Sauvegarder les notes '></form>";

    // sauvegarder les notes dans la base de donner 
    if(isset($_POST["sauvegarde"]))
    // on a recue un tableau associative $_post['note'] qui a comme cle "num_exam" et valeurs sont les notes enreg
    {
        foreach ($_POST['note'] as $num_exam => $note)
        {
            $num_exam = mysqli_real_escape_string($connection, $num_exam);
            $note = mysqli_real_escape_string($connection, $note);
            $query = "UPDATE etudiants SET note='$note' WHERE num_exam='$num_exam'";
            $sauvegarde = mysqli_query($connection , $query) ;  
        }
        if($sauvegarde)
            {
                echo "<h2>votre modifications ont ete enregitres avec succes</h2>" ; 
            }
            else{
                echo "<h2>Veuillez resaisir les notes s'il vous plait</h2> " ;
            }
    }




} 
else {
    echo "pas de resultas trouuve !!!!";
}

?>
<link rel="stylesheet" href="style.css">


