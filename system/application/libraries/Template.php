<?php
/**
 * Template.php
 * Implements a pull-based templating similar to OpenACS
 * --------------------
 * author: Carmelo Capinpin (mello[dot]capinpin[at]gmail[dot]com)
 * date-created: 2008-10-16
 */
class Template {
    
    var $css = array();
    
    function render($view, $data = array())
	{
        $this->CI =& get_instance();
        
		$data['content'] = $this->CI->load->view($view, $data, true);
		
        $ancestors = explode('/', $view);
        
        while ($ancestors)
		{
            unset($ancestors[count($ancestors)-1]);
            
            $ancestor = implode('/', $ancestors);
            
            $template = $ancestor . '/master.php';
            
            if (file_exists(APPPATH . '/views/' . $template))
			{
                $data['content'] = $this->CI->load->view($template, $data, true);
            }
        }
        echo $data['content'];
    }
	
	function block($content)
	{
		$this->CI =& get_instance();
		if (file_exists(APPPATH . 'views/' . THEME . '/block.php'))
		{
			$content = $this->CI->load->view(THEME . '/block', array('content'=>$content), true);
		}
		return $content;
	}
	
	function widget($view, $data = array())
	{
		$this->CI =& get_instance();
		$content = $this->CI->load->view($view, $data, true);
		return $this->block($content);
	}
    
    function add_css($css)
	{
    	$this->css[] = $css;
    }
}

/* End of file 'Template.php' */