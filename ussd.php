<?php
date_default_timezone_set("Africa/Nairobi"); 

//set connection to db

include('connection.php');
$TransId =$_GET["TransId"];
$RequestType=$_GET["RequestType"];
$MSISDN=$_GET["MSISDN"];
$SHORTCODE=$_GET["SHORTCODE"];
$AppId=$_GET["AppId"];
$USSDString=$_GET["USSDString"];


$sql ="INSERT in myteam(TransId,RequestType,MSISDN,SHORTCODE,AppId,USSDString) values('$TransId','$RequestType','$MSISDN','$SHORTCODE','$AppId','$USSDString')";

switch ($RequestType) {
	case 1:
		$message "Welcome to Myteam\n";
		$sql ="SELECT * from ussd where status=1";
		$query =mysqli_query($mysqli);
		while ($tab=mysqli_fetch_array($query)) {
			$message=$tab['partcipant_id']."$tab['name']." \n;
		}
		echo "&TransId=".$TransId."&RequestType=2&MSISDN=".$MSISDN."&AppId=".$AppId."&USSDString=".$message."&TypeofMessage=0online ";
		break;
		case 2:
		//check balance
		$balance= check_balance($MSISDN);
		//check if balance is sufficient
		$sql ="SELECT count(*) as isa from participant where participant_id="$details[2]."and status=1";
		$query=mysqli_query($mysqli);
		$tab=mysqli_fetch_array($query);
		if ($tab['isa']==0) {
			$message =$details[2]."is not in the list";
		}else{
			if ($balance>0) {
				change_balance($MSISDN, -1);
				$sql="UPDATE participant set point +1 where participant_id= ".$details[2];
				mysqli_query($mysqli);
				$message="You have succesfully voted for %".$details[2]."Thankyou";
				$sms ="Thank%20you%for%20your%vote";
				else{
					$message ="you do not have enough balance, plesea recharge";
				}
			}
		}
}
?>