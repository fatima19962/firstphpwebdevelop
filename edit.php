<?php 
  $title='Edit Record';
  require_once 'includes/header.php'; 
  require_once 'db/conn.php'; 
  $results = $crud->getSpecialties();
  if(!isset($_GET['id']))
  {
       //echo 'error';
       include 'includes/errormessage.php';
       header("Location: viewrecords.php");
  }
  else{
      $id=$_GET['id'];
      $attendance = $crud -> getattendanceDetails($id);
  
  
  
?>

    <h1 class="text-center">Edit Record </h1>
  
     <form   method="post" action="editpost.php">
          <input type="hidden" name="id" value="<?php echo $attendance['attendance_id'] ?>"/>
     <div class="form-group">
       <label for="firstname" class="form-label">Fisrt Name</label>
       <input type="text" class="form-control" value="<?php echo $attendance['firstname'] ?>" id="firstname" name="firstname" >
     </div>
     <div class="form-group">
       <label for="lastname" class="form-label">Last Name</label>
       <input type="text" class="form-control" value="<?php echo $attendance['lastname'] ?>" id="lastname" name="lastname" >
     </div>
     <div class="form-group">
       <label for="db" class="form-label">Date of Birth</label>
       <input type="text" class="form-control" value="<?php echo $attendance['dateofbirth'] ?>" id="dob"  name="dob">
     </div>
      <div class="form-group">
       <label for="specialty" class="form-label">Area of Expertise</label>
       <select class="form-control"  id="specialty" name="specialty" >
       <?php while($r = $results ->fetch(PDO::FETCH_ASSOC)) {?>
        
         <option  value="<?php echo $r['specialty_id']?>"  <?php if($r['specialty_id']== $attendance['specialty_id']) echo 'selected' ?>>
         
         <?php echo $r['name']; ?>
         </option>

        <?php   }?>
        </select>
          
      
       </div> 
    
       <div class="form-group">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" value="<?php echo $attendance['emailaddress'] ?>" id="email"  name="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
       </div>  
       <div class="form-group">
         <label for="phone" class="form-label">Contact Number</label>
         <input type="text" class="form-control" value="<?php echo $attendance['contactnumber'] ?>" id="phone" name="phone" aria-describedby="emailHelp">
         <div id="emailHelp" class="form-text">We'll never share your number with anyone else.</div>
       </div>


          <a href="viewrecords.php" class="btn  btn-default ">Back to List </button>
          <button type="submit" name="submit" class="btn btn-success btn-block ">Save changes</button>
        </form>
        
        <?php } ?>
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>