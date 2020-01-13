<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masafi_model extends CI_Model
{
	private $log_files	= 'log_details';
	private $user				= 'users';
	private $modules 		= '_modules';
	private $customers	= 'customermaster';
	private $products		= 'productmaster';
	private $sales			= 'salesmaster';
	private $salesorder	= 'salesorder';
	private $salesreturn= 'salesreturn';
	function __construct(){
		parent::__construct();
	}

//CUSTOMERS
//customer_id	customer_name	customer_address	created_at	updated_at
//status	created_user	updated_user
function get_all_customers(){
	$this->db->order_by("customer_id", "asc");
	return $this->db->get($this->customers);
}
function get_customer_by_id($id){
	$this->db->where(array('customer_id'=>$id));
	return $this->db->get($this->customers);
}
//PRODUCT MASTER
//product_id	product_name	product_desc	product_img	product_price
//created_at	updated_at	status	created_user	updated_user
function get_all_product(){

	$this->db->select('*');
	$this->db->from('productmaster as p');
	$this->db->join('product_type as t', 'p.type = t.type_id');
	$this->db->where(array('status'=>1));
	$this->db->order_by("product_id", "DESC");
	return $this->db->get();

	$this->db->order_by("product_name", "asc");
	$this->db->where(array('status'=>1));
	return $this->db->get($this->products);
}
//SALES MASTER
//sales_id	sales_name	sales_desc	product	qty	price	total	sales_vat
//sales_price	customer_id	sales_date	delivery_date	created_at	updated_at
//status	created_user	updated_user
function create_sales($postData){
		$this->db->insert($this->sales, $postData);
		return $this->db->insert_id();}

function get_sorder_by_cust_id($id){
			$this->db->order_by("created_at", "DESC");
			$this->db->where(array('customer_id'=>$id));
			return $this->db->get($this->sales);
		}
function getsalesorder_by_id($id){
			$this->db->where(array('sales_id'=>$id));
			return $this->db->get($this->sales);
		}
//SALES Return
function create_salesreturn($postData){
		$this->db->insert($this->salesreturn, $postData);
		return $this->db->insert_id();}

function get_salesreturn_bySOID($id){
		$this->db->select('so.*');
		$this->db->from('salesreturn as so');
		$this->db->join('salesmaster as sm', 'so.salesid = sm.sales_id');
		$this->db->where(array('sm.customer_id'=>$id));
		$this->db->order_by("return_id", "DESC");
		return $this->db->get();
}
function getreturnorder_by_id($id){
	$this->db->where(array('return_id'=>$id));
	return $this->db->get($this->salesreturn);
}
function getapprovals($where){
	$this->db->where($where);
	return $this->db->get($this->salesreturn);
}
function joingetapprovals($where,$queryType){
	$this->db->select('c.customer_id,c.customer_name,c.customer_address,sm.sales_id, sr.*');
	$this->db->from('customermaster as c');
	$this->db->join('salesmaster as sm', 'c.customer_id = sm.customer_id', 'left');
	$this->db->join('salesreturn as sr', 'sm.sales_id = sr.salesid', 'left');
	$this->db->$queryType($where);
	$this->db->order_by("sr.return_id", "DESC");
	$this->db->group_by("c.customer_id");
	return $this->db->get();
}


function approve($id,$data){
	$this->db->where('return_id', $id);
	return $this->db->update($this->salesreturn, $data);
//	return $this->db->last_query();
}


//LOG FILES
function save_log($id){
		$this->db->insert($this->log_files, $id);
		return $this->db->insert_id();}

function all_logs(){
			$this->db->order_by("log_date", "DESC");
			return $this->db->get($this->log_files,400)->result();
	}
function logs_search($logs){
			$this->db->like('log_data', $logs);
			$this->db->or_like('log_user', $logs);
			$this->db->or_like('log_date', $logs);
			$this->db->order_by("log_date", "DESC");
			return $this->db->get($this->log_files,400)->result();
	}

//Modules
	function get_all_modules($id){
	//id_mod, name_mod, details_mod, add_date_mod, upd_date_mod, status

			$this->db->where(array('status'=> '1'));
			$this->db->order_by("id_mod", "asc");
			$this->db->join('access_module as acc', 'mod.id_mod = acc.id_module');
			$this->db->where(array('user_id'=>$id));
			//$this->db->where_not_in('id_mod',array(2,5));

			return $this->db->get("$this->modules as mod")->result_array();


	}
	function get_modules_by_page($id,$user_id){
	//id_mod, name_mod, details_mod, add_date_mod, upd_date_mod, status
			//$this->db->select($parm);
			$this->db->where(array('status'=> '1'));
			$this->db->order_by("id_mod", "asc");
			$this->db->join('access_module as acc', 'mod.id_mod = acc.id_module');
			$this->db->where(array('id_mod'=>$id,'user_id'=>$user_id));
			//$this->db->where_not_in('id_mod',array(2,5));

			return $this->db->get("$this->modules as mod")->row_array();


	}


}
