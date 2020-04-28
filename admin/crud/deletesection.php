<?php include_once("includehead.php");?>
<?php 
	 
    if(isset($_REQUEST['id'])){
            $id  = $fm->validation($_REQUEST['id']);

            if(empty($id)){
                header("Location:../sectionlist.php?err=ID not found!!");
            }else{    
				$delete ="DELETE FROM tbl_section WHERE id = '$id';";
				$run = $db->delete($delete);
				if($run== true){
					header("Location:../sectionlist.php?msg=Data Deleted successfully!!");
				}else{
					header("Location:../sectionlist.php?err=Data not Deleted!!");
				}
            }

        }
    
?>