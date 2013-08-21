 <?php
            echo $this->Session->flash('auth'); 
            echo $this->Form->create('Users', array("controller" => "users", "action" => "forgotpassword", "method" => "post","class"=>"form-horizontal"));    
 ?>
 <fieldset>
    <legend>Login !</legend>
    <div class="form-group">
      <label for="exampleInputEmail">Email address</label>
      <?php echo $this->Form->input('User.email', array("placeholder"=>'Enter email','class'=>"form-control","label" =>false,)); ?>
      
    </div>
    
  </fieldset>
 <div class="submit">
     <input type="submit" value="Reset Password" class="btn btn-success">
     
 </div>
 
 <?php   echo $this->Form->end(); ?>
