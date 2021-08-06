<?php
	//ini_set('max_execution_time', 0); 
	/*FUNCTIONS*/

	function login()
	{
		if(isset($_SESSION['admin'])){
			return true;
		}else{
			return false;
		}
	}

	function set_flash($msg,$type)
	{
		$_SESSION['flash'] = "<div class='alert alert-".$type."'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$msg."</div>";
	}

	function flash()
	{
		if(isset($_SESSION['flash']))
		{
			echo $_SESSION['flash'];
			unset($_SESSION['flash']);
		}
	}

	function num_formats($n)
	{
		$l = strlen($n);
		if($l == 1){
			return "00".$n;
		}elseif ($n == 2) {
			return "0".$n;
		}else{
			return $n;
		}
	}

	function get_post($str)
	{
		return trim($_POST[$str]);
	}
?>