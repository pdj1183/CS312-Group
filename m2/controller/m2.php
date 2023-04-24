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

		
		if ($row > 0 && $row <= 26 && $colors > 0 && $colors <= 10){
			$this->template->current_page = "color";
			$this->template->css = "main.css";
			$this->template->content = View::forge('m2/colorTable');
			
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