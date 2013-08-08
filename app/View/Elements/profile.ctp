<?php
$userData = $this->Session->read('Auth');
if(isset($userData['User'])) {
?>
<div class="pull-right">
<a href="/users/logout"> Logout</a>
</div>
<?php
}  else {

}
?>


