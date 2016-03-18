<?php


function genereCode(){
    $characts   = '123456789012345678901234567890';
    $code_      = '';

    for($i=0;$i < 3;$i++)
    {
        $code_ .= substr($characts,rand()%(strlen($characts)),1);
    }

    $ch1   = '1234567890';
    $chit = substr($ch1,rand()%(strlen($ch1)),1);

   // $ch   = 'KKKBBB';
  //  $let= substr($ch,rand()%(strlen($ch)),1);

    return "C".$chit.$code_.strftime("%Y");
}

function upload_Images($infofic){
	 include "conf/_db_con.php";
	$mess="";
if (!empty($_FILES['photo_per']['size']))
		{
		
			// Testons si l'extension est autorisée
			//$infofic = pathinfo($_FILES['photo_per']['name']);
			$ext_upload = $infofic['extension'];
			$ext_aut = array('jpg', 'JPG', 'jpeg', 'JPEG','png', 'PNG' );
			if (in_array($ext_upload, $ext_aut))
			{
				//Renommer l'photo_per
				$ext = str_replace('.','',strstr(basename($_FILES['photo_per']['name']), '.'));
				
				
				$result = $mysqli->query("SELECT count(*) FROM personne") ;
				$cnt=  $result->fetch_row();

				$num=(intval($cnt[0])+1);
				
				$chemin_up="media_asset/images/img_per/img_ComSoft_".strftime("%Y%m%d%H%M%S").$num.'.'.$ext;
				
				
				//Chargement de l'image sur le serveur
				move_uploaded_file($_FILES['photo_per']['tmp_name'], "$chemin_up");
				
			}else
			{
				$chemin_up="format non autorisé <a href=\"\" onClick=history.back() >Reprendre</a>";
			}
		}else
		{
			$chemin_up="aucun image selectionner <a href=\"\" onClick=history.back() >Reprendre</a>";
		}
		return $chemin_up;
}

//date


function dateDiff($date1, $date2){
    $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
    $retour = array();
 
    $tmp = $diff;
    $retour['second'] = $tmp % 60;
	$nbseconde="";
	if($retour['second']!=0)
	$nbseconde=$retour['second']." Sec " ;
 
 
    $tmp = floor( ($tmp - $retour['second']) /60 );
    $retour['minute'] = $tmp % 60;
	$nbminuit="";
	if($retour['minute']!=0)
	$nbminuit= $retour['minute']." mn ";
 
    $tmp = floor( ($tmp - $retour['minute'])/60 );
    $retour['hour'] = $tmp % 24;
	$nbheure="";
	if($retour['hour']!=0)
	$nbheure=$retour['hour']." H ";
 
    $tmp = floor( ($tmp - $retour['hour'])  /24 );
	$retour['day'] = $tmp;
	
	//$tmp = floor( ($retour['day'])  /360 );
    //$retour['year'] = $tmp;
	$nbanne="";
 	if($retour['day']!=0){
 	$nbanne=(int)($retour['day']/360);
	$nbanne=$nbanne." ans";
	}
	$nbjour="";
	if($nbanne!=0){
	$nbjour=$retour['day']%360;
	$nbjour=$nbjour." jours";
	}

 	$chaine=$nbanne." ".$nbjour." ".$nbheure." ". $nbminuit." ".$nbseconde." ";
    return $chaine;
}

//
function datefr($date){
//0123456789
//2016-01-16 11:58:54
return substr($date,8,2)."/".substr($date,5,2)."/".substr($date,0,4)." à ".substr($date,11);
}
function datefr_h($date){
//0123456789
//2016-01-16 11:58:54
return substr($date,8,2)."/".substr($date,5,2)."/".substr($date,0,4);
}
?>