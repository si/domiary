<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {

  public $helpers = array('Html','Form','Time');
	public $components = array('Auth', 'Session', 'Email');
	public $uses = array('AppUser');

	public function beforeRender() {
		$this->set('authuser', $this->AppUser->read(null, $this->Auth->user('id')));
	}

  public function beforeFilter() {

    $this->Auth->allow('display');
    $this->Auth->loginRedirect = array('controller'=>'domains', 'action'=>'index');

    $this->Email->smtpOptions = array(
      'port'=>'587',
      'timeout'=>'30',
      'host' => 'smtp.sendgrid.net',
      'username'=>'simon.jobling@gmail.com',
      'password'=>'B34tr1c3',
      'client' => 'Domiary'
    );
    $this->Email->from    = 'Domiary <you-can-reply@domiary.us>';

  }


}
