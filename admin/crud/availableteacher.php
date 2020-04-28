<?php include_once("includehead.php");?>
<?php 
	if(isset($_REQUEST['teacher_id'])){
		$id = $fm->validation($_REQUEST['teacher_id']);

		if($id!=""){
	        $query = "SELECT * FROM tbl_teacher WHERE employeid='$id' AND publication_status='1' ";
	        $red = $db->select($query);
	        if($red==true){
	        	$res = mysqli_fetch_assoc($red);
	        	$res = $res['id'];
	            echo $res;
	    	}
		}	
	}else{
		header("Location:../404.php");
	}
?>