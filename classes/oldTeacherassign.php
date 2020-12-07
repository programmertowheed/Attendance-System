<?php

/**
 * Teacherassign class
 */
class Teacherassign extends Controller{

	public $msg = array();

	function __construct(){
		parent::__construct();
	}


	public function addTeacher($data){
		$teacher_id = $this->fm->validation($data['teacher_id']);
        $subject_id = $this->fm->validation($data['subject_id']);
        $section_id = $this->fm->validation($data['section_id']);

        if(empty($teacher_id) || empty($subject_id) || empty($section_id)){
            //header("Location:addstudent.php?err=Feild must not be empty!!");
            $this->msg['error'] = "Feild must not be empty!!";
            return $this->msg;
        }else{    
            $ifexist = $this->getSectionByID($teacher_id,$subject_id,$section_id);
            if($ifexist){
                $this->msg['error'] = "Course and section already assign!!";
                return $this->msg;
            }else{
                $insert ="INSERT INTO  tbl_teacherassign (teacher_id,subject_id,section_id)
                VALUES ('$teacher_id','$subject_id','$section_id')";
                $run = $this->db->insert($insert);
                if($run== true){
                   // header("Location:addstudent.php?msg=Student added successfully!!");
                    $this->msg['success'] = "Teacher assign successfully!!";
                    return $this->msg;
                }else{
                   // header("Location:addstudent.php?err=Student not added!!");
                    $this->msg['error'] = "Teacher not assign!!";
                    return $this->msg;
                }
            }
            
        }
	}


	public function updateTeacher($data){
        $id           = $this->fm->validation($data['id']);
        $tid          = $this->fm->validation($data['tid']);
        $subject_id   = $this->fm->validation($data['subject_id']);
        $section_id   = $this->fm->validation($data['section_id']);

        if(empty($id) || empty($subject_id) || empty($section_id) || empty($tid)){
            //header("Location:../editstudent.php?id=$id&err=Feild must not be empty!!");
            $this->msg['error'] = "Feild must not be empty!!";
            return $this->msg;
        }else{  
            $ifexist = $this->getSectionByID($tid,$subject_id,$section_id);
            if($ifexist){
                $this->msg['error'] = "Course and section already assign!!";
                return $this->msg;
            }else{
                $update ="UPDATE tbl_teacherassign 
                    SET
                    subject_id         = '$subject_id',
                    section_id         = '$section_id'
                    WHERE id = '$id'
                    ";
                $run = $this->db->update($update);
                if($run== true){
                    //header("Location:../studentlist.php?msg=Data updated successfully!!");
                    $this->msg['success'] = "Data updated successfully!!";
                    $this->msg['tid'] = $tid;
                    return $this->msg;
                }else{
                    //header("Location:../studentlist.php?err=Data not updated!!");
                    $this->msg['error'] = "Data not updated!!";
                    return $this->msg;
                }  
            }
            
        }
	}

	public function getAssignTeacher($id){
		$query = "SELECT * FROM tbl_teacherassign WHERE id= '$id' ";
        $red = $this->db->select($query);
        return $red;
	}

    public function getSectionByID($tid, $subid, $secid){
        $query = "SELECT * FROM tbl_teacherassign WHERE teacher_id='$tid' AND subject_id='$subid' AND section_id='$secid'";
        $red = $this->db->select($query);
        return $red;
    }


    public function getTeacherList(){
        $query ="SELECT DISTINCT tbl_teacherassign.teacher_id, tbl_department.name as dname, tbl_teacher.employeid as eid, tbl_teacher.name as tname
            FROM tbl_teacherassign 
            INNER JOIN tbl_teacher
            ON tbl_teacherassign.teacher_id = tbl_teacher.id 
            INNER JOIN tbl_department
            ON tbl_teacher.department_id = tbl_department.id 
            ORDER BY tbl_teacher.employeid ASC"; 
        $red = $this->db->select($query);
        return $red;
    }


    public function getTeacherCourseList($id){
        $query ="SELECT tbl_teacherassign.*, tbl_subject.name as subname, tbl_subject.code as subcode, tbl_section.name as sname, tbl_subject.id as subid, tbl_section.id as secid
            FROM tbl_teacherassign 
            INNER JOIN tbl_subject
            ON tbl_teacherassign.subject_id = tbl_subject.id 
            INNER JOIN tbl_section
            ON tbl_teacherassign.section_id = tbl_section.id 
            WHERE tbl_teacherassign.teacher_id = '$id'
            ORDER BY tbl_subject.code ASC"; 
        $red = $this->db->select($query);
        return $red;
    }

 

}