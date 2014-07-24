<?php
class UsersController extends AppController {

  var $name = 'Users';
  var $helpers = array('Time');
  var $components = array('Session');

  public function beforeFilter() {
     parent::beforeFilter();
     if($this->action == 'add') {
         $this->Auth->authenticate = $this->User;
     }
     $this->Auth->allow('add','forgot','password');
  }

  public function index() {
//    echo '<textarea style="width:100%;height:400px;">'; var_dump($this->Auth->user()); echo '</textarea>';
    $this->set('user', $this->User->find('first',
      array(
        'conditions'=>array(
          'User.id'=>$this->Auth->user('id')
        )
      )
    ));
  }   

  public function add() {
    if(!empty($this->data)) {
      $saved = $this->User->save($this->data);
      $this->Session->write('User.saved', $saved);
      $logged_in = $this->Auth->login($this->User);
      $this->Session->write('User.logged_in', $logged_in);

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

  public function login() {

  }   

  public function logout() {
    $this->redirect($this->Auth->logout());
  }     

  public function forgot() {
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
  
  public function password($token='') {
    
    // form posted
    if(!empty($this->data)) {
    
      // Check the passwords match first
      if($this->data['User']['password']!=$this->data['User']['password_confirm']) {
        $this->set('error','Passwords don\'t match. Try again!');
      } else {
        // Decode token to get user
        $token = base64_decode($this->data['User']['token']);

        // Check the token includes the colon separator
        if(strpos($token,':')==0) {
          $this->set('error','Token is invalid. Make sure you clicked the correct link from your email.');
        } else {
          
          // Set token email and date variables
          list($email,$date) = explode(':',$token);
          
          // Check the email includes an @ symbol
          if(strpos($email,'@')==0) {
            $this->set('error','Invalid email address.');
          } else {
          
            // Check the token is for today
            if(strtotime($date) != strtotime('Today')) {
              $this->set('error','The token has expired. Please request another one.');
            } else {
            
              // Look up the user account based on email string
              $user = $this->User->find('first',array('conditions'=>array('email'=>$email)));
              
              // Save new password and remove the token (revalidates based on model rules so require confirmation field for comparison)
              $this->User->save(array(
                'User' => array(
                  'id' => $user['User']['id'],
                  'password' => $this->data['User']['password'],
                  'password_confirm' => $this->data['User']['password_confirm'],
                  'token' => 'NULL',
                )
              ));
              $this->set('success','Your shiny new password has been set. You can now log in with it');
              
              $this->set('user', $user);
              // Send email to reset with token
      				$this->Email->to = $user['User']['email'];
      				$this->Email->subject = '[Domiary] New Password';
      				$this->Email->sendAs = 'html';
      				$this->Email->template = 'new_password';
      				$this->Email->helpers = array('Html','Time');
      				$this->Email->send();
              
            } // Token expiration
          } // Email validity
        } // Token validity
      } // Password mismatch
      
    // Form not posted (first load)
    } else {
      // No token
      if($token=='') {
        $this->set('error','No token has been set');
      } else {
        $this->set('token',$token);
//        $this->data['User']['token'] = $token;
      }
      
    }
        
  }

}
