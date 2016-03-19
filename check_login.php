<?php
session_start();
include_once 'model/config/connexion.php';
include ("model/entities/Personne.php");
include ("model/DAO/DAOPersonne.php");

$per=new DAOPersonne($db_instance);

if(isset($_POST['login']))
{
 $username = $_POST['username'];
 $password = $_POST['password'];

     $stmt=$db_instance->query("SELECT * FROM personne WHERE username='$username' AND password='$password'");
     $userRow=$stmt->fetch();
          
          if($userRow)
          {
                          
                $_SESSION['user_session'] = $userRow['id_per'];
                $_SESSION['login_session'] = $userRow['username'];
                $_SESSION['admin'] = $userRow['fonction'];


             }

  
  $per->redirect('profile.php');

}

// //login personne 
// if(isset($_POST['login']))
// {
//  $username = $_POST['username'];
//  $password = $_POST['password'];

//      $stmt=$per->login($username,$password);

//           $userRow=$stmt->fetch();
          
//           if($userRow)
//           {
             
                
//                 $_SESSION['user_session'] = $userRow['id_per'];
//                 $_SESSION['login_session'] = $userRow['username'];

//              }
//              else
//              {
//                     echo 'Mauvais identifiant ou mot de passe !';

//              }
          
  
//   $per->redirect('/conference/profile.php');

// }


?>