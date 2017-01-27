<?php
require_once('../../../private/initialize.php');

if(!isset($_GET['id']) || (is_blank($_GET['id']))) {
  redirect_to('index.php');
}
$users_result = find_user_by_id($_GET['id']);
// No loop, only one result
$user = db_fetch_assoc($users_result);

if(is_post_request()) {

	$result = delete_user($user);
  	if($result === true) {
    	redirect_to('index.php');
  	}
}
?>

<?php $page_title = 'Staff: Delete User ' . $user['first_name'] . " " . $user['last_name']; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="index.php">Back to Users List</a><br />

  <h1>Delete User: <?php echo $user['first_name'] . " " . $user['last_name']; ?></h1>

  <p>Are you sure you want to permanently delete this user?</p>

  <form action="delete.php?id=<?php echo $user['id']; ?>" method="post">
    <input type="submit" name="submit" value="Delete"  />
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
