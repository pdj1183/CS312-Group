<?php

class Controller_m1 extends Controller_Template
{

	public $template = 'm1template';
	public function action_index() {
		$this->template->content = View::forge('m1/index');
	}
}