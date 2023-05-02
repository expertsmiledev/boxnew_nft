<?php
	class nftwithdrawals {
		var $id = 0;
		var $nftid = 0;
        var $address = '';
        var $network = '';
        var $status = 0;
		var $userid = 0;
        var $droppedid = 0;
        var $timesent = '';
        var $txid = '';

		function __construct($id = '') {
			if ($id != '') {
				$this->load_nftwithdrawal(safeescapestring(db()->nomysqlinj($id)));
			}
		}

		function get_id() {
			return $this->id;
		}

		function set_id($id) {
			$this->id = $id;
		}

		function get_nftid() {
			return $this->nftid;
		}

        function set_nftid($nftid) {
            $this->nftid = $nftid;
        }

        function get_network() {
            return $this->network;
        }

        function set_network($network) {
            $this->network = $network;
        }

        function get_status() {
            return $this->status;
        }

        function set_status($status) {
            $this->status = $status;
        }

        function get_userid() {
            return $this->userid;
        }

        function set_userid($userid) {
            $this->userid = $userid;
        }

        function get_droppedid() {
            return $this->droppedid;
        }

        function set_droppedid($droppedid) {
            $this->droppedid = $droppedid;
        }

        function get_timesent() {
            return $this->timesent;
        }

        function set_timesent($timesent) {
            $this->timesent = $timesent;
        }

        function get_txid() {
            return $this->txid;
        }

        function set_txid($txid) {
            $this->txid = $txid;
        }

        function get_address() {
            return $this->txid;
        }

        function set_address($address) {
            $this->address = $address;
        }

        function get_price() {
            return $this->price;
        }

        function set_price($price) {
            $this->price = $price;
        }

		function set_parametrs($id, $nftid, $network, $address, $status, $userid, $droppedid, $timesent, $txid, $price) {
 			$this->set_id($id);
            $this->set_nftid($nftid);
            $this->set_network($network);
            $this->set_address($address);
            $this->set_status($status);
            $this->set_userid($userid);
            $this->set_droppedid($droppedid);
            $this->set_timesent($timesent);
            $this->set_txid($txid);
            $this->set_price($price);
		}

		function set_parametrs_from_request() {
			if (isset($_REQUEST['nftid']))
				$this->set_nftid($_REQUEST['nftid']);
            if (isset($_REQUEST['network']))
                $this->set_network($_REQUEST['network']);
            if (isset($_REQUEST['address']))
                $this->set_network($_REQUEST['address']);
            if (isset($_REQUEST['status']))
                $this->set_status($_REQUEST['status']);
            if (isset($_REQUEST['userid']))
                $this->set_userid($_REQUEST['userid']);
            if (isset($_REQUEST['droppedid']))
                $this->set_droppedid($_REQUEST['droppedid']);
            if (isset($_REQUEST['timesent']))
                $this->set_timesent($_REQUEST['timesent']);
            if (isset($_REQUEST['txid']))
                $this->set_txid($_REQUEST['txid']);
            if (isset($_REQUEST['price']))
                $this->set_price($_REQUEST['price']);

		}

		function clear_parametrs() {
			$this->set_id('');
			$this->set_nftid('');
			$this->set_network('');
            $this->set_address('');
            $this->set_status('');
            $this->set_userid('');
            $this->set_droppedid('');
            $this->set_timesent('');
            $this->set_txid('');
            $this->set_price('');
		}


		function load_nftwithdrawal($id) {
			$cache = ch()->get('nftwithdrwl'.$id);
			if (!$cache) {
				$nftwrl = db()->query_once('select * from nft_withdrawals where `id` = "'.safeescapestring(db()->nomysqlinj($id)).'"');
				$this->set_parametrs($nftwrl['id'], $nftwrl['nftid'], $nftwrl['network'], $nftwrl['address'], $nftwrl['status'], $nftwrl['userid'], $nftwrl['droppedid'], $nftwrl['timesent'], $nftwrl['txid'], $nftwrl['price']);
				if ($this->get_id() != '')
					ch()->set('nftwithdrwl'.$id, $this);
			} else {
				$this->set_parametrs($cache->get_id(), $cache->get_nftid(), $cache->get_network(), $cache->get_address(), $cache->get_status(), $cache->get_userid(), $cache->get_droppedid(), $cache->get_timesent(), $cache->get_txid(), $cache->get_price());
			}
		}

        function get_nftwithdrawals($where ='', $order = '', $limit = '') {
            $sql = 'select id from nft_withdrawals';
            if ($where != '')
                $sql .= ' where '.$where;
            if ($order != '')
                $sql .= ' order by '.$order;
            if ($limit != '')
                $sql .= ' limit '.$limit;
            $nftWithdArray = db()->query($sql);
            $nftwithdrawd = array();
            if (is_array($nftWithdArray)) {
                foreach ($nftWithdArray as $nftwithdelement) {
                    $nftwithditem = new nftwithdrawals($nftwithdelement['id']);
                    array_push($nftwithdrawd, $nftwithditem);
                }
            }
            return $nftwithdrawd;
        }

		function add_nft_withdrawal() {
			db()->query_once('insert into nft_withdrawals( `nftid`, `network`, `address`, `status`, `userid`, `droppedid`, `txid`, `price`) values ( "'.safeescapestring(db()->nomysqlinj($this->get_nftid())).'", "'.(db()->nomysqlinj($this->get_network())).'", "'.(db()->nomysqlinj($this->get_address())).'", "'.(db()->nomysqlinj($this->get_status())).'", "'.(db()->nomysqlinj($this->get_userid())).'", "'.(db()->nomysqlinj($this->get_droppedid())).'", "'.(db()->nomysqlinj($this->get_txid())).'", "'.(db()->nomysqlinj($this->get_price())).'" )');
		}

		function update_nft_withdrawal() {
			db()->query_once('update nft_withdrawals set `nftid` = "'.safeescapestring(db()->nomysqlinj($this->get_nftid())).'", `network` = "'.safeescapestring(db()->nomysqlinj($this->get_network())).'", `address` = "'.safeescapestring(db()->nomysqlinj($this->get_address())).'", `status` = "'.safeescapestring(db()->nomysqlinj($this->get_status())).'", `userid` = "'.safeescapestring(db()->nomysqlinj($this->get_userid())).'", `droppedid` = "'.safeescapestring(db()->nomysqlinj($this->get_droppedid())).'", `txid` = "'.safeescapestring(db()->nomysqlinj($this->get_txid())).'", `price` = "'.safeescapestring(db()->nomysqlinj($this->get_price())).'"');
			if ($this->get_id() != '')
				ch()->set('nftwithdrwl'.$this->id, $this);
		}

		function delete_nft_withdrawal() {
			db()->query_once('delete from nft_withdrawals where id = "'.safeescapestring(db()->nomysqlinj($this->get_id())).'"');
			ch()->delete('nftwithdrwl'.$this->id);
		}
	}
?>