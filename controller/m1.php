<?php

class Controller_m1 extends Controller_Template
{

	public $template = 'm1template';
	public function action_index() {
		$this->template->current_page = "home";
		$this->template->content = View::forge('m1/index');
	}

	public function action_color() {
		$this->template->current_page = "color";
		$this->template->content = View::forge('m1/color');
	}

	public function action_about() {
		$this->template->current_page = "about";
		$this->template->content = View::forge('m1/about');
	}
	
	public function ValidateInputParams($rows, $colors) {
		// This is in regard to paragraph two but may not be neccessary
		// due to including 'required' in the input type: 

		// if(rows < 1 || rows > 26) {
		// 	Print error is a work in progress
		// 	try {
		// 		$this->response->("Row is not valid", 400);
		// 	} catch() {}
		// }
		// if(colors < 1 || colors > 10) {
		// }




		// This is in regard to generating two tables - def uses a for loop
		// Currently doesn't work

		// echo '<table>';
		// for ($i = 1; $i <= 10; $i++)
		// echo '<tr><td>' . $i*$i . "</td></tr>";
		// echo '</table>';
	}
}
