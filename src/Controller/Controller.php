<?php

namespace App\Controller;

class Controller {

	private $container;

	public function __construct($container) {
		$this->container = $container;
	}

	public function render($response, $file, $args = []) {
		return $this->container->view->render($response, $file, $args);
	}

	public function flash() {
		return $this->container->flash;
	}

	public function logger() {
		return $this->container->logger;
	}

	public function csrf() {

		return $this->container->csrf;
	}

	public function mail() {
		return $this->container->mail;
	}
}