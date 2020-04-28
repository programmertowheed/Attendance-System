<?php

/**
 * Attend class
 */
class Attend extends Controller{

	public $msg = array();

	function __construct(){
		parent::__construct();
	}


	public function addAttend($attend_id,$student_id,$data){
        $tid       = $this->fm->validation($data['tid']);
        $sub       = $this->fm->validation($data['sub']);
        $sec       = $this->fm->validation($data['sec']);
        $date      = $this->fm->validation($data['date']);
        //$date      = $this->fm->formatDBDate($date);
        

        if($student_id=="" || empty($date)){
            //header("Location:addstudent.php?err=Feild must not be empty!!");
            $this->msg['error'] = "Feild must not be empty!!";
            $this->msg['sub'] = $data['sub'];
            $this->msg['sec'] = $data['sec'];
            $this->msg['date'] = $data['date'];
            $this->msg['tid'] = $data['tid'];
            return $this->msg;
        }else{   
            $query = "SELECT DISTINCT att_time FROM  tbl_attendance
                    WHERE teacher_id='$tid' AND subject_id='$sub' AND section_id='$sec'
                    ";
            $att_query = $this->db->select($query);
            if($att_query == true){
                while ($result = $att_query->fetch_assoc()) {
                    $db_data = $result['att_time'];
                    if($date == $db_data){
                        $this->msg['error'] = "Attendance already taken!!";
                        $this->msg['sub'] = $data['sub'];
                        $this->msg['sec'] = $data['sec'];
                        $this->msg['date'] = $data['date'];
                        $this->msg['tid'] = $data['tid'];
                        return $this->msg;
                    }
                }
            }

            foreach ($student_id as $skey => $svalue) {
                foreach ($attend_id as $att_key => $att_value) {
                    if($svalue == $att_key){
                        if($att_value == 1){
                            $data_query = "INSERT INTO  tbl_attendance (teacher_id,student_id,subject_id,section_id,attend,att_time)
                            VALUES ('$tid','$svalue','$sub','$sec','1','$date')";
                            $data_insert = $this->db->insert($data_query);
                            
                        }
                        $svalue = false;
                    }
                }

                if($svalue != false){
                    $data_query = "INSERT INTO  tbl_attendance (teacher_id,student_id,subject_id,section_id,attend,att_time)
                        VALUES ('$tid','$svalue','$sub','$sec','0','$date')";
                    $data_insert = $this->db->insert($data_query);
                }
            }
            if($data_insert == true){
                $this->msg['success'] = "Attendance data inserted successfully!!";
                $this->msg['sub'] = $data['sub'];
                $this->msg['sec'] = $data['sec'];
                $this->msg['date'] = $data['date'];
                $this->msg['tid'] = $data['tid'];
                return $this->msg;
            }else{
                $this->msg['error'] = "Attendance data not inserted!!";
                $this->msg['sub'] = $data['sub'];
                $this->msg['sec'] = $data['sec'];
                $this->msg['date'] = $data['date'];
                $this->msg['tid'] = $data['tid'];
                return $this->msg;
            }
        }
	}


	public function updateAttend($attend_id,$student_id,$data){
        // $tid       = $this->fm->validation($data['tid']);
        // $sub       = $this->fm->validation($data['sub']);
        // $sec       = $this->fm->validation($data['sec']);
         $date      = $this->fm->validation($data['date']);

        if($student_id=="" || empty($date)){
            //header("Location:addstudent.php?err=Feild must not be empty!!");
            $this->msg['error'] = "Feild must not be empty!!";
            // $this->msg['sub'] = $data['sub'];
            // $this->msg['sec'] = $data['sec'];
            // $this->msg['date'] = $data['date'];
            // $this->msg['tid'] = $data['tid'];
            return $this->msg;
        }else{ 
            
            foreach ($student_id as $skey => $svalue) {
               foreach ($attend_id as $att_key => $att_value) {
                    if($svalue == $att_key){
                        if($att_value == 1){
                            $data_query = "UPDATE tbl_attendance
                            SET attend = '1'
                            WHERE id = '".$svalue."' AND att_time ='".$date."' ";
                            $data_insert = $this->db->insert($data_query);
                        }
                        $svalue = false;

                    }
                    
                }

                if($svalue != false){
                    $data_query = "UPDATE tbl_attendance
                            SET attend = '0'
                            WHERE id = '".$svalue."' AND att_time ='".$date."' ";
                    $data_insert = $this->db->insert($data_query);
                }
                
            }

            if($data_insert == true){
                $this->msg['success'] = "Attendance data updated successfully!!";
                // $this->msg['sub'] = $data['sub'];
                // $this->msg['sec'] = $data['sec'];
                // $this->msg['date'] = $data['date'];
                // $this->msg['tid'] = $data['tid'];
                return $this->msg;
            }else{
                $this->msg['error'] = "Attendance data not updated!!";
                // $this->msg['sub'] = $data['sub'];
                // $this->msg['sec'] = $data['sec'];
                // $this->msg['date'] = $data['date'];
                // $this->msg['tid'] = $data['tid'];
                return $this->msg;
            }
        }
    }


	

    public function getStudentList($sub, $sec){
        $query ="SELECT * FROM tbl_student 
            WHERE id IN(
                SELECT student_id FROM tbl_studentassign
                WHERE subject_id = '$sub' AND section_id ='$sec'
            )
            ORDER BY studentid ASC"; 
        $red = $this->db->select($query);
        if($red == true){
            return $red;
        }else{
            return false;
        }
    }

    public function getDateList($tid, $subject_id, $section_id){
        $query = "SELECT DISTINCT att_time FROM  tbl_attendance
                    WHERE teacher_id='$tid' AND subject_id='$subject_id' AND section_id='$section_id'
                    ORDER BY att_time ASC
                    ";
        $date_query = $this->db->select($query);
        if($date_query == true){
            return $date_query;
        }else{
            return false;
        }
    }

    public function getStudentListByDtae($tid,$sub,$sec,$date){
        $stuquery = "SELECT tbl_attendance.* , tbl_student.name as name, tbl_student.studentid as sid 
                    FROM  tbl_attendance 
                    INNER JOIN tbl_student
                    ON tbl_attendance.student_id = tbl_student.id
                    WHERE teacher_id='$tid' AND subject_id='$sub' AND section_id='$sec' AND att_time= '$date'
                    ORDER BY tbl_student.studentid ASC
                    ";
        $stu_query = $this->db->select($stuquery);
        if($stu_query == true){
            return $stu_query;
        }else{
            return false;
        }
    }


 

}