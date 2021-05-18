<?php 
    class crud{

        private $db;

        function __construct($conn){
            $this->db = $conn;
            
        }


        public function insertAttendees($fname,$lname,$dob,$email,$contact,$specialty){

          try {
               $sql="INSERT INTO attendance(firstname,lastname,dateofbirth,emailaddress,contactnumber,specialty_id) VALUES (:fname,:lname,:dob,:email,:contact,:specialty)";
               $stmt = $this->db->prepare($sql);



               $stmt->bindparam(':fname',$fname);
               $stmt->bindparam(':lname',$lname);      
               $stmt->bindparam(':dob',$dob);
               $stmt->bindparam(':email',$email);
               $stmt->bindparam(':contact',$contact);
               $stmt->bindparam(':specialty',$specialty);
      
      
      
                        // execute statement
               $stmt->execute();
               return true;
                
              } catch (PDOException $e) {
                        echo $e->getMessage();
                        return false;
                    }
             }
             public function editattendance($id,$fname, $lname, $dob, $email,$contact,$specialty){
                    try{ 
                         $sql = "UPDATE `attendance` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`emailaddress`=:email,`contactnumber`=:contact,`specialty_id`=:specialty WHERE attendance_id = :id ";
                         $stmt = $this->db->prepare($sql);
                         // bind all placeholders to the actual values
                         $stmt->bindparam(':id',$id);
                         $stmt->bindparam(':fname',$fname);
                         $stmt->bindparam(':lname',$lname);
                         $stmt->bindparam(':dob',$dob);
                         $stmt->bindparam(':email',$email);
                         $stmt->bindparam(':contact',$contact);
                         $stmt->bindparam(':specialty',$specialty);
         
                         // execute statement
                         $stmt->execute();
                         return true;
                    }catch (PDOException $e) {
                     echo $e->getMessage();
                     return false;
                    }
                     
                 }


             public function getAttendees(){
                 try{
                     $sql = "SELECT * FROM `attendance` a inner join specialties s on a.specialty_id = s.specialty_id ";
                     $result = $this->db->query($sql);
                     return $result;
                 }catch (PDOException $e) {
                     echo $e->getMessage();
                     return false;
                }
                
             }
             public function getattendanceDetails($id){
               try {
                   $sql = "select * from attendance a inner join specialties s on a.specialty_id = s.specialty_id 
                     where attendance_id = :id";
                   $stmt = $this->db->prepare($sql);
                   $stmt->bindparam(':id', $id);
                   $stmt->execute();
                   $result = $stmt->fetch();
                   return $result;
               } catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
               }
                 
           
              }
              
             public function deleteattendance($id){
                try{
                   $sql = "delete from attendance where attendance_id = :id";
                   $stmt = $this->db->prepare($sql);
                   $stmt->bindparam(':id', $id);
                   $stmt->execute();
                   return true;
                }catch (PDOException $e) {
                    echo $e->getMessage();
                    return false;
                }
              }
             
              public function getSpecialties(){
              try {
                  $sql = "SELECT * FROM `specialties`";
                  $result = $this->db->query($sql);
                  return $result;
              } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
              }
                 
          
             
             }

        }


        // public function insertattendance($fname,$lname,$dob,$email,$contact,$specialty){
        //     try{
        //         $sql = "INSERT INTO attendance(firstname,lastname,dateofbirth,emailaddress,contactnumber,specialty_id) VALUES (:fname,:lname,:dob,:email,:contact,:specialty)";
        //          //prepare the sql statement for execution
        //          $stmt = $this->db->prepare($sql);
        //          // bind all placeholders to the actual values
        //          $stmt->bindparam(':fname',$fname);
        //          $stmt->bindparam(':lname',$lname);
        //          $stmt->bindparam(':dob',$dob);
        //          $stmt->bindparam(':email',$email);
        //          $stmt->bindparam(':contact',$contact);
        //          $stmt->bindparam(':specialty',$specialty);



        //           // execute statement
        //           $stmt->execute();
        //           return true;
          
        //       } catch (PDOException $e) {
        //           echo $e->getMessage();
        //           return false;
        //       }

        // }
        // public function editattendance($id,$fname, $lname, $dob, $email,$contact,$specialty){
        //     try{ 
        //          $sql = "UPDATE `attendance` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`emailaddress`=:email,`contactnumber`=:contact,`specialty_id`=:specialty WHERE attendance_id = :id ";
        //          $stmt = $this->db->prepare($sql);
        //          // bind all placeholders to the actual values
        //          $stmt->bindparam(':id',$id);
        //          $stmt->bindparam(':fname',$fname);
        //          $stmt->bindparam(':lname',$lname);
        //          $stmt->bindparam(':dob',$dob);
        //          $stmt->bindparam(':email',$email);
        //          $stmt->bindparam(':contact',$contact);
        //          $stmt->bindparam(':specialty',$specialty);
 
        //          // execute statement
        //          $stmt->execute();
        //          return true;
        //     }catch (PDOException $e) {
        //      echo $e->getMessage();
        //      return false;
        //     }
             
        //  }
 
      
 
        //  public function getattendanceDetails($id){
        //     try{
        //          $sql = "select * from attendance a inner join specialties s on a.specialty_id = s.specialty_id 
        //          where attendance_id = :id";
        //          $stmt = $this->db->prepare($sql);
        //          $stmt->bindparam(':id', $id);
        //          $stmt->execute();
        //          $result = $stmt->fetch();
        //          return $result;
        //     }catch (PDOException $e) {
        //          echo $e->getMessage();
        //          return false;
        //      }
        //  }
 
        //  public function deleteattendance($id){
        //     try{
        //          $sql = "delete from attendance where attendance_id = :id";
        //          $stmt = $this->db->prepare($sql);
        //          $stmt->bindparam(':id', $id);
        //          $stmt->execute();
        //          return true;
        //      }catch (PDOException $e) {
        //          echo $e->getMessage();
        //          return false;
        //      }
        //  }
 
        //  public function getSpecialties(){
        //      try{
        //          $sql = "SELECT * FROM `specialties`";
        //          $result = $this->db->query($sql);
        //          return $result;
        //      }catch (PDOException $e) {
        //          echo $e->getMessage();
        //          return false;
        //      }
             
        //  }
 
        //  public function getSpecialtyById($id){
        //      try{
        //          $sql = "SELECT * FROM `specialties` where specialty_id = :id";
        //          $stmt = $this->db->prepare($sql);
        //          $stmt->bindparam(':id', $id);
        //          $stmt->execute();
        //          $result = $stmt->fetch();
        //          return $result;
        //      }catch (PDOException $e) {
        //          echo $e->getMessage();
        //          return false;
        //      }
             
        //  }
    



?>