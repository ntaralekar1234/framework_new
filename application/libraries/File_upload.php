<?php
//include_once('../system/libraries/Log.php');

class File_upload
{
	private $CI;
	public function __construct()
	{
		$this->CI =& get_instance();
	}
	
	public function upload_file($param = array())
	{
		$upload_path = '/';
		
		if(array_key_exists('rename_as', $param)){
			$upload_config['file_name'] = $param['rename_as'];
		}		
		
		//if upload path is set then upload file in given path
		if(array_key_exists('upload_path', $param))
		{
			$upload_path .= $param['upload_path'].'/';
			$upload_config['upload_path'] = './uploads/img/'.$param['upload_path'].'/';
		}
		else		
		{
			//if upload path is not given then upload file in default path
			$upload_config['upload_path'] = './uploads/img/';
		}
		
		//$upload_config['overwrite'] = TRUE;
		$upload_config['overwrite'] = FALSE;
		$upload_config['allowed_types'] = $param['allowed_types'];
		$upload_config['remove_spaces'] = TRUE;
		
		if(array_key_exists('max_size', $param)){
			//if max size is set
			$upload_config['max_size'] = $param['max_size'];
		}		
		
		$this->CI->load->library('upload', $upload_config);
		/* $param['file_name'] is input field name  */
		if(!$this->CI->upload->do_upload($param['input_field_name'])){			
			echo '<br/>FILE UPLOAD ERROR <br/>'.$this->CI->upload->display_errors();
			exit;
			return array('status' => FAILURE, 'error_msg' => $this->CI->upload->display_errors());
		}
		$upload_data = $this->CI->upload->data();
		$file_name = $upload_data['file_name'];
		
		//resize image 
		//load image library
		$image_config['image_library'] = 'gd2';
		$image_config['source_image'] = $upload_data['full_path'];
		$image_config['new_image'] = './uploads/img'.$upload_path.'thumb/';
		$image_config['height'] = $param['thumbnail_height'];
		$image_config['width'] = $param['thumbnail_width'];
		$image_config['overwrite'] = TRUE;
		$this->CI->load->library('image_lib', $image_config);
		$this->CI->image_lib->resize();
		
		/*$image_config['new_image'] = './uploads/img/blogs/370x247/';
		$image_config['height'] = 247;
		$image_config['width'] = 370;
		$this->image_lib->initialize($image_config);
		$this->image_lib->resize();*/
		
		return array('status' => SUCCESS, 'file_name' => $file_name);
	}
	
	public function upload_single_file($param = array())
	{
		$upload_path = '/';
		$upload_config['file_name'] = $param['rename_as'];
		if(array_key_exists('upload_path', $param))
		{
			$upload_path .= $param['upload_path'].'/';
			$upload_config['upload_path'] = './uploads/img/'.$param['upload_path'].'/';
		}else
		{
			$upload_config['upload_path'] = './uploads/img/';
		}
		$upload_config['overwrite'] = TRUE;
		$upload_config['allowed_types'] = $param['allowed_types'];
		$upload_config['remove_spaces'] = TRUE;
		$upload_config['max_size'] = $param['max_size'];
		$upload_config['width'] = $param['width'];
		$upload_config['height'] = $param['height'];
		
		$this->CI->load->library('upload', $upload_config);
		/* $param['file_name'] is input field name  */
		if(!$this->CI->upload->do_upload($param['input_field_name'])){			
			echo '<br/>FILE UPLOAD ERROR <br/>'.$this->CI->upload->display_errors();
			exit;
			return array('status' => FAILURE, 'error_msg' => $this->CI->upload->display_errors());
		}
		
		$upload_data = $this->CI->upload->data();
		$file_name = $upload_data['file_name'];
		
		//resize image 
		//load image library
		/* $image_config['image_library'] = 'gd2';
		$image_config['source_image'] = $upload_data['full_path'];
		$image_config['new_image'] = './uploads/img'.$upload_path.'thumbnails/';
		$image_config['height'] = $param['thumbnail_height'];
		$image_config['width'] = $param['thumbnail_width'];
		$image_config['overwrite'] = TRUE;
		$this->CI->load->library('image_lib', $image_config);
		$this->CI->image_lib->resize(); */
		
		/*$image_config['new_image'] = './uploads/img/blogs/370x247/';
		$image_config['height'] = 247;
		$image_config['width'] = 370;
		$this->image_lib->initialize($image_config);
		$this->image_lib->resize();*/
		
		return array('status' => SUCCESS, 'file_name' => $file_name);
	}
}