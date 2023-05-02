<?php
	class chat {
		var $id = '';
		var $user_id = 0;
		var $message = '';

		function __construct($id = '') {
			if ($id != '') {
				$this->load_chat(safeescapestring(db()->nomysqlinj($id)));
			}
		}

		function get_id() {
			return $this->id;
		}

		function set_id($id) {
			$this->id = $id;
		}

		function get_user_id() {
			return $this->user_id;
		}

        function set_user_id($user_id) {
            $this->user_id = $user_id;
        }

		function set_message($message) {
			$this->message = $message;
		}
		
		function get_message() {
			return $this->message;
		}


		function set_parametrs($id, $user_id, $message, $time) {
 			$this->set_id($id);
			$this->set_user_id($user_id);
			$this->set_message($message);
		}

		function set_parametrs_from_request() {
			if (isset($_REQUEST['user_id']))
				$this->set_user_id($_REQUEST['user_id']);
			if (isset($_REQUEST['message']))
				$this->set_message($_REQUEST['message']);
		}

		function clear_parametrs() {
			$this->set_id('');
			$this->set_user_id('');
			$this->set_message('');
		}


		function load_chat($id) {
			$cache = ch()->get('chat'.$id);
			if (!$cache) {
				$chat = db()->query_once('select * from chat where `id` = "'.safeescapestring(db()->nomysqlinj($id)).'"');
				$this->set_parametrs($chat['id'], $chat['user_id'], $chat['message']);
				if ($this->get_id() != '')
					ch()->set('chat'.$id, $this);
			} else {
				$this->set_parametrs($cache->get_id(), $cache->get_user_id(), $cache->get_message());
			}
		}

		function add_chat_message() {
			db()->query_once('insert into chat( `user_id`, `message`) values ( "'.safeescapestring(db()->nomysqlinj($this->get_user_id())).'", "'.(db()->nomysqlinj($this->get_message())).'" )');
		}

		function update_chat_message() {
			db()->query_once('update chat set `user_id` = "'.safeescapestring(db()->nomysqlinj($this->get_user_id())).'", `message` = "'.safeescapestring(db()->nomysqlinj($this->get_message())).'"');
			if ($this->get_id() != '')
				ch()->set('chat'.$this->id, $this);
		}

		function delete_chat_message() {
			db()->query_once('delete from chat where id = "'.safeescapestring(db()->nomysqlinj($this->get_id())).'"');
			ch()->delete('chat'.$this->id);
		}
	}
?>