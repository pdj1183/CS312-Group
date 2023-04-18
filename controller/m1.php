<?php

class Controller_m1 extends Controller_Template
{

	public $template = 'm1template';
	public function action_index() {
		$this->template->current_page = "home";
		$this->template->content = View::forge('m1/index');
	}

	public function action_colorForm() {
		$this->template->current_page = "color";
		$this->template->content = View::forge('m1/colorForm');
	}

	public function post_color() {
		$row = Input::post('rows');
		$colors = Input::post('colors');
		if ($row > 0 && $row <= 26){
			$this->template->current_page = "color";
			$this->template->content = View::forge('m1/colorTable');;
		} 
		else {
			$this->template->current_page = "color";
			$this->template->content = View::forge('m1/colorForm');
		}
	}

	public function action_about() {
		$this->template->current_page = "about";
		$this->template->content = View::forge('m1/about');
	}
}