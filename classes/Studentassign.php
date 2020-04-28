<?php

/**
 * Studentassign class
 */
class Studentassign extends Controller{

	public $msg = array();

	function __construct(){
		parent::__construct();
	}


	public function addStudent($data){
		$student_id = $this->fm->validation($data['student_id']);
        $subject_id = $this->fm->validation($data['subject_id']);
        $section_id = $this->fm->validation($data['section_id']);

        if(empty($student_id) || empty($subject_id) || empty($section_id)){
            //header("Location:addstudent.php?err=Feild must not be empty!!");
            $this->msg['error'] = "Feild must not be empty!!";
            return $this->msg;
        }else{    
            $id = $this->getSubjectByID($student_id,$subject_id, $section_id);
            if($id){
                $this->msg['error'] = "Course already assign!!";
                return $this->msg;
            }else{
                $insert ="INSERT INTO  tbl_studentassign (student_id,subject_id,section_id)
                VALUES ('$student_id','$subject_id','$section_id')";
                $run = $this->db->insert($insert);
                if($run== true){
                   // header("Location:addstudent.php?msg=Student added successfully!!");
                    $this->msg['success'] = "Student assign successfully!!";
                    return $this->msg;
                }else{
                   // header("Location:addstudent.php?err=Student not added!!");
                    $this->msg['error'] = "Student not assign!!";
                    return $this->msg;
                }
            }
            
        }
	}


	public function updateStudent($data){
        $id           = $this->fm->validation($data['id']);
        $sid          = $this->fm->validation($data['sid']);
        $subject_id   = $this->fm->validation($data['subject_id']);
        $section_id   = $this->fm->validation($data['section_id']);

        if(empty($id) || empty($subject_id) || empty($section_id) || empty($sid)){
            //header("Location:../editstudent.php?id=$id&err=Feild must not be empty!!");
            $this->msg['error'] = "Feild must not be empty!!";
            return $this->msg;
        }else{   
            $response = $this->getSubjectByID($sid,$subject_id,$section_id);
            if($response){
                $this->msg['info'] = "Course already assign!!";
                return $this->msg;
            }else{
                $update ="UPDATE tbl_studentassign 
                        SET
                        subject_id         = '$subject_id',
                        section_id         = '$section_id'
                        WHERE id = '$id'
                        ";
                $run = $this->db->update($update);
                if($run== true){
                    //header("Location:../studentlist.php?msg=Data updated successfully!!");
                    $this->msg['success'] = "Data updated successfully!!";
                    $this->msg['sid'] = $sid;
                    return $this->msg;
                }else{
                    //header("Location:../studentlist.php?err=Data not updated!!");
                    $this->msg['error'] = "Data not updated!!";
                    return $this->msg;
                } 
            }
        }
	}

	public function getAssignStudent($id){
		$query = "SELECT * FROM tbl_studentassign WHERE id= '$id' ";
        $red = $this->db->select($query);
        return $red;
	}

    public function getSubjectByID($sid, $subid, $secid){
        $query = "SELECT * FROM tbl_studentassign WHERE student_id='$sid' AND subject_id='$subid' AND section_id='$secid' ";
        $red = $this->db->select($query);
        return $red;
    }


    public function getStudentList(){
        $query ="SELECT DISTINCT tbl_studentassign.student_id, tbl_department.name as dname, tbl_student.studentid as sid, tbl_student.name as sname
            FROM tbl_studentassign 
            INNER JOIN tbl_student
            ON tbl_studentassign.student_id = tbl_student.id 
            INNER JOIN tbl_department
            ON tbl_student.department_id = tbl_department.id 
            ORDER BY tbl_student.studentid ASC"; 
        $red = $this->db->select($query);
        return $red;
    }


    public function getStudentCourseList($id){
        $query ="SELECT tbl_studentassign.*, tbl_subject.code as subcode, tbl_subject.name as subname, tbl_section.name as sname, tbl_subject.id as subid, tbl_section.id as secid
            FROM tbl_studentassign 
            INNER JOIN tbl_subject
            ON tbl_studentassign.subject_id = tbl_subject.id 
            INNER JOIN tbl_section
            ON tbl_studentassign.section_id = tbl_section.id 
            WHERE tbl_studentassign.student_id = '$id'
            ORDER BY tbl_subject.name ASC"; 
        $red = $this->db->select($query);
        return $red;
    }




}