<?php
    ob_start();
    ini_set('display_errors','1');
	include "../lib/Session.php";
	Session::checkSession();
?>
<?php
	include "../lib/Database.php";
	include "../helpers/Format.php";
?>
<?php
	$db = new Database();
	$fm = new Format();
?>
<?php 
	 
    if(isset($_REQUEST['prosubmit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
            $username  = $fm->validation($_POST['username']);
            $mobile    = $fm->validation($_POST['mobile']);

			$auth = Session::get("attuserauth");
			$id   = Session::get("attuserId");

            if(empty($username) || empty($mobile)){
                header("Location:../editprofile.php?err=Feild must not be empty!!");
            }else{    
				$update ="UPDATE tbl_user 
						SET
						username = '$username',
						mobile   = '$mobile'
						WHERE id = '$id' AND auth = '$auth'
						";
				$run = $db->update($update);
				if($run== true){
					header("Location:../editprofile.php?msg=Data updated successfully!!");
				}else{
					header("Location:../editprofile.php?err=Data not updated!!");
				}
            }

        }
    
?>