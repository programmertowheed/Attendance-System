<?php include_once("includehead.php");?>
<?php 
	 
    if(isset($_REQUEST['id'])){
            $id   = $fm->validation($_REQUEST['id']);

            if(empty($id)){
                header("Location:../assignteacherlist.php?err=ID not found!!");
            }else{ 
				$delete ="DELETE FROM tbl_teacherassign WHERE teacher_id = '$id';";
				$run = $db->delete($delete);
				if($run== true){
					header("Location:../assignteacherlist.php?msg=Data Deleted successfully!!");
				}else{
					header("Location:../assignteacherlist.php?err=Data not Deleted!!");
				}
            }

        }
    
?>