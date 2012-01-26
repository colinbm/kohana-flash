<?php defined('SYSPATH') or die('No direct script access.');

class Flash_Core_Flash
{
	
	const SUCCESS = 'success';
	const INFO    = 'info';
	const ERROR   = 'error';
	const WARNING = 'warning';
	
	public function add($message, $type=self::INFO) {
		$session = Session::instance();
		$flashes = $session->get('flashes');
		if (!$flashes) $flashes = array();
		$flashes[] = array('message' => $message, 'type' => $type);
		$session->set('flashes', $flashes);
	}
	
	public function success($message) {
		self::add($message, self::SUCCESS);
	}
	
	public function info($message) {
		self::add($message, self::INFO);
	}
	
	public function error($message) {
		self::add($message, self::ERROR);
	}
	
	public function warning($message) {
		self::add($message, self::WARNING);
	}
	
	public function get() {
		$session = Session::instance();
		$flashes = $session->get('flashes');
		if (!$flashes) $flashes = array();
		return $flashes;
	}
	
	public function get_once() {
		$flashes = self::get();
		self::clear();
		return $flashes;
	}
	
	public function clear() {
		$session = Session::instance();
		$session->set('flashes', array());
	}
	
	public function render() {
		$view = View::factory('flash/flash');
		$view->flashes = self::get_once();
		return $view->render();
	}
	
}