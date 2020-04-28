<?php include_once("includehead.php");?>
<?php 
	 
    if(isset($_REQUEST['id']) && isset($_REQUEST['tid'])){
            $id  = $fm->validation($_REQUEST['id']);
            $tid = $fm->validation($_REQUEST['tid']);

            if(empty($id) || empty($tid)){
                header("Location:../assignteachersublist.php?id=$tid&err=ID not found!!");
            }else{    
				$delete ="DELETE FROM tbl_teacherassign WHERE id = '$id';";
				$run = $db->delete($delete);
				if($run== true){
					header("Location:../assignteachersublist.php?id=$tid&msg=Data Deleted successfully!!");
				}else{
					header("Location:../assignteachersublist.php?id=$tid&err=Data not Deleted!!");
				}
            }

        }
    
?>