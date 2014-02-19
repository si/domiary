<h1>Authenticate <?php echo $domain['Domain']['domain_name']; ?></h1>

<?php 
//var_dump($domain);

switch($method) { 
  case 'email': ?>

  <h2>You have mail</h2>  
  <p>We have sent an email to <?php echo $domain['User']['email']; ?> – the email registered with your domain name.</p>
  <p>Please click the link in the email to authenticate your domain or enter the code below.</p>

  <?php echo $this->Html->link('Apply code', array('action'=>'check_email',$domain['Domain']['id']), array('class'=>'cta')); ?>

<?php
    break;
  case 'ftp': ?>

  <h2>FTP time</h2>  
  <p>Upload the <?php echo $this->Html->link('authentication.txt', array('action'=>'file',$domain['Domain']['id'])); ?> file to the root of your server then <?php echo $this->Html->link('ping it', array('action'=>'ftp',$domain['Domain']['id'])); ?></p>

  <?php echo $this->Html->link('Ping the file', array('action'=>'check_ftp',$domain['Domain']['id']), array('class'=>'cta')); ?>
  
<?php 
  break;
  case 'html': ?>
  
  <h2>Edit your content</h2>
  <p>Add the following META tag to your root document (home page) then we can <?php echo $this->Html->link('detect it', array('action'=>'html',$domain['Domain']['id'])); ?></p>
  
  <code><pre>&lt;meta name="domiary:owner" value="XXXXXXXXX" /&gt;</pre></code>  
  
  <?php echo $this->Html->link('Detect META tag', array('action'=>'check_html',$domain['Domain']['id']), array('class'=>'cta')); ?>
  
<?php
  break;
} // method switch ?>