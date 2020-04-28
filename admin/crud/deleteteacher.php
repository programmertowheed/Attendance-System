<?php include_once("includehead.php");?>
<?php 
	 
    if(isset($_REQUEST['id'])){
            $id  = $fm->validation($_REQUEST['id']);

            if(empty($id)){
                header("Location:../teacherlist.php?err=ID not found!!");
            }else{    
				$delete ="DELETE FROM tbl_teacher WHERE id = '$id';";
				$run = $db->delete($delete);
				if($run== true){
					header("Location:../teacherlist.php?msg=Data Deleted successfully!!");
				}else{
					header("Location:../teacherlist.php?err=Data not Deleted!!");
				}
            }

        }
    
?>