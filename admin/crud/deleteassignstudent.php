<?php include_once("includehead.php");?>
<?php 
	 
    if(isset($_REQUEST['id'])){
            $id   = $fm->validation($_REQUEST['id']);

            if(empty($id)){
                header("Location:../assignstudentlist.php?err=ID not found!!");
            }else{ 
				$delete ="DELETE FROM tbl_studentassign WHERE student_id = '$id';";
				$run = $db->delete($delete);
				if($run== true){
					header("Location:../assignstudentlist.php?msg=Data Deleted successfully!!");
				}else{
					header("Location:../assignstudentlist.php?err=Data not Deleted!!");
				}
            }

        }
    
?>