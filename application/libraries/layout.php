<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


class Layout {
    
    public $CI;
	public $_template = 'main';
	public $_layout = 'default';

    private $_page_data;

    public function __construct($params = null)
    {
		if (!is_array($params)) $params = array();
		if (isset($params['layout'])){
			$this->_layout = $params['layout'];
		}
		if (isset($params['template'])){
			$this->_template = $params['template'];
		}
		$this->_page_data = (object) array(
			'title' 		=> 'basic',
			'content' 		=> '',
			'keywords'		=> '',
			'description'	=> '',
			'og_url' 		=> base_url(),
			'og_image' 		=> '',
			'head' 			=> '',
		);
    }


	public function set_head($head)
	{
		$this->_page_data->head = $head;
	}

	public function set_title($title)
	{
		$this->_page_data->title = $title;
	}

	public function set_keywords($keywords)
	{
		$this->_page_data->keywords = $keywords;
	}

	public function set_description($description)
	{
		$this->_page_data->description = $description;
	}
	public function set_og_url($og_url)
	{
		$this->_page_data->og_url = $og_url;
	}
	public function set_og_image($og_image)
	{
		$this->_page_data->og_image = $og_image;
	}


	public function set_template($template)
	{
		$this->_template = $template;
	}
	public function set_layout($layout)
	{
		$this->_layout = $layout;
	}

	/**
	 * @param string $view
	 * @param array $data
	 * @param bool $return
	 * @return void|string $return
	 */
	public function view($view, $data=null, $return=false)
	{
		$this->CI =& get_instance();
		if ($data == null){
			$data = array();
		}

		$data['page_data'] = $this->_page_data;

	    if (isset($data['page_title']))
			$data['page_data']->title = $data['page_title'];

	    if (isset($data['page_head']))
			$data['page_data']->head = $data['page_head'];

		if (isset($data['page_description']))
			$data['page_data']->description =  $data['page_description'];
		if (isset($data['page_image']))
			$data['page_data']->og_image = $data['page_image'];
		if (isset($data['page_url']))
			$data['page_data']->og_url = $data['page_url'];

		if (isset($data['page_keywords']))
			$data['page_data']->keywords = $data['page_keywords'];

		$data['CI'] = $this->CI;
		$data['page_data']->content = $this->CI->load->view($view,$data,true);
		$view = 'layouts/'.$this->_layout.'/'.$this->_template;


        if ($return) {
            $output = $this->CI->load->view($view, $data, true);
            return $output;
        } else {
            $this->CI->load->view($view, $data, false);
        }
    }
}
