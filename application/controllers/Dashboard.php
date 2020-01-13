<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','form','language','privillege'));
		$this->load->model('masafi_model','',TRUE);
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');

		$this->user_id ='';
		if (!$this->ion_auth->logged_in()){

			redirect('auth/login', 'refresh');

		}else{
			$this->user_id 		= $this->ion_auth->user()->row()->id;
			$this->user_name 	= $this->ion_auth->user()->row()->first_name;
		}

	}

	public function index()
	{
		$data['customers'] = $this->masafi_model->get_all_customers()->num_rows();
		$data['products'] = $this->masafi_model->get_all_product()->num_rows();


			$approvals=array(
				'status!='=>'2'
			);
		if($this->ion_auth->in_group('supervisor')){
					$approvals=array(
						'status!='=>'2',
						'supervisor_approve'=>'0'
					);
		}
		if($this->ion_auth->in_group('accounts')){
					$approvals=array(
						'status!='=>'2',
						'supervisor_approve'=>'1',
						'accounts_approve'=>'0'
					);
		}
		if($this->ion_auth->in_group('sales manger')){
						$approvals=array(
							'status!='=>'2',
							'supervisor_approve'=>'1',
							'accounts_approve'=>'1',
							'manager_approve'=>'0'
						);
		}
		$data['getapprovals'] = $this->masafi_model->getapprovals($approvals)->num_rows();

	//	die();
		$data['checker'] = check_privilege('1',$this->user_id);
		$data['title'] = 'Dashboard';
		$data['users'] = $this->ion_auth->users(3)->result(); // Pass groups array as params
		$this->load->view('templates/header', $data);
		$this->load->view('pages/dashboard', $data);
		$this->load->view('templates/footer', $data);

	}
	public function approvallist(){



				$approvals=array(
						'sr.status!='=>'3'
				);
				if($this->ion_auth->in_group('supervisor')){
							$approvals=array(
								'sr.status!='=>'2',
								'sr.supervisor_approve'=>'0'
							);
				}
				if($this->ion_auth->in_group('accounts')){
							$approvals=array(
								'sr.status!='=>'2',
								'sr.supervisor_approve'=>'1',
								'sr.accounts_approve'=>'0'
							);
				}
				if($this->ion_auth->in_group('sales manger')){
								$approvals=array(
									'sr.status!='=>'2',
									'sr.supervisor_approve'=>'1',
									'sr.accounts_approve'=>'1',
									'sr.manager_approve'=>'0'
								);
				}
				$queryType='where';
				$data['salesreturn'] = $this->masafi_model->joingetapprovals($approvals,$queryType)->result();
				//die($this->db->last_query());
				$data['title'] = 'Approval List';
				$this->load->view('templates/header', $data);
				$this->load->view('masafi/approval_view', $data);
				$this->load->view('templates/footer', $data);


	}

	public function customers(){
		$data['title'] = 'Customers';
		$data['customers'] = $this->masafi_model->get_all_customers()->result();
		$this->load->view('templates/header', $data);
		$this->load->view('masafi/customers', $data);
		$this->load->view('templates/footer', $data);

	}
	public function customer_view($id=0){
		$data['customer']= $this->masafi_model->get_customer_by_id($id)->row();
		$data['products']= $this->masafi_model->get_all_product()->result();
		$data['salesorder']= $this->masafi_model->get_sorder_by_cust_id($id)->result();
		$data['salesreturn']= $this->masafi_model->get_salesreturn_bySOID($id)->result();

		if (isset($data['customer']))
		{
				 $data['title'] = $data['customer']->customer_name;
				 $this->load->view('templates/header', $data);
				 $this->load->view('masafi/customer_view', $data);
				 $this->load->view('templates/footer', $data);

		}else{
				redirect('/', 'refresh');
		}


	}

