<?php


use Fuel\Core\View;



class Controller_m2 extends Controller_Template
{

	public $template = 'm2template';
	
	public function action_index() {
		$this->template->current_page = "home";
		$this->template->css = "main.css";
		$this->template->content = View::forge('m2/index');
	}

	public function action_colorForm() {
		$this->template->current_page = "color";
		$this->template->css = "main.css";
		$this->template->content = View::forge('m2/colorForm');
	}

	public function post_color() {
		$row = Input::post('rows');
		$colors = Input::post('colors');	
		$color_entry = array();
        for ($i = 1; $i <= 100; $i++) {
            if (Input::post('color' . $i)) {
                $color_entry[] = Input::post('color' . $i);
            }
        }	
		$name_entry = array();
        for ($i = 1; $i <= 10; $i++) {
            if (Input::post($i)) {
                $name_entry[] = Input::post($i);
            }
        }	

		
		if ($row > 0 && $row <= 26 && $colors > 0 && $colors <= 10){
			$this->template->current_page = "color";
			$this->template->css = "main.css";
			
			$this->template->content = View::forge('m2/colorTable');
			$this->template->content->set('color_entry', $color_entry);
			$this->template->content->set('name_entry', $name_entry);
			
		} 
		else {
			$this->template->current_page = "color";
			$this->template->css = "main.css";
			$this->template->content = View::forge('m2/colorForm');
		}
	}
	

	public function action_about() {
		$this->template->current_page = "about";
		$this->template->css = "main.css";
		$this->template->content = View::forge('m2/about');
	}
}