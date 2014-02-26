<?php
class UsersController extends AppController {

  var $name = 'Users';
  var $helpers = array('Time');
  var $components = array('Session');

  function beforeFilter() {
     parent::beforeFilter();
     if($this->action == 'add') {
         $this->Auth->authenticate = $this->User;
     }
     $this->Auth->allow('add','forgot','password');
  }

  function index() {
    $this->set('user', $this->User->find('first',
      array(
        'conditions'=>array(
          'User.id'=>$this->Auth->user('id')
        )
      )
    ));
  }   

  function add() {
    if(!empty($this->data)) {
      $this->User->save($this->data);
      $this->Auth->login($this->User);
      $this->Session->setFlash('Welcome to Domiary! You can now add your first domain.');

      // Send registration email
			$this->Email->to = $this->data['User']['email'];
			$this->Email->bcc = 'simon.jobling@gmail.com';
			$this->Email->subject = 'Welcome to Domiary';
			$this->Email->sendAs = 'html';
			$this->Email->template = 'new_user';
			$this->Email->helpers = array('Html', 'Number', 'Time');
			$this->Email->send();

      $this->redirect(array('controller'=>'domains','action'=>'add'));
    }
  }   

  function login() {

  }   

  function logout() {
    $this->redirect($this->Auth->logout());
  }     

  function forgot() {
    if(!empty($this->data)) {
      // Lookup user account based on email or username
      $account = $this->User->find('first', array(
        'conditions' => array(
          'or' => array(
            'email' => $this->data['User']['email'],
            'username' => $this->data['User']['username']
          )
        )
      ));
      // Found account
      if(!empty($account)) {
        // Create base64 token based on email and current date
        $token = base64_encode($account['User']['email'] . ':' . date('Y-m-d'));
        
        // Save token to user account
        $token_data = array('User' => array(
          'id' => $account['User']['id'],
          'token' => $token
        )
        );
        $this->User->save($token_data);

        $this->set(array('account'=>$account , 'token'=> $token));

        // Send email to reset with token
				$this->Email->to = $account['User']['email'];
				$this->Email->subject = '[Domiary] Reset Password';
				$this->Email->sendAs = 'html';
				$this->Email->template = 'forgot_password';
				$this->Email->helpers = array('Html', 'Number', 'Time');
				$this->Email->send();
    
        
      }
    }
  }
  
  function password($token='') {
    
    // form posted
    if(!empty($this->data)) {
    
      if($this->data['User']['password']!=$this->data['User']['password_confirm']) {
        $this->Error->set('Passwords don\'t match. Try again!');
      } else {
        // decode token to get user
        $token = base64_decode($this->data['User']['token']);
        list($email,$date) = explode(':',$token);
        $user = $this->User->find('first',array('conditions'=>array('email'=>$email)));
        $this->User->save(array(
          'User' => array(
            'id' => $user['User']['id'],
            'password' => $this->data['User']['password'],
            'password_confirm' => $this->data['User']['password_confirm'],
            'token' => 'NULL',
          )
        ));
        $this->set('success','Your shiny new password has been set. You can now log in with it');
      }
      
    } else {
      // No token
      if($token=='') {
        $this->Error->set('No token has been set');
      } else {
        $this->set('token',$token);
        $this->data['User']['token'] = $token;
      }
      
    }
        
  }

}
