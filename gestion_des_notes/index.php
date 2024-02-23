<?php 
session_start() ; 
// connexion a la base de donne 
if($_SERVER["REQUEST_METHOD"]=="POST")
{
   $connection=mysqli_connect("localhost" , "root" , "" , "note_classe") ; 
   if($connection)
   {
        if(isset($_POST["btn_1"]) && !empty($_POST["email_prof"]) && !empty($_POST["pass_prof"]) )
        {
           $email=$_POST["email_prof"] ; 
           $pass=$_POST["pass_prof"] ; 
           // verfification de inputs 
           $sql="SELECT *FROM professeur where mail='".$email."' " ;
           $res=mysqli_query($connection , $sql) ; 
           if($res)
           {
                $row=mysqli_fetch_assoc($res) ; 
                if(($pass==$row["mot_de_passe"] ))
                {
                    // stockez l'email et le mot de passe dans la session
                    $_SESSION["mail"]=$email ; 
                    $_SESSION["password"]=$pass ; 
                    header("location:insert_note.php") ; 
                }
                else{
                    echo "votre mot de pass est incorrecte" ; 
                }
            } 
            echo"cher professeur veuillez entrer une addresse mail valid !!!" ; 

        }
        // partie verification pour l'eudiant : 
            if(isset($_POST["btn_2"]) && !empty($_POST["email_etudiant"]) && !empty($_POST["pass_etudiant"]) )
        {
           $email_2=$_POST["email_etudiant"] ; 
           $pass_2=$_POST["pass_etudiant"] ; 
           // verfification de inputs 
           $sql="SELECT *FROM etudiants where email='".$email_2."' " ;
           $res=mysqli_query($connection , $sql) ; 
           if($res)
           {
                $row=mysqli_fetch_assoc($res) ; 
                if(($pass_2==$row["mot_de_passe"] ))
                {
                    // stockez l'email et le mot de passe dans la session
                    $_SESSION["mail_2"]=$email_2 ; 
                    $_SESSION["password_2"]=$pass_2 ; 
                    header("location:voir_note.php") ; 
                }
                else{
                    echo "votre mot de pass est incorrecte" ; 
                }
            } 
            echo"chere etudiant veuillez entrer une addresse mail valid !!!" ; 

        }
    }

}


?>

