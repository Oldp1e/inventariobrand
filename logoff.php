<?php 	
	session_start();
	if(is_null($_SESSION['online'])){
		header('Location: '.'/inventariobrand/login/index.html');
	}		
?>
    
<?php 
    session_unset();
    session_destroy();
    header('Location: '.'/inventariobrand/login/index.html');

?>