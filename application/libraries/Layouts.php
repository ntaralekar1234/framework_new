<?php
class Layouts
{
	//this class is not extended from any of the codeigniter class so to use
	//codeigniter instance we use this variable
	private $CI;

	private $layout_title = NULL;
	private $title_separator = ' | ';

	//to include css, js
	private $includes = array();
	private $css = array();
	private $js = array();
	private $custom_js = array();

	public function __construct()
	{
		//assign codeigniter instance to CI
		$this->CI =& get_instance();
	}

	public function set_title($title)
	{
		$this->layout_title = $title;
	}

	public function view($view_name, $params = array(), $layout = 'default')
	{
		//third param of view method tells the codeigniter to return the data don't send directly to
		//the browser
		$view_content = $this->CI->load->view($view_name, $params, TRUE);

		$params['layout_content'] = $view_content;
		$params['layout_title'] = $this->layout_title;

		//loads the layout view
		//we are not going to pass third param to view() because we want to send this output to the browser
		$this->CI->load->view('layouts/'.$layout, $params);
	}

	public function add_js($path, $prepend_base_url = TRUE)
	{
		//add default js
		if ($prepend_base_url)
		{
			$this->CI->load->helper('url');
			$this->js[] = base_url('assets/'.$path);
		}
		else
		{
			//if file loaded from CDN
			$this->js[] = $path;
		}

		return $this; //$this->add_include('file')->add_include('file')->add_include('file')
	}

	public function add_css($path, $prepend_base_url = TRUE)
	{
		//add default css
		$this->CI->load->helper('url');

		if ($prepend_base_url)
		{
			$this->css[] = base_url('assets/'.$path);
		}
		else
		{
			//if file loaded from CDN
			$this->css[] = $path;
		}

		return $this; //$this->add_include('file')->add_include('file')->add_include('file')
	}

	public function add_custom_js($path)
	{
		$this->CI->load->helper('url');
		$this->custom_js[] = base_url('assets/'.$path);
	}

	public function print_custom_js()
	{
		$final_js = '';
		foreach($this->custom_js as $js)
		{
			$final_js .= '<script type="text/javascript" src="'.$js.'"></script>';
		}
		return $final_js;
	}

	public function print_js()
	{
		$this->add_common_js();

		$final_js = '';
		foreach ($this->js as $js)
		{
			$final_js .= '<script type="text/javascript" src="'.$js.'"></script>';
		}

		return $final_js;
	}

	public function add_common_js()
	{

		$this->js[] = base_url('assets/demo/default/js/jquery.min.js');
		$this->js[] = base_url('assets/demo/default/js/popper.js');
		$this->js[] = base_url('assets/demo/default/plugins/bootstrap/js/bootstrap.min.js');
		$this->js[] = base_url('assets/demo/default/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js');
		$this->js[] = base_url('assets/demo/default/js/sweetalert.js');
		$this->js[] = base_url('assets/demo/default/js/scripts.js');
	}

	public function add_common_css()
	{

		$this->css[] = base_url('assets/demo/default/plugins/bootstrap/css/bootstrap.min.css');
		$this->css[] = base_url('assets/demo/default/base/icons.css');
		$this->css[] = base_url('assets/demo/default/plugins/toggle-menu/sidemenu.css');
		$this->css[] = base_url('assets/demo/default/base/style.css');

	}

	public function print_css()
	{
		$this->add_common_css();
		$final_css = '';
		foreach ($this->css as $css)
		{
			$final_css .= '<link rel="stylesheet" href="'.$css.'"  />';
		}

		return $final_css;
	}
}