//Sales Orders
 function salesorder(){

	 if(!empty($this->input->post(NULL, TRUE))){
		 $customerID = $this->input->post('customer_id', TRUE);
		 $OrdeDate = $this->input->post('orderdate', TRUE);
		 $newDate = str_replace('/', '-', $OrdeDate);
		 $FormOrderDate = date("Y-m-d", strtotime($newDate));
		 //die($FormOrderDate);

		 $postData = array(
			'sales_name'=>$this->input->post('salesordername', TRUE),
			'sales_desc'=>$this->input->post('orderdescription', TRUE),
			'product'=>json_encode($this->input->post('product', TRUE)),
			'qty'=>json_encode($this->input->post('qty', TRUE)),
			'price'=>json_encode($this->input->post('price', TRUE)),
			'total'=>json_encode($this->input->post('total', TRUE)),
			'sales_vat'=>$this->input->post('tax_amount', TRUE),
			'sales_price'=>$this->input->post('total_amount', TRUE),
			'customer_id'=>$customerID,
			'sales_date'=>$FormOrderDate,
			//'delivery_date'=>$this->input->post('salesordername', TRUE),
			'created_at'=>date("Y-m-d"),
			'updated_at'=>date("Y-m-d"),
			'status'=>1,
			'created_user'=>1,
			'updated_user'=>1,
		);
		$result=$this->masafi_model->create_sales($postData);

		 if($result){
	redirect('customers/'.$customerID, 'refresh');
		 }else{
			 echo "Error";
		 }
	 }

 }
public function getsales($id=0){
		$msg['requests']= $this->masafi_model->getsalesorder_by_id($id)->result();
		$msg['msg'] = 1;
		die(json_encode($msg));
}
public function getreturnorder($id=0){
		$msg['requests']= $this->masafi_model->getreturnorder_by_id($id)->result();
		$msg['msg'] = 2;
		die(json_encode($msg));
}
public function returnorder(){

		 if(!empty($this->input->post(NULL, TRUE))){
			 $customerID = $this->input->post('customer_id', TRUE);
			 $request_date = $this->input->post('request_date', TRUE);
			 $newDate = str_replace('/', '-', $request_date);
			 $FormRqstDate = date("Y-m-d", strtotime($newDate));
			 //die($FormOrderDate);

			 $postData = array(
				'salesid'=>$this->input->post('salesid', TRUE),
				'product'=>json_encode($this->input->post('product', TRUE)),
				'qty'=>json_encode($this->input->post('qty', TRUE)),
				'returnqty'=>json_encode($this->input->post('returnqty', TRUE)),
				'reason'=>$this->input->post('reason', TRUE),
				'request_date'=>$FormRqstDate,
				//'delivery_date'=>$this->input->post('salesordername', TRUE),
				'created_at'=>date("Y-m-d"),
				'updated_at'=>date("Y-m-d"),
				'status'=>0,
				'created_user'=>1,
				'updated_user'=>1,
			);
			$result=$this->masafi_model->create_salesreturn($postData);

			 if($result){
				 	redirect('customers/'.$customerID, 'refresh');
			 }else{
				 echo "Error";
			 }
		 }




//	echo "<pre>";
//  print_r($this->input->post(NULL, TRUE));
}

// Product MASTER

public function procutmaster(){
			$data["title"]='Product Master';
			$data["products"] = $this->masafi_model->get_all_product()->result();
			$this->load->view('templates/header', $data);
			$this->load->view('masafi/productmaster', $data);
			$this->load->view('templates/footer', $data);
}

