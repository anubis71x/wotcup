<?php
    /*
	*
    * User module, represents user...
	* @author Khramkov Ivan.
	* 
	*/
    require_once(dirname(__FILE__).'/../../include/module.class.php');
    class User extends Module {
	    /*
		* Name of the module
		*@var string
		*/
	    protected $name = 'user';
		/*
		* Constructor
		*@param object $config
		*@param integer|null $user_id
		*/
	    function __construct($config, $params = NULL) {
		    $this->section = $this->name;
		    Simple::__construct($config, 'players', $params);
		}
		/*
		*@function get_id
		*@param array $params
		*/
		public function get_id() {
		    return parent::__call('get_player_id');
		}
	}
?>