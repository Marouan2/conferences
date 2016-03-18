<?php
/**
 * Created by PhpStorm.
 * User: samih
 * Date: 06/03/16
 * Time: 13:21
 */

include_once 'conf/_db_con.php';
include_once 'Personne.php';
include_once'Conference.php';
include_once'conf/_fonction.php';
$pers = new Personne($db_instance);

$conf=new Conference($db_instance);
$res=$conf->ajoutConference(genereCode()," gestion des base no SQL"," aucin",1,3,"innactive");
/*$res=$pers->create("F","Fatou", "Idrissa",  "fat@yahoo.fr", "0765874323", "Enseignant chercheur", strftime('%Y-%m-%d'), "encours" );
  */  if($res)
    {
        echo "Inser c fait";

    }
    else
    {
        echo " insert erreur c pas fait";
    }

echo "<br>================by id 2=======================<br><br>";

$rows=$conf->rechercheConference(2);

  echo $rows['id_con']."<br>";
echo $rows['libelle_con']."<br>";

echo "<br>================All===========================<br><br>";

    $stmt=$conf->listeConference();

while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
    echo $row['id_con']." | ";
    echo $row['libelle_con']." | ";
    echo $row['code_con']."<br>";
}
echo "<br>================update 4===========================<br><br>";


$res=$conf->modifierConference(1,"fdddddddddddddddd"," aucin",6,3,"innactive");
if($res)
{
    echo "update c fait";

}
else
{
    echo " update erreur c pas fait";
}


$res=$conf->supprimerConference(10);
if($res)
{
    echo "Delete c fait";

}
else
{
    echo " Delete erreur c pas fait";
}

echo "<br>================All after update and delete 1===========================<br><br>";

$stmt=$conf->listeConference();

while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
    echo $row['id_con']." | ";
    echo $row['libelle_con']." | ";
    echo $row['code_con']."<br>";
}
?>
