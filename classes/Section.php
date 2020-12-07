<?php

/**
 * Section class
 */
class Section extends Controller{
	
	public $msg = array();

	function __construct(){
		parent::__construct();
	}

	public function getSection(){
		$query = "SELECT * FROM tbl_section WHERE publication_status='1' ORDER BY id ASC";
  	$red = $this->db->select($query);
  	return $red;
	}


	public function getAllSection(){
		$query = "SELECT * FROM tbl_section ORDER BY id ASC";
    $red = $this->db->select($query);
    return $red;
	}
	

	public function getSectionByID($id){
		$query = "SELECT * FROM tbl_section WHERE id= '$id' ";
    $red = $this->db->select($query);
  	return $red;
	}
  

  public function getSectionByName($name){
    $query = "SELECT * FROM tbl_section WHERE name = '$name' ";
    $red = $this->db->select($query);
    // $red = mysqli_fetch_assoc($red);
    if($red){
      return $red;
    }else{
      return false;
    }
    
  }

	public function addSection($data,$current_time){
		  $name                = strtoupper($this->fm->validation($data['name']));
      $publication_status  = $this->fm->validation($data['publication_status']);
      $date                = $current_time;

      if(empty($name) || empty($publication_status)){
          //header("Location:addauthor.php?err=Feild must not be empty!!");
          $msg['error'] = "Feild must not be empty!!";
          return $msg;
      }else{    
        $secname = $this->getSectionByName($name);
        if($secname){
            $this->msg['error'] = "Section already exist!!";
            return $this->msg;
        }else{
          $insert ="INSERT INTO  tbl_section (name,publication_status,date)
              VALUES ('$name','$publication_status','$date')";
          $run = $this->db->insert($insert);
          if($run== true){
              //header("Location:adddepartment.php?msg=Author added successfully!!");
            $msg['success'] = "Section added successfully!!";
            return $msg;
          }else{
              //header("Location:adddepartment.php?err=Author not added!!");
            $msg['error'] = "Section not added!!";
            return $msg;
          } 
        }
          
      }

	}

	public function updateSection($data){
		  $id                  = $this->fm->validation($data['id']);
      $name                = $this->fm->validation($data['name']);
      $publication_status  = $this->fm->validation($data['publication_status']);

      if(empty($id) || empty($name) || empty($publication_status)){
          //header("Location:../editauthor.php?id=$id&err=Feild must not be empty!!");
          $msg['error'] = "Feild must not be empty!!";
          return $msg;
      }else{    
          $exquery = "SELECT * FROM tbl_section WHERE name='$name' ";
          $exdepart = $this->db->select($exquery);
          if($exdepart != false){
              while($res = mysqli_fetch_assoc($exdepart)){
                  $exid  = $res['id'] ;
              }
          }

          if(isset($exid) && $exid != $id){
              $msg['error'] = "Section already exist!!";
              return $msg;
          }else{ 
              $update ="UPDATE tbl_section 
                  SET
                  name               = '$name',
                  publication_status = '$publication_status'
                  WHERE id = '$id'
                  ";
              $run = $this->db->update($update);
              if($run== true){
                //header("Location:../authorlist.php?msg=Data updated successfully!!");
                $msg['success'] = "Data updated successfully!!";
                return $msg;
              }else{
                //header("Location:../authorlist.php?err=Data not updated!!");
                $msg['error'] = "Data not updated!!";
                return $msg;
              }
          }
      }
	}







}