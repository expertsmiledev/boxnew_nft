<?php
	class cryptowithdrawals {
		var $id = '';
		var $userid = 0;
        var $amount = 0;
        var $fee = 0;
        var $address = '';
		var $method = '';
        var $status = 0;
        var $txid = '';
        var $datereq = '';
        var $droppednft = 0;

		function __construct($id = '') {
			if ($id != '') {
				$this->load_cryptowithdrawal(safeescapestring(db()->nomysqlinj($id)));
			}
		}

		function get_id() {
			return $this->id;
		}

		function set_id($id) {
			$this->id = $id;
		}

        function get_droppednft() {
            return $this->droppednft;
        }

        function set_droppednft($droppednft) {
            $this->droppednft = $droppednft;
        }

		function get_userid() {
			return $this->userid;
		}

        function set_userid($userid) {
            $this->userid = $userid;
        }

		function set_amount($amount) {
			$this->amount = $amount;
		}
		
		function get_amount() {
			return $this->amount;
		}

        function get_fee() {
            return $this->fee;
        }

        function set_fee($fee) {
            $this->fee = $fee;
        }

        function set_address($address) {
            $this->address = $address;
        }

        function get_address() {
            return $this->address;
        }

        function set_method($method) {
            $this->method = $method;
        }

        function get_method() {
            return $this->method;
        }

        function set_status($status) {
            $this->status = $status;
        }

        function get_status() {
            return $this->status;
        }

        function set_txid($txid) {
            $this->txid = $txid;
        }

        function get_txid() {
            return $this->txid;
        }

        function set_datereq($datereq) {
            $this->datereq = $datereq;
        }

        function get_datereq() {
            return $this->datereq;
        }


		function set_parametrs($id, $userid, $amount, $fee, $address, $method, $status, $txid, $datereq, $droppednft) {
 			$this->set_id($id);
			$this->set_userid($userid);
			$this->set_amount($amount);
            $this->set_fee($fee);
            $this->set_address($address);
            $this->set_method($method);
            $this->set_status($status);
            $this->set_txid($txid);
            $this->set_datereq($datereq);
            $this->set_droppednft($droppednft);
		}

		function set_parametrs_from_request() {
			if (isset($_REQUEST['userid']))
				$this->set_userid($_REQUEST['userid']);
			if (isset($_REQUEST['amount']))
				$this->set_amount($_REQUEST['amount']);
            if (isset($_REQUEST['fee']))
                $this->set_fee($_REQUEST['fee']);
            if (isset($_REQUEST['address']))
                $this->set_address($_REQUEST['address']);
            if (isset($_REQUEST['method']))
                $this->set_method($_REQUEST['method']);
            if (isset($_REQUEST['status']))
                $this->set_status($_REQUEST['status']);
            if (isset($_REQUEST['txid']))
                $this->set_txid($_REQUEST['txid']);
            if (isset($_REQUEST['datereq']))
                $this->set_datereq($_REQUEST['datereq']);
            if (isset($_REQUEST['droppednft']))
                $this->set_droppednft($_REQUEST['droppednft']);
		}

		function clear_parametrs() {
			$this->set_id('');
			$this->set_userid('');
			$this->set_amount('');
            $this->set_fee('');
            $this->set_address('');
            $this->set_method('');
            $this->set_status('');
            $this->set_txid('');
            $this->set_datereq('');
            $this->set_droppednft('');
		}


		function load_cryptowithdrawal($id) {
			$cache = ch()->get('cryptowithdrl'.$id);
			if (!$cache) {
				$crwl = db()->query_once('select * from crypto_withdrawals where `id` = "'.safeescapestring(db()->nomysqlinj($id)).'"');
				$this->set_parametrs($crwl['id'], $crwl['userid'], $crwl['amount'], $crwl['fee'], $crwl['address'], $crwl['method'], $crwl['status'], $crwl['txid'], $crwl['datereq'], $crwl['droppednft']);
				if ($this->get_id() != '')
					ch()->set('cryptowithdrl'.$id, $this);
			} else {
				$this->set_parametrs($cache->get_id(), $cache->get_userid(), $cache->get_amount(), $cache->get_fee(), $cache->get_address(), $cache->get_method(), $cache->get_status(), $cache->get_txid(), $cache->get_datereq(), $cache->get_droppednft());
			}
		}

		function add_crypto_withdrawal() {
			db()->query_once('insert into crypto_withdrawals( `userid`, `amount`, `fee`, `address`, `method`, `status`, `txid`, `droppednft`) values ( "'.safeescapestring(db()->nomysqlinj($this->get_userid())).'", "'.(db()->nomysqlinj($this->get_amount())).'", "'.(db()->nomysqlinj($this->get_fee())).'", "'.(db()->nomysqlinj($this->get_address())).'", "'.(db()->nomysqlinj($this->get_method())).'", "'.(db()->nomysqlinj($this->get_status())).'", "'.(db()->nomysqlinj($this->get_txid())).'", "'.(db()->nomysqlinj($this->get_droppednft())).'" )');
		}

		function update_crypto_withdrawal() {
			db()->query_once('update crypto_withdrawals set `userid` = "'.safeescapestring(db()->nomysqlinj($this->get_userid())).'", `amount` = "'.safeescapestring(db()->nomysqlinj($this->get_amount())).'", `fee` = "'.safeescapestring(db()->nomysqlinj($this->get_fee())).'", `address` = "'.safeescapestring(db()->nomysqlinj($this->get_address())).'", `method` = "'.safeescapestring(db()->nomysqlinj($this->get_method())).'", `status` = "'.safeescapestring(db()->nomysqlinj($this->get_status())).'", `txid` = "'.safeescapestring(db()->nomysqlinj($this->get_txid())).'", `droppednft` = "'.safeescapestring(db()->nomysqlinj($this->get_droppednft())).'"');
			if ($this->get_id() != '')
				ch()->set('cryptowithdrl'.$this->id, $this);
		}

        function get_cryptowithdrawals($where ='', $order = '', $limit = '') {
            $sql = 'select id from crypto_withdrawals';
            if ($where != '')
                $sql .= ' where '.$where;
            if ($order != '')
                $sql .= ' order by '.$order;
            if ($limit != '')
                $sql .= ' limit '.$limit;
            $cryptowithdarray = db()->query($sql);
            $cryptwithdrawd = array();
            if (is_array($cryptowithdarray)) {
                foreach ($cryptowithdarray as $cryptowithelement) {
                    $cryptowithditem = new cryptowithdrawals($cryptowithelement['id']);
                    array_push($cryptwithdrawd, $cryptowithditem);
                }
            }
            return $cryptwithdrawd;
        }

        function delete_crypto_withdrawal() {
			db()->query_once('delete from crypto_withdrawals where id = "'.safeescapestring(db()->nomysqlinj($this->get_id())).'"');
			ch()->delete('cryptowithdrl'.$this->id);
		}
	}
?>