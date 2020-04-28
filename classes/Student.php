<?php

/**
 * Student class
 */
class Student extends Controller{

	public $msg = array();

	function __construct(){
		parent::__construct();
	}


	public function addStudent($data,$current_time){
		$name                = $this->fm->validation($data['name']);
        $department_id       = $this->fm->validation($data['department_id']);
        $studentid           = $this->fm->validation($data['studentid']);
        $phone               = $this->fm->validation($data['phone']);
        $publication_status  = $this->fm->validation($data['publication_status']);
        $date                = $current_time;

        if(empty($name) || empty($department_id) || empty($studentid) || empty($phone) || empty($publication_status)){
            //header("Location:addstudent.php?err=Feild must not be empty!!");
            $this->msg['error'] = "Feild must not be empty!!";
            return $this->msg;
        }else{ 

            $sid = $this->getStudentBySID($studentid);
            //$sid = mysqli_fetch_assoc($sid);
            if($sid){
                $this->msg['error'] = "Student ID already exist!!";
                return $this->msg;
            }else{
                $insert ="INSERT INTO  tbl_student (name,department_id,studentid,phone,publication_status,date)
                VALUES ('$name','$department_id','$studentid','$phone','$publication_status','$date')";
                $run = $this->db->insert($insert);
                if($run== true){
                   // header("Location:addstudent.php?msg=Student added successfully!!");
                    $this->msg['success'] = "Student added successfully!!";
                    return $this->msg;
                }else{
                   // header("Location:addstudent.php?err=Student not added!!");
                    $this->msg['error'] = "Student not added!!";
                    return $this->msg;
                }
            }
        }
	}


	public function editStudent($data){
		$id                  = $this->fm->validation($data['id']);
        $name                = $this->fm->validation($data['name']);
        $department_id       = $this->fm->validation($data['department_id']);
        $studentid           = $this->fm->validation($data['studentid']);
        $phone               = $this->fm->validation($data['phone']);
        $publication_status  = $this->fm->validation($data['publication_status']);

        if(empty($id) || empty($name) || empty($department_id) || empty($studentid) || empty($phone) || empty($publication_status)){
            //header("Location:../editstudent.php?id=$id&err=Feild must not be empty!!");
            $this->msg['error'] = "Feild must not be empty!!";
            return $this->msg;
        }else{    
            $update ="UPDATE tbl_student 
                    SET
                    name               = '$name',
                    department_id      = '$department_id',
                    studentid          = '$studentid',
                    phone              = '$phone',
                    publication_status = '$publication_status'
                    WHERE id = '$id'
                    ";
            $run = $this->db->update($update);
            if($run== true){
                //header("Location:../studentlist.php?msg=Data updated successfully!!");
                $this->msg['success'] = "Data updated successfully!!";
            	return $this->msg;
            }else{
                //header("Location:../studentlist.php?err=Data not updated!!");
                $this->msg['error'] = "Data not updated!!";
            	return $this->msg;
            }
        }
	}

	public function getStudent($id){
		$query = "SELECT * FROM tbl_student WHERE id= '$id' ";
        $red = $this->db->select($query);
        if($red){
            return $red;
        }else{
            return false;
        }
	}

    public function getStudentBySID($sid){
        $query = "SELECT * FROM tbl_student WHERE studentid= '$sid' ";
        $red = $this->db->select($query);
        if($red){
            return $red;
        }else{
            return false;
        }
    }


    public function getStudentList(){
        $query = "SELECT tbl_student.*, tbl_department.name as departname
            FROM tbl_student 
            INNER JOIN tbl_department
            ON tbl_student.department_id = tbl_department.id 
            ORDER BY tbl_student.studentid ASC";
        $red = $this->db->select($query);
        if($red){
            return $red;
        }else{
            return false;
        }
    }




}