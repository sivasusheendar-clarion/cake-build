<div class="navbar navbar-inverse navbar-fixed-top  bs-docs-nav">
    <div class="navbar-inner">
        <div class="container">
            <button data-target=".navbar-inverse-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h3>Cake Build With Twitter Bootstrap</h3>
            <?php echo $this->element('profile')?>
        </div><!--/.nav-collapse -->
    </div>
    <?php
    $userData = $this->Session->read('Auth');
    if(!isset($userData['User'])) {
    ?>
    <ul class="nav pull-right">
        <li  class="dropdown">
            <a  class="dropdown-toggle" href="#" data-toggle="dropdown">Sign Up <strong class="caret"></strong></a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                <div id="msg"> </div>
                <?php echo $this->Form->create('Users', array("controller" => "users", "action" => "register", "method" => "post","class"=>"form-horizontal"));  ?>
                <?php echo $this->Form->input('User.email', array("placeholder"=>'Enter email','class'=>"form-control","label" =>false,)); ?>
                <?php echo $this->Form->input('User.password', array("placeholder"=>'Enter password','class'=>"form-control","label" =>false,)); ?>
                <?php echo $this->Form->input('User.confirm', array("placeholder"=>'Enter password','class'=>"form-control","label" =>false,)); ?>
                <input class="btn btn-primary btn-block" type="submit" id="sign-up" value="Sign Up">
                <?php   echo $this->Form->end(); ?>
            </div>

        </li>
        <li class="divider-vertical"></li>
        <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                <?php
                echo $this->Form->create('Users', array("controller" => "users", "action" => "login", "method" => "post","class"=>"form-horizontal"));
                ?>
                <?php echo $this->Form->input('User.email', array("placeholder"=>'Enter email','class'=>"form-control","label" =>false,)); ?>
                <?php echo $this->Form->input('User.password', array("placeholder"=>'Enter password','class'=>"form-control","label" =>false,)); ?>
                <input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
                <label class="string optional" for="user_remember_me"> Remember me</label>
                <input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
                <label style="text-align:center;margin-top:5px">or</label>
                <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
                <input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
                <?php   echo $this->Form->end(); ?>
            </div>
        </li>
    </ul>
    <?php
    }
    ?>
</div>


