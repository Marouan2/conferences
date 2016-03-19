<?php
include_once 'conf/_db_con.php';
include_once 'Personne.php';
include_once'Conference.php';
include_once'conf/_fonction.php';

$db = new PDO('mysql:host=localhost;dbname=conference', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.
$pers = new Personne($db);

$conf=new Conference($db);
$res=$conf->ajoutConference(" gestion des base no SQL"," aucin","djjdjk","jkjkjkkj","innactive");

   if($res)
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


$res=$conf->modifierConference(1,"fdddddddddddddddd"," aucin","hhhhjajh","klklkl","innactive");
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
