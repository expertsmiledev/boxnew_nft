<?php
	class promocode {
		
		const TYPE_SUM = 0;
		const TYPE_CASE = 1;
		const TYPE_PERCENT = 2;
		
		var $id = '';
		var $code = '';
		var $value = 0;
		var $count = 0;
		var $use = 0;
		var $enable = 0;
		var $type = 0;
		var $case_id = null;
		var $types_name = [self::TYPE_SUM => 'Balance', self::TYPE_CASE => 'Case', self::TYPE_PERCENT => 'Percent'];

		function __construct($id = '') {
			if ($id != '') {
				$this->load_promocode(safeescapestring(db()->nomysqlinj($id)));
			}
		}

		function get_id() {
			return $this->id;
		}

		function set_id($id) {
			$this->id = $id;
		}

		function get_code() {
			return $this->code;
		}

		function set_code($code) {
			$this->code = $code;
		}
		
		function get_value() {
			return $this->value;
		}

		function set_value($value) {
			$this->value = $value;
		}

		function get_count() {
			return $this->count;
		}

		function set_count($count) {
			$this->count = $count;
		}
		
		function get_type() {
			return $this->type;
		}

		function set_type($type) {
			$this->type = $type;
		}
		
		function get_case_id() {
			return $this->case_id;
		}

		function set_case_id($case_id) {
			$this->case_id = $case_id;
		}

		function get_use() {
			return $this->use;
		}
		
		function inc_use() {
			$this->set_use($this->get_use() + 1);
		}

		function set_use($use) {
			$this->use = $use;
		}
		
		function get_left() {
			return $this->get_count() - $this->get_use();
		}

		function get_enable() {
			return $this->enable;
		}
		
		function get_text_enable() {
			return $this->get_enable()? 'Enabled' : 'Disabled';
		}
		
		function get_label_enable() {
			return $this->get_enable()? '<span class = "label label-success">Enabled</span>' : '<span class = "label label-danger">Disabled</span>';
		}

		function set_enable($enable) {
			$this->enable = $enable;
		}
		
		function user_can_use($user_id) {
			$count = db()->query_once('select count(id) from promo_use where `promo_id` = "'.safeescapestring(db()->nomysqlinj($this->get_id())).'" and `user_id` = "'.safeescapestring(db()->nomysqlinj($user_id)).'"');
			if ($count['count(id)'] > 0) {
				return false;
			} else {
				return true;
			}
		}
		
		function use_promocode($user_id) {
			$this->inc_use();
			$this->update_promocode();
			db()->query_once('insert into promo_use (promo_id, user_id) values ('.safeescapestring(db()->nomysqlinj($this->get_id())).', '.safeescapestring(db()->nomysqlinj($user_id)).')');
		}

		function set_parametrs( $id, $code, $value, $count, $use, $enable, $type, $case_id) { 
 			$this->set_id($id);
			$this->set_code($code);
			$this->set_value($value);
			$this->set_count($count);
			$this->set_use($use);
			$this->set_enable($enable);
			$this->set_type($type);
			$this->set_case_id($case_id);
		}

		function set_parametrs_from_request() {
			if (isset($_REQUEST['code']))
				$this->set_code($_REQUEST['code']);
			if (isset($_REQUEST['value']))
				$this->set_value($_REQUEST['value']);
			if (isset($_REQUEST['count']))
				$this->set_count($_REQUEST['count']);
			if (isset($_REQUEST['use']))
				$this->set_use($_REQUEST['use']);
			if (isset($_REQUEST['enable']))
				$this->set_enable($_REQUEST['enable']);
			if (isset($_REQUEST['type']))
				$this->set_type($_REQUEST['type']);
			if (isset($_REQUEST['case_id']))
				$this->set_case_id($_REQUEST['case_id']);
		}

		function clear_parametrs() {
			$this->set_id('');
			$this->set_code('');
			$this->set_value('');
			$this->set_count('');
			$this->set_use('');
			$this->set_enable('');
			$this->set_type(0);
			$this->set_case_id(null);
		}
		
		function get_from_code($code) {
			$promocode = db()->query_once('select * from promo_code where `code` = "'.safeescapestring(db()->nomysqlinj($code)).'"');
			$this->set_parametrs( $promocode['id'], $promocode['code'], $promocode['value'], $promocode['count'], $promocode['use'], $promocode['enable'], $promocode['type'], $promocode['case_id']);
		}

		function load_promocode($id) {
			$cache = ch()->get('promocode'.$id);
			if (!$cache) {
                $redis = new Redis();
                $redis->connect('127.0.0.1', 6379);

                $cachekey = "promocodech".$id;

                $promocode = '';

                if (!$redis->get($cachekey)) {
                    $promocode = db()->query_once('select * from promo_code where `id` = "'.safeescapestring(db()->nomysqlinj($id)).'"');
                    $redis->set($cachekey, serialize($promocode));
                    $redis->expire($cachekey, 10);
                } else {
                    $promocode = unserialize($redis->get($cachekey));
                }

				$this->set_parametrs( $promocode['id'], $promocode['code'], $promocode['value'], $promocode['count'], $promocode['use'], $promocode['enable'], $promocode['type'], $promocode['case_id']);
				if ($this->get_id() != '')
					ch()->set('promocode'.$id, $this);
			} else {
				$this->set_parametrs( $cache->get_id(), $cache->get_code(), $cache->get_value(), $cache->get_count(), $cache->get_use(), $cache->get_enable(), $cache->get_type(), $cache->get_case_id());
			}
		}

		function add_promocode() {
			if ($this->get_type() != self::TYPE_CASE) {
				$this->set_case_id(null);
			}
			db()->query_once('insert into promo_code( `code`, `value`, `count`, `use`, `enable`, `type`, `case_id`) values ( "'.safeescapestring(db()->nomysqlinj($this->get_code())).'", "'.safeescapestring(db()->nomysqlinj($this->get_value())).'", "'.safeescapestring(db()->nomysqlinj($this->get_count())).'", "'.safeescapestring(db()->nomysqlinj($this->get_use())).'", "'.safeescapestring(db()->nomysqlinj($this->get_enable())).'", "' . safeescapestring(db()->nomysqlinj($this->get_type())) . '",  ' . (empty($this->get_case_id()) ? 'NULL' : safeescapestring(db()->nomysqlinj($this->get_case_id()))) .')');
		}

		function update_promocode() {
			if ($this->get_type() != self::TYPE_CASE) {
				$this->set_case_id(null);
			}
			db()->query_once('update promo_code set `code` = "'.safeescapestring(db()->nomysqlinj($this->get_code())).'", `value` = "'.safeescapestring(db()->nomysqlinj($this->get_value())).'", `count` = "'.safeescapestring(db()->nomysqlinj($this->get_count())).'", `use` = "'.safeescapestring(db()->nomysqlinj($this->get_use())).'", `enable` = "'.safeescapestring(db()->nomysqlinj($this->get_enable())).'", `type` = "'. safeescapestring(db()->nomysqlinj($this->get_type())) .'", `case_id` = ' . (empty($this->get_case_id()) ? 'NULL' : safeescapestring(db()->nomysqlinj($this->get_case_id()))) . ' where id = "'.safeescapestring(db()->nomysqlinj($this->get_id())).'"');
			if ($this->get_id() != '')
				ch()->set('promocode'.$this->id, $this);
		}

		function delete_promocode() {
			db()->query_once('delete from promo_code where id = "'.safeescapestring(db()->nomysqlinj($this->get_id())).'"');
			ch()->delete('promocode'.$this->id);
		}

		function get_promocodes($where ='', $order = '', $limit = '') {
			$sql = 'select id from promo_code';
			if ($where != '')
				$sql .= ' where '.$where;
			if ($order != '')
				$sql .= ' order by '.$order;
			if ($limit != '')
				$sql .= ' limit '.$limit;
			$promocodesArray = db()->query($sql);
			$promocodes = array();
			if (is_array($promocodesArray)) {
				foreach ($promocodesArray as $promocodeElement) {
					$promocode = new promocode($promocodeElement['id']);
					array_push($promocodes, $promocode);
				}
			}
			return $promocodes;
		}
		
		function get_bonus_string() {
			switch ($this->get_type()) {
				case self::TYPE_SUM:
					return $this->get_value() . '$ when activated';
				case self::TYPE_CASE:
					if (empty($this->get_case_id())) {
						return 'Free case opening <a href ="' .ADMINURL . '/promo/editform/' . $this->get_id()  . '/">Select case ' . $this->get_case_id() . '</a>';
					} else {
						return 'Free opening <a href ="' .ADMINURL . '/opencase/caseitems/' . $this->get_case_id()  . '/">Case ' . $this->get_case_id() . '</a>';
					}
				case self::TYPE_PERCENT:
					return $this->get_value() . '% after deposit';
			}
			return '';
		}
	}
?>