<p>Hi <?php echo $account['User']['name']; ?>,</p>
<p>This is an email reminder that your new password has been set.</p>
<p>If this was done in error, please <?php echo $this->Html->link('change it again on our website', 'http://' . $_SERVER['SERVER_NAME'] . '/users/forgot/'); ?> 
</p>
<p><em>- Love, Domiary</em></p>