<p>Hi <?php echo $account['User']['name']; ?>,</p>
<p>It appears you have forgotten your password to Domiary.</p>
<p>Don't worry - just
<?php echo $this->Html->link('reset it with your temporary password', 'http://' . $_SERVER['SERVER_NAME'] . '/users/password/' . $token); ?>
and you'll be back in.
</p>
<p><strong>Bear in mind this password is only valid for today (<?php echo $this->Time->format('l jS F Y',strtotime('Today')); ?>) so don't take too long.</strong></p>
<p><em>- Love, Domiary</em></p>
