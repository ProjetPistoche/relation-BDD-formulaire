<?php
 //récupérer les données venant de formulaire
   $mail=isset($_POST["mail"])? $_POST["mail"]:"";
   $mdp= isset($_POST["mdp"])? $_POST["mdp"] : "";
   $comf= isset($_POST["comf"])? $_POST["comf"] : "";
   $prenom= isset($_POST["prenom"])? $_POST["prenom"] : "";
   $nom= isset($_POST["nom"])? $_POST["nom"] : "";
   $adresse1= isset($_POST["adresse1"])? $_POST["adresse1"] : "";
   $adresse2= isset($_POST["adresse2"])? $_POST["adresse2"] : "";
   $ville= isset($_POST["ville"])? $_POST["ville"] : "";
   $codep= isset($_POST["codep"])? $_POST["codep"] : "";
   $pays= isset($_POST["pays"])? $_POST["pays"] : "";
   $numero= isset($_POST["tel"])? $_POST["tel"] : "";
   $type= isset($_POST["type"])? $_POST["type"] : "";
   $numcarte= isset($_POST["numcarte"])? $_POST["numcarte"] : "";
   $nomcarte= isset($_POST["nomcarte"])? $_POST["nomcarte"] : "";   
   $date= isset($_POST["date"])? $_POST["date"] : "";
   $code= isset($_POST["code"])? $_POST["code"] : "";

  //identifier votre BDD
   $database = "projet"; 
 
 //connectez-vous de votre BDD
   $db_handle = mysqli_connect('localhost', 'root', '');
   $db_found = mysqli_select_db($db_handle, $database); 

   if (isset($_POST['button'])) {
       if ($db_found) {
           $sql = "SELECT * FROM inscription";
               if ($nom != "") {
                    $sql .= " WHERE Nom LIKE '%$nom%'";
                         if ($prenom != "") {
                               $sql .= " AND Prenom LIKE '%$prenom%'";
                            }
                       }
              $result = mysqli_query($db_handle, $sql); 
 
   if (mysqli_num_rows($result) != 0) {
        echo "Cet utilisateur existe déjà, veuillez en creer un nouveau";
            }
             else {
                  $sql = "INSERT INTO inscription(Mail, Nom, Prenom, Adresse1, Adresse2, Ville, Code Postal, Pays, Numero, Type, Numcarte, Nomcarte, Datexp, Codesec, Mdp, Comf)
                        VALUES('$mail','$nom','$prenom','$adresse1','$adresse2','$ville','$codep','$pays','$numero','$type','$numcarte','$nomcarte','$date','$code','$mdp','$comf')";
                         $result = mysqli_query($db_handle, $sql);
                    echo "Add successful. <br>";
                   }
            }
        }       
?>