<h1>HOME</h1>


<div class="span4 well">
    <div class="row">
        <div class="span1"><a href="http://critterapp.pagodabox.com/others/admin" class="thumbnail"><img src="http://critterapp.pagodabox.com/img/user.jpg" alt=""></a></div>
        <div class="span3">
            <p></p>
            <p><strong><?php echo $user_email; ?></strong></p>
            <span class=" badge badge-warning"><a id="profile_button" href="#">Edit Profile</a></span>
            <!--<span class=" badge badge-warning"></span> <span class=" badge badge-info">15 followers</span>-->
        </div>
    </div>
</div>


<div class="span4 well" id="profile">

    <h3>Edit User</h3>
    <?php
    echo $this->Form->create('User',array('type' => 'file'));
    echo $this->Form->input('email');
    echo $this->Form->input('role');
    echo $this->Form->end('Save');
    ?>


</div>
