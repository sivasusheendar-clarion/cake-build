<?php
            echo $this->Form->create('Users', array("controller" => "users", "action" => "login", "method" => "post","class"=>"form-horizontal"));    
 ?>
 <fieldset>
    <legend>Register  !</legend>
    <div class="form-group">
      <label for="exampleInputEmail">Email address</label>
      <?php echo $this->Form->input('User.email', array("placeholder"=>'Enter email','class'=>"form-control","label" =>false,)); ?>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Password</label>
      <?php echo $this->Form->input('User.password', array("placeholder"=>'Enter password','class'=>"form-control","label" =>false,)); ?>
    </div>
     <div class="form-group">
      <label for="exampleInputPassword">Confirm Password</label>
      <?php echo $this->Form->input('User.confirm', array("placeholder"=>'Enter password','class'=>"form-control","label" =>false,)); ?>
    </div>
  </fieldset>
 <div class="submit">
     <input type="submit" value="Save" class="btn btn-success">
    
 </div>
 <?php   echo $this->Form->end(); ?>
