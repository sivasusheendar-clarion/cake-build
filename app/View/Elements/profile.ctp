<?php
$userData = $this->Session->read('Auth');
if(isset($userData['User'])) {
?>
<div class="btn-group pull-right">
    <button type="button" class="btn btn-default" onclick="location.href='/users/logout';" value="Logout">Logout</button>
</div>

<ul class="nav nav-tabs">
  <?php    if($userData['User']['role']==1) {  ?>
      <li class="active"><a href="/admin/home">Home</a></li>
      <li><a href="/admin/users">Users</a></li>
  <?php } ?>
 </ul>
<?php
} 
?>