<h1>
  Hey
  <?php
  $name=explode(' ',$user['User']['name']);
  echo $name[0]; 
  ?>
</h1>

<p>Did you know your account was created <strong><?php echo $time->niceShort($user['User']['created']); ?></strong>?</p>