<?php
	class rain {
		var $id = '';
		var $amount = 0;
		var $status = 0;
        var $date = '';

		function __construct($id = '') {
			if ($id != '') {
				$this->load_rain(safeescapestring(db()->nomysqlinj($id)));
			}
		}

		function get_id() {
			return $this->id;
		}

		function set_id($id) {
			$this->id = $id;
		}

		function get_amount() {
			return $this->amount;
		}

        function set_amount($amount) {
            $this->amount = $amount;
        }

        function get_status() {
            return $this->status;
        }

        function set_status($status) {
			$this->status = $status;
		}
		
		function get_date() {
			return $this->date;
		}

        function set_date($date) {
            $this->date = $date;
        }


		function set_parametrs($id, $amount, $status, $date) {
 			$this->set_id($id);
			$this->set_amount($amount);
			$this->set_status($status);
            $this->set_date($date);
		}

		function set_parametrs_from_request() {
			if (isset($_REQUEST['amount']))
				$this->set_amount($_REQUEST['amount']);
			if (isset($_REQUEST['status']))
				$this->set_status($_REQUEST['status']);
            if (isset($_REQUEST['date']))
                $this->set_date($_REQUEST['date']);
		}

		function clear_parametrs() {
			$this->set_id('');
			$this->set_amount('');
			$this->set_status('');
            $this->set_date('');
		}


		function load_rain($id) {
			$cache = ch()->get('rain'.$id);
			if (!$cache) {
				$rain = db()->query_once('select * from rain where `id` = "'.safeescapestring(db()->nomysqlinj($id)).'"');
				$this->set_parametrs($rain['id'], $rain['amount'], $rain['status'], $rain['date']);
				if ($this->get_id() != '')
					ch()->set('rain'.$id, $this);
			} else {
				$this->set_parametrs($cache->get_id(), $cache->get_amount(), $cache->get_status(), $cache->get_date());
			}
		}

		function add_rain() {
			db()->query_once('insert into rain( `amount`, `status`) values ( "'.safeescapestring(db()->nomysqlinj($this->get_amount())).'", "'.(db()->nomysqlinj($this->get_status())).'" )');
		}

		function update_rain() {
			db()->query_once('update rain set `amount` = "'.safeescapestring(db()->nomysqlinj($this->get_amount())).'", `status` = "'.safeescapestring(db()->nomysqlinj($this->get_status())).'", `date` = "'.safeescapestring(db()->nomysqlinj($this->get_date())).'"');
			if ($this->get_id() != '')
				ch()->set('rain'.$this->id, $this);
		}

		function delete_rain() {
			db()->query_once('delete from rain where id = "'.safeescapestring(db()->nomysqlinj($this->get_id())).'"');
			ch()->delete('rain'.$this->id);
		}
	}
?>