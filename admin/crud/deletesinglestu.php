<?php include_once("includehead.php");?>
<?php 
	 
    if(isset($_REQUEST['id']) && isset($_REQUEST['sid'])){
            $id  = $fm->validation($_REQUEST['id']);
            $sid = $fm->validation($_REQUEST['sid']);

            if(empty($id) || empty($sid)){
                header("Location:../assignstudentsublist.php?id=$sid&err=ID not found!!");
            }else{    
				$delete ="DELETE FROM tbl_studentassign WHERE id = '$id';";
				$run = $db->delete($delete);
				if($run== true){
					header("Location:../assignstudentsublist.php?id=$sid&msg=Data Deleted successfully!!");
				}else{
					header("Location:../assignstudentsublist.php?id=$sid&err=Data not Deleted!!");
				}
            }

        }
    
?>