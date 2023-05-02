<?php
	class rainlog {
		var $id = '';
		var $rainid = 0;
		var $userid = 0;
        var $amount = 0;

		function __construct($id = '') {
			if ($id != '') {
				$this->load_rainlog(safeescapestring(db()->nomysqlinj($id)));
			}
		}

		function get_id() {
			return $this->id;
		}

		function set_id($id) {
			$this->id = $id;
		}

		function get_rainid() {
			return $this->rainid;
		}

        function set_rainid($rainid) {
            $this->rainid = $rainid;
        }

        function get_userid() {
            return $this->userid;
        }

        function set_userid($userid) {
			$this->userid = $userid;
		}

        function get_amount() {
            return $this->amount;
        }

        function set_amount($amount) {
            $this->amount = $amount;
        }


		function set_parametrs($id, $rainid, $userid, $amount) {
 			$this->set_id($id);
			$this->set_rainid($rainid);
			$this->set_userid($userid);
            $this->set_amount($amount);
		}

		function set_parametrs_from_request() {
			if (isset($_REQUEST['rainid']))
				$this->set_rainid($_REQUEST['rainid']);
			if (isset($_REQUEST['userid']))
				$this->set_userid($_REQUEST['userid']);
            if (isset($_REQUEST['amount']))
                $this->set_amount($_REQUEST['amount']);
		}

		function clear_parametrs() {
			$this->set_id('');
			$this->set_rainid('');
			$this->set_userid('');
            $this->set_amount('');
		}


		function load_rainlog($id) {
			$cache = ch()->get('rainlog'.$id);
			if (!$cache) {
				$rainlog = db()->query_once('select * from rainlog where `id` = "'.safeescapestring(db()->nomysqlinj($id)).'"');
				$this->set_parametrs($rainlog['id'], $rainlog['rainid'], $rainlog['userid'], $rainlog['amount']);
				if ($this->get_id() != '')
					ch()->set('rainlog'.$id, $this);
			} else {
				$this->set_parametrs($cache->get_id(), $cache->get_rainid(), $cache->get_userid(), $cache->get_amount());
			}
		}

		function add_rainlog() {
			db()->query_once('insert into rainlog( `rainid`, `userid`, `amount`) values ( "'.safeescapestring(db()->nomysqlinj($this->get_rainid())).'", "'.(db()->nomysqlinj($this->get_userid())).'", "'.(db()->nomysqlinj($this->get_amount())).'" )');
		}

		function update_rainlog() {
			db()->query_once('update rainlog set `rainid` = "'.safeescapestring(db()->nomysqlinj($this->get_rainid())).'", `userid` = "'.safeescapestring(db()->nomysqlinj($this->get_userid())).'", `amount` = "'.safeescapestring(db()->nomysqlinj($this->get_amount())).'"');
			if ($this->get_id() != '')
				ch()->set('rainlog'.$this->id, $this);
		}

		function delete_rainlog() {
			db()->query_once('delete from rainlog where id = "'.safeescapestring(db()->nomysqlinj($this->get_id())).'"');
			ch()->delete('rainlog'.$this->id);
		}
	}
?>