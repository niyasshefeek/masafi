<?php defined('BASEPATH') OR exit('No direct script access allowed');

class File_upload {
		
	 protected $CI;
		
     public function __construct()
     {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
				$this->CI->load->library('upload');
				
     }
		
		
	function do_upload($files,$typ,$return=FALSE)
	{
	$filename = array();
   
    $cpt = count($files['attachment']['name']);
	$string_replace1 = array(' ','(',')',',','"',';');
		for($i=0; $i<$cpt; $i++)
		{           
			$_FILES['attachment']['name']= $files['attachment']['name'][$i];
			$_FILES['attachment']['type']= $files['attachment']['type'][$i];
			$_FILES['attachment']['tmp_name']= $files['attachment']['tmp_name'][$i];
			$_FILES['attachment']['error']= $files['attachment']['error'][$i];
			$_FILES['attachment']['size']= $files['attachment']['size'][$i];    
			$files_name = $typ.'_'. date('Y_M_d').'_'.str_replace($string_replace1,'_',$_FILES['attachment']['name']);
			$this->CI->upload->initialize($this->set_upload_options($files_name));
			$this->CI->upload->do_upload('attachment');
			$filename[] = $files_name ;
		}
		
		if($return){
			return $filename;
		}
	}


	private function set_upload_options($files_name)
	{   
  // upload an image options
    $config = array();
    $config['upload_path'] = APPPATH. '../assets/uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']      = '0';
	$config['allowed_types'] = 'doc|pdf|docx|jpeg|png|jpg|xls|xlsx';
	$config['max_size']	= '10240';
	$config['file_name'] =$files_name;
    //$config['overwrite']     = FALSE;
    return $config;
	}
		
		
		
		
}