//Approve Process // Supervisor // Accountant // Sales Manager
public function approve($id=0){
		$RetunrChecker = $this->masafi_model->getreturnorder_by_id($id)->row();
		$msg["success"] =false;
		$msg["returnid"] = $id;
		$msg["RetunrChecker"] = json_encode($RetunrChecker);
		if(!empty($RetunrChecker)){


			if(!$RetunrChecker->supervisor_approve AND $this->ion_auth->in_group('supervisor')){
					$data = array('supervisor_approve' => 1);
					$msg["approve"] = $this->masafi_model->approve($id,$data);
						$msg["success"] ="approved";
						$msg["group"] = "supervisor";
			}

			if($RetunrChecker->supervisor_approve AND !$RetunrChecker->accounts_approve
					AND $this->ion_auth->in_group('accounts')){
							$data = array('accounts_approve' => 1);
							$msg["approve"] = $this->masafi_model->approve($id,$data);
								$msg["success"] ="approved";
									$msg["group"] = "accountant";
			}

			if($RetunrChecker->supervisor_approve AND $RetunrChecker->accounts_approve
						AND !$RetunrChecker->manager_approve AND $this->ion_auth->in_group('sales manger')){
									$data = array('manager_approve' => 1,'status'=>1);
									$msg["approve"] = $this->masafi_model->approve($id,$data);
									$msg["success"] ="approved";
									$msg["group"] = "sales manger";
			}else{}
		}


		die(json_encode($msg));
}
public function disapprove($id=0){
	$RetunrChecker = $this->masafi_model->getreturnorder_by_id($id)->row();
	$msg["success"] =false;
	$msg["returnid"] = $id;
	if(!empty($RetunrChecker)){


		if(!$RetunrChecker->supervisor_approve AND $this->ion_auth->in_group('supervisor')){
				$data = array('supervisor_approve' =>'0','status'=>'2');
				$msg["approve"] = $this->masafi_model->approve($id,$data);
				$msg["success"] ="disapproved";

		}

		if($RetunrChecker->supervisor_approve AND !$RetunrChecker->accounts_approve
				AND $this->ion_auth->in_group('accounts')){
						$data = array('accounts_approve' =>'0','status'=>'2');
						$msg["approve"] = $this->masafi_model->approve($id,$data);
						$msg["success"] ="disapproved";

		}

		if($RetunrChecker->supervisor_approve AND $RetunrChecker->accounts_approve
					AND !$RetunrChecker->manager_approve AND $this->ion_auth->in_group('sales manger')){
									$data = array('manager_approve' =>'0','status'=>'2');
								$msg["approve"] = $this->masafi_model->approve($id,$data);
								$msg["success"] ="disapproved";

		}else{}
	}


	die(json_encode($msg));
}

function search(){
		//cust_id, cust_name, sales_order_ID, SalesReturn_ID
	$type = $this->input->get('typ', TRUE);
	$searchText = $this->input->get('text', TRUE);
	$queryType='where';
	if($type=='cust_id' AND !empty($searchText)){
		$search = array(
			'c.customer_id'=>$searchText
		);
	}
	if($type=='cust_name' AND !empty($searchText)){
		$search = array(
			'c.customer_name'=>$searchText
		);
		$queryType='like';
	}
	if($type=='sales_order_ID' AND !empty($searchText)){
		$search = array(
			'sm.sales_id'=>$searchText
		);
	}
	if($type=='SalesReturn_ID' AND !empty($searchText)){
		$search = array(
			'sr.return_id'=>$searchText
		);
	}
	$data['customers'] = $this->masafi_model->joingetapprovals($search,$queryType)->result();
	$data['title'] = 'Customers';

	$this->load->view('templates/header', $data);
	$this->load->view('masafi/customers', $data);
	$this->load->view('templates/footer', $data);


}

//LOGS
	function logs(){

		if($this->ion_auth->is_admin()){
		$data['title'] = 'logs';
		$data['all_logs'] = $this->masafi_model->all_logs();
		$this->load->view('templates/header', $data);
		$this->load->view('pages/logs', $data);
		$this->load->view('templates/footer', $data);
		}else{redirect();}
	}
	function log_search(){
		if($this->ion_auth->is_admin()){
			$logs = $this->input->get('log');
			if($logs !=''){
				$data['title'] = 'logs';
				$data['all_logs'] = $this->masafi_model->logs_search($logs);
				$this->load->view('templates/header', $data);
				$this->load->view('pages/logs', $data);
				$this->load->view('templates/footer', $data);
			}else{redirect('logs');}
		}else{redirect();}

	}


	function emformat($em) {
		if ($em=='[]') {
			$this->form_validation->set_message('emformat', '{field} * required , default add <b style="color:#FFEB3B">" example@shuraa.com " </b>');
			return false;
		} else {
			return true;
		}
	}
	function phformat($em) {
		if ($em=='[]') {
			$this->form_validation->set_message('phformat', '{field} * required , default add <b style="color:#FFEB3B">" 99999 "</b>');
			return false;
		} else {
			return true;
		}
	}



}
