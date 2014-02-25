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
     $this->Auth->allow('add','forgot');
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

        // TODO: Send email to reset
        
        // Output link for email
        
        $this->set('token', $token);
        
      }
    }
  }
  
  function password($token) {
    
    // No token
    
    // Invalid token
    
    // Valid token
    
    // Valid passwords
    
    
    
    
  }

}
