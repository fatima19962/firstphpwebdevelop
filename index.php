<?php 
  $title='Index';
  require_once 'includes/header.php'; 
  require_once 'db/conn.php'; 
  $results = $crud->getSpecialties();
?>

    <h1 class="text-center">Registration for IT Conference</h1>
  
     <form   method="post" action="success.php">
     <div class="form-group">
       <label for="firstname" class="form-label">Fisrt Name</label>
       <input required type="text" class="form-control" id="firstname" name="firstname" >
     </div>
     <div class="form-group">
       <label for="lastname" class="form-label">Last Name</label>
       <input required type="text" class="form-control" id="lastname" name="lastname" >
     </div>
     <div class="form-group">
       <label for="db" class="form-label">Date of Birth</label>
       <input type="text" class="form-control" id="dob"  name="dob">
     </div>
      <div class="form-group">
       <label for="specialty" class="form-label">Area of Expertise</label>
       <select class="form-control" id="specialty" name="specialty" >
       <?php while($r = $results ->fetch(PDO::FETCH_ASSOC)) {?>
        
         <option value="<?php echo $r['specialty_id']?>"><?php echo $r['name']; ?></option>

        <?php   }?>
        </select>
          
      
       </div> 
    
       <div class="form-group">
        <label for="email" class="form-label">Email address</label>
        <input required type="email" class="form-control" id="email"  name="email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
       </div>  
       <div class="form-group">
         <label for="phone" class="form-label">Contact Number</label>
         <input type="text" class="form-control" id="phone" name="phone" aria-describedby="emailHelp">
         <div id="emailHelp" class="form-text">We'll never share your number with anyone else.</div>
       </div>


          <button type="submit" name="submit" class="btn btn-primary btn-block ">Submit</button>
        </form>
        
<br>
<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>