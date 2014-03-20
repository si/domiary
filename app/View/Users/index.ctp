<h1>
  Hey
  <?php
  $name=explode(' ',$user['User']['name']);
  echo $name[0]; 
  ?>
</h1>

<p>Did you know your account was created <strong><?php echo $time->niceShort($user['User']['created']); ?></strong>?</p>

<p class="important">We will be extending your user profiles soon such as customizing the calendar subscriptions to your preferences and much more. Make any suggestions on <a href="http://github.com/si/domiary">Github</a> or send a tweet to <a href="http://twitter.com/domiary">@domiary</a>. </p>