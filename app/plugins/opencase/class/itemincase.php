<?php
	class itemincase {
		var $id = '';
		var $case_id = '';
		var $item_id = '';
		var $chance = '';
		var $count_items = '';
		var $position = '';
		var $enabled = '';
		var $case_class = false;
		var $item_class = false;
		var $price = 0;
		var $withdrawable = 1;
		var $usable = 1;
		var $pricerangelow = 0;
		var $pricerangehigh = 0;

		function __construct($id = '') {
			if ($id != '') {
				$this->load_itemincase(safeescapestring(db()->nomysqlinj($id)));
			}
		}

		function get_id() {
			return $this->id;
		}

		function set_id($id) {
			$this->id = $id;
		}

		function get_case_id() {
			return $this->case_id;
		}
		
		function get_case_class() {
			if ($this->case_class) {
				$case = $this->case_class;
			} else {
				$case = new ocase($this->get_case_id());
				$this->case_class = $case;
			}
			return $case;
		}

		function set_case_id($case_id) {
			$this->case_id = $case_id;
			$case_class = false;
		}

		function get_item_id() {
			return $this->item_id;
		}
		
		function get_item_class() {
			if ($this->item_class)
				$item = $this->item_class;
			else {
				$item = new item($this->get_item_id());
				$this->item_class = $item;
			}
			return $item;
		}

		function set_item_id($item_id) {
			$this->item_id = $item_id;
			$this->item_class = false;
		}

		function get_chance() {
			return $this->chance;
		}

		function set_chance($chance) {
			$this->chance = $chance;
		}

		function get_count_items() {
			return $this->count_items;
		}
		
		function get_text_count_items() {
			return $this->get_count_items() == -1? 'Unlimited' : $this->get_count_items();
		}

		function set_count_items($count_items) {
			$this->count_items = $count_items;
		}
		
		function get_position() {
			return $this->position;
		}

        function get_pricerangelow() {
            return $this->pricerangelow;
        }

        function get_pricerangehigh() {
            return $this->pricerangehigh;
        }

		function get_position_max($caseID = false) {
			$pos = db()->query_once('select max(position) from `opencase_itemincase` where case_id = "'.($caseID ? $caseID : safeescapestring(db()->nomysqlinj($this->get_case_id()))).'"');
			return (int) $pos['max(position)'];
		}
		
		function set_position($position) {
			$this->position = $position;
		}

		function get_enabled() {
			return $this->enabled;
		}
		
		function get_text_enabled() {
			return $this->get_enabled()? 'Enabled' : 'Disabled';
		}
		
		function get_label_enabled() {
			return $this->get_enabled()? '<span class = "label label-success">Enabled</span>' : '<span class = "label label-danger">Disabled</span>';
		}

		function set_enabled($enabled) {
			$this->enabled = $enabled;
		}

        function set_pricerangelow($pricerangelow) {
            $this->pricerangelow = $pricerangelow;
        }

        function set_pricerangehigh($pricerangehigh) {
            $this->pricerangehigh = $pricerangehigh;
        }

		function get_withdrawable() {
			return $this->withdrawable;
		}
		
		function set_withdrawable($withdrawable) {
			$this->withdrawable = $withdrawable;
		}
		
		function get_usable() {
			return $this->usable;
		}
		
		function set_usable($usable) {
			$this->usable = $usable;
		}
		
		function get_price($currency = 'ru') {
			return $this->get_item_class()->get_price($currency);
		}

		function set_parametrs( $id, $case_id, $item_id, $chance, $count_items, $position, $enabled, $withdrawable, $usable, $pricerangelow, $pricerangehigh) {
 			$this->set_id($id);
			$this->set_case_id($case_id);
			$this->set_item_id($item_id);
			$this->set_chance($chance);
			$this->set_count_items($count_items);
			$this->set_position($position);
			$this->set_enabled($enabled);
			$this->set_withdrawable($withdrawable);
			$this->set_usable($usable);
            $this->set_pricerangelow($pricerangelow);
            $this->set_pricerangehigh($pricerangehigh);
		}

		function set_parametrs_from_request() {
			if (isset($_REQUEST['case_id']) && $_REQUEST['case_id'] != '')
				$this->set_case_id($_REQUEST['case_id']);
			if (isset($_REQUEST['item_id']) && $_REQUEST['item_id'] != '')
				$this->set_item_id($_REQUEST['item_id']);
			if (isset($_REQUEST['chance']) && $_REQUEST['chance'] != '')
				$this->set_chance($_REQUEST['chance']);
			if (isset($_REQUEST['count_items']) && $_REQUEST['count_items'] != '')
				$this->set_count_items($_REQUEST['count_items']);
			if (isset($_REQUEST['position']) && $_REQUEST['position'] != '')
				$this->set_position($_REQUEST['position']);
			if (isset($_REQUEST['enabled']) && $_REQUEST['enabled'] != '')
				$this->set_enabled($_REQUEST['enabled']);
			if (isset($_REQUEST['withdrawable']) && $_REQUEST['withdrawable'] != '')
				$this->set_withdrawable($_REQUEST['withdrawable']);
			if (isset($_REQUEST['usable']) && $_REQUEST['usable'] != '')
				$this->set_usable($_REQUEST['usable']);
            if (isset($_REQUEST['pricerangelow']) && $_REQUEST['pricerangelow'] != '')
                $this->set_pricerangelow($_REQUEST['pricerangelow']);
            if (isset($_REQUEST['pricerangehigh']) && $_REQUEST['pricerangehigh'] != '')
                $this->set_pricerangehigh($_REQUEST['pricerangehigh']);
		}

		function clear_parametrs() {
			$this->set_id('');
			$this->set_case_id('');
			$this->set_item_id('');
			$this->set_chance('');
			$this->set_count_items('');
			$this->set_position('');
			$this->set_enabled('');
			$this->set_withdrawable(1);
			$this->set_usable(1);
            $this->set_pricerangelow(0);
            $this->set_pricerangehigh(0);
		}

		function load_itemincase($id) {
			$cache = ch()->get('itemincase'.$id);
			if (!$cache) {
                $redis = new Redis();
                $redis->connect('127.0.0.1', 6379);

                $cachekey = "itemincasech".$id;

                $itemincase = '';

                if (!$redis->get($cachekey)) {
                    $itemincase = db()->query_once('select * from opencase_itemincase where id = "'.safeescapestring(db()->nomysqlinj($id)).'"');
                    $redis->set($cachekey, serialize($itemincase));
                    $redis->expire($cachekey, 7);
                } else {
                    $itemincase = unserialize($redis->get($cachekey));
                }
				$this->set_parametrs( $itemincase['id'], $itemincase['case_id'], $itemincase['item_id'], $itemincase['chance'], $itemincase['count_items'], $itemincase['position'], $itemincase['enabled'], $itemincase['withdrawable'], $itemincase['usable'], $itemincase['pricerangelow'], $itemincase['pricerangehigh']);
				if ($this->get_id() != '')
					ch()->set('itemincase'.$id, $this);
			} else {
				$this->set_parametrs( $cache->get_id(), $cache->get_case_id(), $cache->get_item_id(), $cache->get_chance(), $cache->get_count_items(), $cache->get_position(), $cache->get_enabled(), $cache->get_withdrawable(), $cache->get_usable(), $cache->get_pricerangelow(), $cache->get_pricerangehigh());
			}
		}

		function add_itemincase() {
			db()->query_once('insert into opencase_itemincase( `case_id`, `item_id`, `chance`, `count_items`, `position`, `enabled`, `withdrawable`, `usable`, `pricerangelow`, `pricerangehigh`) values ( "'.safeescapestring(db()->nomysqlinj($this->get_case_id())).'", "'.safeescapestring(db()->nomysqlinj($this->get_item_id())).'", "'.safeescapestring(db()->nomysqlinj($this->get_chance())).'", "'.safeescapestring(db()->nomysqlinj($this->get_count_items())).'", "'.safeescapestring(db()->nomysqlinj($this->get_position())).'", "'.safeescapestring(db()->nomysqlinj($this->get_enabled())).'", "'.safeescapestring(db()->nomysqlinj($this->get_withdrawable())).'", "'.safeescapestring(db()->nomysqlinj($this->get_usable())).'", "'.safeescapestring(db()->nomysqlinj($this->get_pricerangelow())).'", "'.safeescapestring(db()->nomysqlinj($this->get_pricerangehigh())).'")');
		}

		function update_itemincase() {
			db()->query_once('update opencase_itemincase set `case_id` = "'.safeescapestring(db()->nomysqlinj($this->get_case_id())).'", `item_id` = "'.safeescapestring(db()->nomysqlinj($this->get_item_id())).'", `chance` = "'.safeescapestring(db()->nomysqlinj($this->get_chance())).'", `count_items` = "'.safeescapestring(db()->nomysqlinj($this->get_count_items())).'", `position` = "'.safeescapestring(db()->nomysqlinj($this->get_position())).'", `enabled` = "'.safeescapestring(db()->nomysqlinj($this->get_enabled())).'", `withdrawable` = "'.safeescapestring(db()->nomysqlinj($this->get_withdrawable())).'", `usable` = "'.safeescapestring(db()->nomysqlinj($this->get_usable())).'", `pricerangelow` = "'.safeescapestring(db()->nomysqlinj($this->get_pricerangelow())).'", `pricerangehigh` = "'.safeescapestring(db()->nomysqlinj($this->get_pricerangehigh())).'" where id = "'.safeescapestring(db()->nomysqlinj($this->get_id())).'"');
			if ($this->get_id() != '')
				ch()->set('itemincase'.$this->id, $this);
		}

		function delete_itemincase() {
			db()->query_once('delete from opencase_itemincase where id = "'.safeescapestring(db()->nomysqlinj($this->get_id())).'"');
			ch()->delete('itemincase'.$this->id);
		}

		function get_itemincases($where ='', $order = '', $limit = '') {
			$sql = 'select id from opencase_itemincase';
			if ($where != '')
				$sql .= ' where '.$where;
			if ($order != '')
				$sql .= ' order by '.$order;
			if ($limit != '')
				$sql .= ' limit '.$limit;
			$itemincasesArray = db()->query($sql);
			$itemincases = array();
			if (is_array($itemincasesArray)) {
				foreach ($itemincasesArray as $itemincaseElement) {
					$itemincase = new itemincase($itemincaseElement['id']);
					array_push($itemincases, $itemincase);
				}
			}
			return $itemincases;
		}
	}
?>