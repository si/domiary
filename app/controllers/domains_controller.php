<?php
class DomainsController extends AppController
{
  var $name = 'Domains';
  var $helpers = array('Time');
  var $components = array('Whois');
  
  function beforeFilter() {
     parent::beforeFilter();
     $this->Auth->allow(array('ics','refresh'));
  }

  function index($filter_key='',$filter_value='',$filter_param='') {
  
    $conditions = array();
    $conditions['user_id'] = $this->Auth->User('id');
  
    if($filter_key=='order' && $filter_value !='') {
      $order = array($filter_value);
    } else {
      $order = array('Domain.expiry', 'Domain.domain_name');
    }
    
    
    $this->set('domains', 
      $this->Domain->find('all', 
        array(
          'conditions' => $conditions,
          'order' => $order
        )
      )
    );
  }

	function view($id = null) {
		$this->Domain->id = $id;
		
		$domain = $this->Domain->read();

    $whois = $this->Whois->lookup($domain['Domain']['domain_name']);
    
		$this->set(compact('domain','whois'));
	}

	function add() {
		if (!empty($this->data)) {

    		$whois_data = $this->Whois->lookup($this->data['Domain']['domain_name']);

    		$this->data['Domain']['registered'] = $whois_data['regrinfo']['domain']['created'];
    		$this->data['Domain']['expiry'] = $whois_data['regrinfo']['domain']['expires'];

  		
			if ($this->Domain->save($this->data)) {
				$this->flash($this->data['Domain']['domain_name'] . ' added', '/domains');
			}
		}
    $this->set('user_id',$this->Auth->User('id'));
	}
	
  function edit($id = null) {
  	$this->Domain->id = $id;
  	if (empty($this->data)) {
  		$this->data = $this->Domain->read();
  	} else {

   		$whois_data = $this->Whois->lookup($this->data['Domain']['domain_name']);
  		$this->data['Domain']['registered'] = $whois_data['regrinfo']['domain']['created'];
  		$this->data['Domain']['expiry'] = $whois_data['regrinfo']['domain']['expires'];

  		if ($this->Domain->save($this->data)) {
  			$this->flash($domain['Domain']['domain_name'] . ' updated','/domains');
  			$this->redirect('/domains/');
  		}
  	}
    $this->set('user_id',$this->Auth->User('id'));
  }
  
	function delete($id) {
		$this->Domain->id = $id;
		$domain = $this->Domain->read();

    $this->Domain->delete($id);
  	$this->flash($domain['Domain']['domain_name'] . ' deleted', '/domains');
  }
  
	function refresh($id) {
	
  	$this->Domain->id = $id;
		$domain = $this->Domain->read();

		if (!empty($domain)) {
		

    		$whois_data = $this->Whois->lookup($domain['Domain']['domain_name']);
    		
        if(isset($whois_data['regrinfo']['domain']['created'])) {
      		$domain['Domain']['registered'] = $whois_data['regrinfo']['domain']['created'];
        }
        if(isset($whois_data['regrinfo']['domain']['expires'])) {
      		$domain['Domain']['expiry'] = $whois_data['regrinfo']['domain']['expires'];
        }
        
        // Loop through raw data to find expiry date
        foreach($whois_data['rawdata'] as $line) {
          if( strpos($line,'Expiry date') !== false) {
            $expiry_date = str_replace('Expiry date: ', '', $line);
            $domain['Domain']['expiry'] = date('Y-m-d',strtotime($expiry_date));
          }
        }

  		
			if ($this->Domain->save($domain)) {
				$this->flash($domain['Domain']['domain_name'] . ' refreshed', '/domains');
			}
		}
	}
  
  function ics($key='') {

    if($key!='') {

      $email = base64_decode($key);

      $this->layout = 'ics';
      $conditions = array('email'=>$email);
      $domains = $this->Domain->find('all',
        array(
          'conditions'=>$conditions
        )
      );
      $this->set('domains',$domains);
    } else {
      $this->set('error','Unique key not specified');
    }

  }
  
}
?>