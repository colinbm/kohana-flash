<?php defined('SYSPATH') or die('No direct script access.');

class Flash_Core_Flash
{
	
	const SUCCESS = 'success';
	const INFO    = 'info';
	const ERROR   = 'error';
	const WARNING = 'warning';
	
	public static function add($message, $type=self::INFO) {
		$session = Session::instance();
		$flashes = $session->get('flashes');
		if (!$flashes) $flashes = array();
		$flashes[] = array('message' => $message, 'type' => $type);
		$session->set('flashes', $flashes);
	}
	
	public static function success($message) {
		self::add($message, self::SUCCESS);
	}
	
	public static function info($message) {
		self::add($message, self::INFO);
	}
	
	public static function error($message) {
		self::add($message, self::ERROR);
	}
	
	public static function warning($message) {
		self::add($message, self::WARNING);
	}
	
	public static function get() {
		$session = Session::instance();
		$flashes = $session->get('flashes');
		if (!$flashes) $flashes = array();
		return $flashes;
	}
	
	public static function get_once() {
		$flashes = self::get();
		self::clear();
		return $flashes;
	}
	
	public static function clear() {
		$session = Session::instance();
		$session->set('flashes', array());
	}
	
	public static function render() {
		$view = View::factory('flash/flash');
		$view->flashes = self::get_once();
		return $view->render();
	}
	
}