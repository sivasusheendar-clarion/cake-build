 <?php
            echo $this->Session->flash('auth'); 
            echo $this->Form->create('Users', array("controller" => "users", "action" => "activateAction", "method" => "post","class"=>"form-horizontal"));    
 ?>
 <fieldset>
    <legend>Reset Your Password!</legend>
    <div class="form-group">
      <label for="exampleInputEmail">Email address: </label>
       <?php echo $user_email; ?>
     </div>
    <div class="form-group">
      <label for="exampleInputPassword">New Password</label>
      <?php echo $this->Form->input('User.password', array("placeholder"=>'Enter password','class'=>"form-control","label" =>false,)); ?>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Confirm New Password</label>
      <?php echo $this->Form->input('User.confirm_password', array("placeholder"=>'Enter password','class'=>"form-control","label" =>false,)); ?>
    </div>
</fieldset>
 <div class="submit">
     <input name="data[User][token]" id="token" value="<?php echo $token; ?>" type="hidden" />
     <input type="submit" value="Reset Password" class="btn btn-success">
 </div>
 <?php   echo $this->Form->end(); ?>