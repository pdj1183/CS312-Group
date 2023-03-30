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

	public function ValidateInputParams() {
		$rows = $_GET['rows'];
		$colors = $_GET['colors'];

		echo '<table>';
		for ($i = 1; $i <= $rows; $i++) {
			echo '<tr><td>' . $i . '</td><td>' . ($i * $i) . '</td></tr>';
		}
		echo '</table>';
	}
}

?>
