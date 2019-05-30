<?php 

	session_start();
	

	$wiek = $_POST["wiek"];
	$plec = $_POST["plec"];
	$tematy = $_POST['temat'];

    
   
	
    if($wiek && $plec && $tematy){
	require_once "connect.php";
	try{
		$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else{

					if(!$polaczenie->query("INSERT INTO survey VALUES (
						NULL, '$wiek', '$plec', '$tematy')")){
							throw new Exception($polaczenie->error);
                        }
                        else
                             $_SESSION['ankieta'] = true;
				$polaczenie->close();
            }
            
            header('Location: index.php');
	}
	catch(Exception $e){
		echo '<span style="color:rgb(235, 52, 20);">Błąd serwera! Przepraszamy za niedogodności i prosimy o wysłanie wiadomości w innym terminie!</span>';
		echo '<br />Informacja developerska: '.$e;
    }
}
?>