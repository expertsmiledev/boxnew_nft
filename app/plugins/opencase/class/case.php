<?php
	class ocase {
		
		const TYPE_DEFAULT = 0;
		const TYPE_PROMOCODE = 1;
		const TYPE_DEPOSITE = 2;
		
		var $id = '';
		var $name = '';
		var $image = '';
		var $item_image = '';
		var $price = '';
		var $sale = '';
		var $category = '';
		var $position = '';
		var $rarity = '';
		var $enable = '';
		var $description = '';
		var $label = '';
		var $chance = '';
		var $key = '';
		var $type = 0;
		var $open_count = 0;
		var $max_open_count = -1;
		var $time_limit = '';
		var $dep_for_open = 0;
		var $dep_open_count = 1;
		
		var $rarity_array = array('Base Grade', 'Consumer Grade', 'Industrial Grade', 'Mil-Spec Grade', 'Restricted', 'Classified', 'Covert', 'Knife');
		var $rarity_array_en = array('Base Grade', 'Consumer Grade', 'Industrial Grade', 'Mil-Spec Grade', 'Restricted', 'Classified', 'Covert', 'Knife');

		function __construct($id = '') {
			if ($id != '') {
				$this->load_ocase(safeescapestring(db()->nomysqlinj($id)));
			}
		}

		function get_id() {
			return $this->id;
		}

		function set_id($id) {
			$this->id = $id;
		}

		function get_name() {
			return $this->name;
		}

		function set_name($name) {
			$this->name = $name;
		}

		function get_image() {
			return $this->image;
		}
		
		function get_src_image() {
			return $this->image;
		}

		function set_image($image) {
			$this->image = $image;
		}
		
		function get_item_image() {
			return $this->item_image;
		}
		
		function get_src_item_image() {
			return $this->item_image;
		}

		function set_item_image($item_image) {
			$this->item_image = $item_image;
		}

		function get_price() {
			if ($this->get_type() == self::TYPE_PROMOCODE || $this->get_type() == self::TYPE_DEPOSITE) {
				return 0;
			}
			return $this->price;
		}
		
		function get_sale_price() {
			if ($this->get_total_sale() > 0) {
				return round($this->get_price() - $this->get_price() * ($this->get_total_sale() / 100));
			}
			return $this->get_price();
		}
		
		function get_final_price() {
			return $this->get_sale_price();
		}

		function set_price($price) {
			$this->price = $price;
		}
		
		function get_total_sale() {
			if ($this->get_type() == self::TYPE_DEFAULT) {
				return min(100, $this->sale + get_setval('opencase_global_sale'));
			}
			return 0;
		}

		function get_sale() {
			return $this->sale;
		}

		function set_sale($sale) {
			$this->sale = $sale;
		}
		
		function get_type() {
			return $this->type;
		}

		function set_type($type) {
			$this->type = $type;
		}
		
		function get_open_count() {
			return $this->open_count;
		}
		
		function inc_open_count() {
			if ($this->get_id() != '') {
				$this->open_count++;
				$this->update_ocase();
			}
		}

		function set_open_count($count) {
			$this->open_count = $count;
		}
		
		function get_max_open_count() {
			return $this->max_open_count;
		}

		function set_max_open_count($count) {
			$this->max_open_count = $count;
		}
		
		function get_time_limit() {
			return $this->time_limit;
		}

		function set_time_limit($time) {
			if (!empty($time) && !is_numeric($time)) {
				$time = strtotime($time);
			}
			$this->time_limit = $time;
		}

		function get_category() {
			return $this->category;
		}
		
		function get_category_class() {
			$category = new caseCategory($this->get_category());
			return $category;
		}

		function set_category($category) {
			$this->category = $category;
		}
		
		function get_position() {
			return $this->position;
		}
		
		function set_position($position) {
			$this->position = $position;
		}
		
		function get_position_max($category_id = false) {
			$pos = db()->query_once('select max(position) from `opencase_case` where category = "'.($category_id ? $category_id : safeescapestring(db()->nomysqlinj($this->get_category()))).'"');
			return isset($pos['max(position)'])? (int)$pos['max(position)'] : 0;
		}
		
		function get_rarity() {
			return $this->rarity;
		}
		
		function get_rarity_array() {
			return $this->rarity_array;
		}
		
		function get_rarity_array_en() {
			return $this->rarity_array;
		}
		
		function get_rarity_text() {
			return $this->rarity_array[$this->rarity];
		}
		
		function get_rarity_text_en() {
			return $this->rarity_array_en[$this->rarity];
		}
		
		function get_rarity_css() {
			return str_replace(' ', '-', mb_strtolower($this->rarity_array_en[$this->rarity]));
		}
		
		function set_rarity($rarity) {
			$this->rarity = $rarity;
		}
		
		function is_available() {
			return $this->get_enable() && ($this->get_max_open_count() < 0 || $this->get_open_count() < $this->get_max_open_count()) && (empty($this->get_time_limit()) || $this->get_time_limit() > time());
		}
		
		function allow_open_case_num($num) {
			return $this->get_max_open_count() < 0 || $this->get_open_count() + $num <= $this->get_max_open_count();
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
		
		function switch_enable() {
			$this->set_enable(!$this->get_enable());
		}

		function get_description() {
			return $this->description;
		}

		function set_description($description) {
			$this->description = $description;
		}

		function get_label() {
			return $this->label;
		}

		function set_label($label) {
			$this->label = $label;
		}

		function get_chance() {
			return $this->chance;
		}

		function set_chance($chance) {
			$this->chance = $chance;
		}

		function get_key() {
			return $this->key;
		}
		
		function get_dep_for_open() {
			return $this->dep_for_open;
		}

		function set_dep_for_open($dep) {
			$this->dep_for_open = $dep;
		}
		
		function get_dep_open_count() {
			return $this->dep_open_count;
		}

		function set_dep_open_count($count) {
			$this->dep_open_count = $count;
		}

		function set_key($key) {
			$this->key = $key;
		}

		function set_parametrs( $id, $name, $image, $item_image ,$price, $sale, $category, $position, $rarity, $enable, $description, $label, $chance, $key, $type, $open_count, $max_open_count, $time_limit, $dep_for_open, $dep_open_count) { 
 			$this->set_id($id);
			$this->set_name($name);
			$this->set_image($image);
			$this->set_item_image($item_image);
			$this->set_price($price);
			$this->set_sale($sale);
			$this->set_category($category);
			$this->set_position($position);
			$this->set_rarity($rarity);
			$this->set_enable($enable);
			$this->set_description($description);
			$this->set_label($label);
			$this->set_chance($chance);
			$this->set_key($key);
			$this->set_type($type);
			$this->set_open_count($open_count);
			$this->set_max_open_count($max_open_count);
			$this->set_time_limit($time_limit);
			$this->set_dep_for_open($dep_for_open);
			$this->set_dep_open_count($dep_open_count);
		}

		function set_parametrs_from_request() {			
			if (isset($_REQUEST['name']))
				$this->set_name($_REQUEST['name']);
			if (isset($_REQUEST['image']))
				$this->set_image($_REQUEST['image']);
			if (isset($_REQUEST['item_image']))
				$this->set_item_image($_REQUEST['item_image']);
			if (isset($_REQUEST['price']))
				$this->set_price($_REQUEST['price']);
			if (isset($_REQUEST['sale']))
				$this->set_sale($_REQUEST['sale']);
			if (isset($_REQUEST['category']))
				$this->set_category($_REQUEST['category']);
			if (isset($_REQUEST['position']))
				$this->set_position($_REQUEST['position']);
			if (isset($_REQUEST['rarity']))
				$this->set_rarity($_REQUEST['rarity']);
			if (isset($_REQUEST['enable']))
				$this->set_enable($_REQUEST['enable']);
			if (isset($_REQUEST['description']))
				$this->set_description($_REQUEST['description']);
			if (isset($_REQUEST['label']))
				$this->set_label($_REQUEST['label']);
			if (isset($_REQUEST['chance']))
				$this->set_chance($_REQUEST['chance']);
			if (isset($_REQUEST['key']))
				$this->set_key($_REQUEST['key']);
			if (isset($_REQUEST['type']))
				$this->set_type($_REQUEST['type']);
			if (isset($_REQUEST['open_count']))
				$this->set_open_count($_REQUEST['open_count']);
			if (isset($_REQUEST['max_open_count']))
				$this->set_max_open_count($_REQUEST['max_open_count']);
			if (isset($_REQUEST['time_limit']))
				$this->set_time_limit($_REQUEST['time_limit']);
			if (isset($_REQUEST['dep_for_open']))
				$this->set_dep_for_open($_REQUEST['dep_for_open']);
			if (isset($_REQUEST['dep_open_count']))
				$this->set_dep_open_count($_REQUEST['dep_open_count']);
		}

		function clear_parametrs() {
			$this->set_id('');
			$this->set_name('');
			$this->set_image('');
			$this->set_item_image('');
			$this->set_price('');
			$this->set_sale('');
			$this->set_category('');
			$this->set_position('');
			$this->set_rarity('');
			$this->set_enable('');
			$this->set_description('');
			$this->set_label('');
			$this->set_chance('');
			$this->set_key('');
			$this->set_type(0);
			$this->set_open_count(0);
			$this->set_max_open_count(-1);
			$this->set_time_limit('');
			$this->set_dep_for_open(0);
			$this->set_dep_open_count(1);
		}

		function load_ocase($id) {
			$cache = ch()->get('ocase'.$id);
			if (!$cache) {
                $redis = new Redis();
                $redis->connect('127.0.0.1', 6379);

                $cachekey = "ocaseload".$id;

                $ocase = '';

                if (!$redis->get($cachekey)) {
                    $ocase = db()->query_once('select * from opencase_case where id = "'.safeescapestring(db()->nomysqlinj($id)).'"');
                    $redis->set($cachekey, serialize($ocase));
                    $redis->expire($cachekey, 10);
                } else {
                    $ocase = unserialize($redis->get($cachekey));
                }

				$this->set_parametrs( $ocase['id'], $ocase['name'], $ocase['image'], $ocase['item_image'], $ocase['price'], $ocase['sale'], $ocase['category'],  $ocase['position'], $ocase['rarity'], $ocase['enable'], $ocase['description'], $ocase['label'], $ocase['chance'], $ocase['key'], $ocase['type'], $ocase['open_count'], $ocase['max_open_count'], $ocase['time_limit'], $ocase['dep_for_open'], $ocase['dep_open_count']);
				if ($this->get_id() != '') {
					ch()->set('ocase'.$ocase['id'], $this);
					ch()->set('ocase'.$ocase['key'], $this);
				}
			} else {
				$this->set_parametrs( $cache->get_id(), $cache->get_name(), $cache->get_image(), $cache->get_item_image(), $cache->get_price(), $cache->get_sale(), $cache->get_category(), $cache->get_position(), $cache->get_rarity(), $cache->get_enable(), $cache->get_description(), $cache->get_label(), $cache->get_chance(), $cache->get_key(), $cache->get_type(), $cache->get_open_count(), $cache->get_max_open_count(), $cache->get_time_limit(), $cache->get_dep_for_open(), $cache->get_dep_open_count());
			}
		}
		
		function load_from_key($key) {
			$cache = ch()->get('ocase'.$key);
			if (!$cache) {
                $redis = new Redis();
                $redis->connect('127.0.0.1', 6379);

                $cachekey = "ocaseloadkey".$key;

                $ocase = '';

                if (!$redis->get($cachekey)) {
                    $ocase = db()->query_once('select * from opencase_case where `key` = "'.safeescapestring(db()->nomysqlinj($key)).'"');
                    $redis->set($cachekey, serialize($ocase));
                    $redis->expire($cachekey, 10);
                } else {
                    $ocase = unserialize($redis->get($cachekey));
                }

				$this->set_parametrs( $ocase['id'], $ocase['name'], $ocase['image'], $ocase['item_image'], $ocase['price'], $ocase['sale'], $ocase['category'], $ocase['position'], $ocase['rarity'], $ocase['enable'], $ocase['description'], $ocase['label'], $ocase['chance'], $ocase['key'], $ocase['type'], $ocase['open_count'], $ocase['max_open_count'], $ocase['time_limit'], $ocase['dep_for_open'], $ocase['dep_open_count']);
				if ($this->get_id() != '') {
					ch()->set('ocase'.$ocase['id'], $this);
					ch()->set('ocase'.$ocase['key'], $this);
				}
			} else {
				$this->set_parametrs( $cache->get_id(), $cache->get_name(), $cache->get_image(), $cache->get_item_image(), $cache->get_price(), $cache->get_sale(), $cache->get_category(), $cache->get_position(), $cache->get_rarity(), $cache->get_enable(), $cache->get_description(), $cache->get_label(), $cache->get_chance(), $cache->get_key(), $cache->get_type(), $cache->get_open_count(), $cache->get_max_open_count(), $cache->get_time_limit(), $cache->get_dep_for_open(), $cache->get_dep_open_count());
			}
		}

		function add_ocase() {
			if ($this->get_type() == self::TYPE_PROMOCODE || $this->get_type() == self::TYPE_DEPOSITE) {
				$this->set_price(0);
			}
			db()->query_once('insert into opencase_case( `name`, `image`, `item_image`, `price`, `sale`, `category`, `position`, `rarity`, `enable`, `description`, `label`, `chance`, `key`, `type`, `open_count`, `max_open_count`, `time_limit`, `dep_for_open`, `dep_open_count`) values ( "'.safeescapestring(db()->nomysqlinj($this->get_name())).'", "'.safeescapestring(db()->nomysqlinj($this->get_image())).'", "'.safeescapestring(db()->nomysqlinj($this->get_item_image())).'", "'.safeescapestring(db()->nomysqlinj($this->get_price())).'", "'.safeescapestring(db()->nomysqlinj($this->get_sale())).'", "'.safeescapestring(db()->nomysqlinj($this->get_category())).'", "'.safeescapestring(db()->nomysqlinj($this->get_position())).'", "'.safeescapestring(db()->nomysqlinj($this->get_rarity())).'", "'.safeescapestring(db()->nomysqlinj($this->get_enable())).'", "'.str_replace('"', '\\"', $this->get_description()).'", "'.safeescapestring(db()->nomysqlinj($this->get_label())).'", "'.safeescapestring(db()->nomysqlinj($this->get_chance())).'", "'.safeescapestring(db()->nomysqlinj($this->get_key())).'", "'.safeescapestring(db()->nomysqlinj($this->get_type())).'", "'.safeescapestring(db()->nomysqlinj($this->get_open_count())).'", "'.safeescapestring(db()->nomysqlinj($this->get_max_open_count())).'", '.(empty($this->get_time_limit()) ? 'NULL' : ('"' . date('Y-m-d H:i:s', safeescapestring(db()->nomysqlinj($this->get_time_limit()))) . '"')) .', "'.safeescapestring(db()->nomysqlinj($this->get_dep_for_open())).'", "'.safeescapestring(db()->nomysqlinj($this->get_dep_open_count())) .'")');
		}

		function update_ocase() {
			if ($this->get_type() == self::TYPE_PROMOCODE || $this->get_type() == self::TYPE_DEPOSITE) {
				$this->set_price(0);
			}
			db()->query_once('update opencase_case set `name` = "'.safeescapestring(db()->nomysqlinj($this->get_name())).'", `image` = "'.safeescapestring(db()->nomysqlinj($this->get_image())).'", `item_image` = "'.safeescapestring(db()->nomysqlinj($this->get_item_image())).'", `price` = "'.safeescapestring(db()->nomysqlinj($this->get_price())).'", `sale` = "'.safeescapestring(db()->nomysqlinj($this->get_sale())).'", `category` = "'.safeescapestring(db()->nomysqlinj($this->get_category())).'", `position` = "'.safeescapestring(db()->nomysqlinj($this->get_position())).'", `rarity` = "'.safeescapestring(db()->nomysqlinj($this->get_rarity())).'", `enable` = "'.safeescapestring(db()->nomysqlinj($this->get_enable())).'", `description` = "'.str_replace('"', '\\"', $this->get_description()).'", `label` = "'.safeescapestring(db()->nomysqlinj($this->get_label())).'", `chance` = "'.safeescapestring(db()->nomysqlinj($this->get_chance())).'", `key` = "'.safeescapestring(db()->nomysqlinj($this->get_key())).'", `type` = "'.safeescapestring(db()->nomysqlinj($this->get_type())).'", `open_count` = "'.safeescapestring(db()->nomysqlinj($this->get_open_count())).'", `max_open_count` = "'.safeescapestring(db()->nomysqlinj($this->get_max_open_count())).'", `time_limit` = '.(empty($this->get_time_limit()) ? 'NULL' : ('"' . date('Y-m-d H:i:s', safeescapestring(db()->nomysqlinj($this->get_time_limit()))) . '"')).', `dep_for_open` = "'.safeescapestring(db()->nomysqlinj($this->get_dep_for_open())).'", `dep_open_count` = "'.safeescapestring(db()->nomysqlinj($this->get_dep_open_count())).'" where id = "'.safeescapestring(db()->nomysqlinj($this->get_id())).'"');
			if ($this->get_id() != '') {
				ch()->set('ocase'.$this->id, $this);
				ch()->set('ocase'.$this->get_key(), $this);
			}
		}

		function delete_ocase() {
			db()->query_once('delete from opencase_case where id = "'.safeescapestring(db()->nomysqlinj($this->get_id())).'"');
			ch()->delete('ocase'.$this->id);
			ch()->delete('ocase'.$this->get_key());
		}

		function get_ocases($where ='', $order = '', $limit = '') {
			$sql = 'select id from opencase_case';
			if ($where != '')
				$sql .= ' where '.$where;
			if ($order != '')
				$sql .= ' order by '.$order;
			if ($limit != '')
				$sql .= ' limit '.$limit;
			$ocasesArray = db()->query($sql);
			$ocases = array();
			if (is_array($ocasesArray)) {
				foreach ($ocasesArray as $ocaseElement) {
					$ocase = new ocase($ocaseElement['id']);
					array_push($ocases, $ocase);
				}
			}
			return $ocases;
		}
		
		function get_sum_label() {
			switch ($this->get_type()) {
				case self::TYPE_DEFAULT:
					return $this->get_price() . ' $';
				case self::TYPE_PROMOCODE:
					return 'Promo code';
				case self::TYPE_DEPOSITE:
					return 'Free case';
			}
		}
		
		function recalc_items_chances() {
			$itemincase = new itemincase();
			$allitems = $itemincase->get_itemincases('case_id = "' . $this->get_id() . '"');
			$casePrice = $this->get_price();
			if ($casePrice <= 0) {
				$casePrice = 100;
				foreach ($allitems as $item) {
					if ($item->get_price() < $casePrice) {
						$casePrice = $item->get_price();
					}
				}
			}
			$values = [];
			foreach ($allitems as $item) {
				if ($item->get_price() <= $casePrice) {
					$chance = 100;
				} else {
					$chance = ceil($casePrice * 100 / $item->get_price());
				}	
				$values[] = '("'.$item->get_id().'", "'.$chance.'")';
			}
			if (!empty($values)) {
				$sql = 'INSERT IGNORE INTO `opencase_itemincase` (`id`, `chance`) VALUES ';
				$sql .= implode(', ', $values);
				$sql .= ' ON DUPLICATE KEY UPDATE `chance` = VALUES(`chance`);';
				db()->query_once($sql);
			}
		}
	}
