<?php
class UsersController extends AppController {

        var $name = 'Users';
        var $helpers = array('Time');

        function beforeFilter() {
           parent::beforeFilter();
           if($this->action == 'add') {
               $this->Auth->authenticate = $this->User;
           }
           $this->Auth->allow('add');
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
              $this->Auth->login();
              $this->redirect(array('controller'=>'domains','action'=>'index'));
            }
        }   

        function login() {

        }   

        function logout() {
            $this->redirect($this->Auth->logout());
        }     

    }
    
    ?>