//ajax

<?php
require_once('system/data.php');
require_once('system/security.php');

if(isset($_POST['posttext'])){
  $gutschein = filter_data($_POST['gutscheinbild']);
  $user_id = $_POST['user_id'];

  $id = get_gutschein ($gutschein, $user_id);
  $gutschein = mysqli_fetch_assoc(get_gutschein($id));


 php echo $post['text'] 

 ?>
