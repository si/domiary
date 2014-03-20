<?php
class AppController extends Controller {

  var $components = array('Auth','Email');

  function beforeFilter() {

    $this->Auth->allow('display');
//    $this->Auth->loginRedirect = array('controller'=>'users', 'action'=>'index');

    $this->Email->smtpOptions = array(
      'port'=>'587',
      'timeout'=>'30',
      'host' => 'smtp.sendgrid.net',
      'username'=>'simon.jobling@gmail.com',
      'password'=>'B34tr1c3',
      'client' => 'domiary'
    );
    $this->Email->from    = 'Domiary <domiary@unstyled.com>';

  }

}
