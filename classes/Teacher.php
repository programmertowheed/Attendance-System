<?php

/**
 * Teacher class
 */
class Teacher extends Controller{

  public $msg = array();

  function __construct(){
    parent::__construct();
  }


  public function addTeacher($data,$current_time){
    $name                = $this->fm->validation($data['name']);
    $department_id       = $this->fm->validation($data['department_id']);
    $employeid           = $this->fm->validation($data['employeid']);
    $phone               = $this->fm->validation($data['phone']);
    $email               = $this->fm->validation($data['email']);
    $publication_status  = $this->fm->validation($data['publication_status']);
    $date                = $current_time;

    if(empty($name) || empty($department_id) || empty($employeid) || empty($phone) || empty($email) || empty($publication_status)){
        //header("Location:addTeacher.php?err=Feild must not be empty!!");
        $this->msg['error'] = "Feild must not be empty!!";
        return $this->msg;
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $this->msg['error'] = "Invalid Email Address!!";
        return $this->msg;
    }else{    
        $eid = $this->getEmployeByID($employeid);
        //$eid = mysqli_fetch_assoc($eid);
        if($eid){
            $this->msg['error'] = "Employe ID already exist!!";
            return $this->msg;
        }else{
            $insert ="INSERT INTO  tbl_teacher (name,department_id,employeid,phone,publication_status,date)
            VALUES ('$name','$department_id','$employeid','$phone','$publication_status','$date')";
            $run = $this->db->insert($insert);
                if($run== true){
                $query = "INSERT INTO  tbl_user (username,employeid,userEmail,mobile,role)
                VALUES ('Username','$employeid','$email','$phone','Teacher')";
                $result = $this->db->insert($query);
                if($result == true){
                    $this->msg['success'] = "Teacher added successfully!!";
                    return $this->msg;
                }else{
                   // header("Location:addTeacher.php?err=Teacher not added!!");
                  $this->msg['error'] = "Teacher not added!!";
                  return $this->msg;
                }
            }else{
               // header("Location:addTeacher.php?err=Teacher not added!!");
              $this->msg['error'] = "Teacher not added!!";
              return $this->msg;
            }
        }
    }
  }


  public function editTeacher($data){
    $id                  = $this->fm->validation($data['id']);
        $name                = $this->fm->validation($data['name']);
        $department_id       = $this->fm->validation($data['department_id']);
        $employeid           = $this->fm->validation($data['employeid']);
        $phone               = $this->fm->validation($data['phone']);
        $publication_status  = $this->fm->validation($data['publication_status']);

        if(empty($id) || empty($name) || empty($department_id) || empty($employeid) || empty($phone) || empty($publication_status)){
            //header("Location:../editTeacher.php?id=$id&err=Feild must not be empty!!");
            $this->msg['error'] = "Feild must not be empty!!";
            return $this->msg;
        }else{    
            $update ="UPDATE tbl_teacher 
                    SET
                    name               = '$name',
                    department_id      = '$department_id',
                    employeid          = '$employeid',
                    phone              = '$phone',
                    publication_status = '$publication_status'
                    WHERE id = '$id'
                    ";
            $run = $this->db->update($update);
            if($run== true){
                //header("Location:../Teacherlist.php?msg=Data updated successfully!!");
                $this->msg['success'] = "Data updated successfully!!";
              return $this->msg;
            }else{
                //header("Location:../Teacherlist.php?err=Data not updated!!");
                $this->msg['error'] = "Data not updated!!";
              return $this->msg;
            }
        }
  }

  public function getTeacherByID($id){
    $query = "SELECT * FROM tbl_teacher WHERE id= '$id' ";
    $red = $this->db->select($query);
    return $red;
  }

  public function getTeacherNameByID($subid, $secid){
    $query = "SELECT teacher_id FROM tbl_teacherassign WHERE subject_id = '$subid' AND section_id = '$secid' ";
    $red = $this->db->select($query);
    
    if($red != true){
        return "Not Assign";
    }else{
        $red = mysqli_fetch_assoc($red);
        $tid = $red['teacher_id'];
        $tquery = "SELECT * FROM tbl_teacher WHERE id = '$tid' ";
        $tname = $this->db->select($tquery);
        $tname = mysqli_fetch_assoc($tname);
        $tname = $tname['name'];
        return $tname;
    }
    
  }

  public function getEmployeByID($id){
    $query = "SELECT * FROM tbl_teacher WHERE employeid = '$id' ";
    $red = $this->db->select($query);
    if($red == true){
        return $red;
    }else{
       return false; 
    }
    
  }


    public function getTeacherList(){
        $query = "SELECT tbl_teacher.*, tbl_department.name as departname
            FROM tbl_teacher 
            INNER JOIN tbl_department
            ON tbl_teacher.department_id = tbl_department.id 
            ORDER BY tbl_teacher.employeid ASC";
        $red = $this->db->select($query);
        return $red;
    }




}