<?php
$userData = $this->Session->read('Auth');
if($userData) {
?>
<div class="pull-right">
<a href="/users/logout"> Logout</a>
</div>
<?php
}  else {

}
?>


