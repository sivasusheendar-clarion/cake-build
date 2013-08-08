 <?php
            echo $this->Form->create('Users', array("controller" => "users", "action" => "login", "method" => "post","class"=>"form-horizontal"));    
 ?>
 <fieldset>
    <legend>Login !</legend>
    <div class="form-group">
      <label for="exampleInputEmail">Email address</label>
      <?php echo $this->Form->input('User.email', array("placeholder"=>'Enter email','class'=>"form-control","label" =>false,)); ?>
      
    </div>
    <div class="form-group">
      <label for="exampleInputPassword">Password</label>
      <?php echo $this->Form->input('User.password', array("placeholder"=>'Enter password','class'=>"form-control","label" =>false,)); ?>
    </div>
    
    <div class="checkbox">
      <label>
        <input type="checkbox"> Keep me signed in.
      </label>
    </div>
  </fieldset>
 <div class="submit">
     <input type="submit" value="Login" class="btn btn-success">
     <input type="button" onclick="location.href='users/register';" value="Register" class="btn btn-success">
 </div>
 <?php   echo $this->Form->end(); ?>
