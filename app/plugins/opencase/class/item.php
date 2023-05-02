<?php
	class item {
		var $id = '';
		var $name = '';
		var $image = '';
		var $quality = 0;
		var $price = 0;
		
		var $quality_array = array('ranknft1', 'ranknft2', 'ranknft3', 'ranknft4', 'ranknft5', 'ranknft6');
		var $quality_array_en = array('ranknft1', 'ranknft2', 'ranknft3', 'ranknft4', 'ranknft5', 'ranknft6');
		var $quality_css = array('ranknft1', 'ranknft2', 'ranknft3', 'ranknft4', 'ranknft5', 'ranknft6');

		function __construct($id = '') {
			if ($id != '') {
				$this->load_item(safeescapestring(db()->nomysqlinj($id)));
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

		function set_image($image) {
			$this->image = $image;
		}

		function get_quality() {
			return $this->quality;
		}

        function get_network() {
            return $this->network;
        }

        function get_tranche() {
            return $this->tranche;
        }

        function get_status() {
            return $this->status;
        }

        function get_date() {
            return $this->date;
        }


        function get_mintaddress() {
            return $this->mintaddress;
        }

        function set_network($network) {
            $this->network = $network;
        }

        function set_status($status) {
            $this->status = $status;
        }

        function set_tranche($tranche) {
            $this->tranche = $tranche;
        }

        function set_date($date) {
            $this->date = $date;
        }

        function set_mintaddress($mintaddress) {
            $this->mintaddress = $mintaddress;
        }

		function get_text_quality() {
			return $this->quality_array[$this->get_quality()];
		}
		
		function get_quality_array() {
			return $this->quality_array;
		}
		
		function get_text_quality_en() {
			return isset($this->quality_array_en[$this->get_quality()])? $this->quality_array_en[$this->get_quality()] : '';
		}
		
		function get_css_quality_class() {
			return isset($this->quality_css[$this->get_quality()])? $this->quality_css[$this->get_quality()] : '';
		}
		
		function get_quality_array_en() {
			return $this->quality_array_en;
		}

		function set_quality($quality) {
			if (is_int(stripos($this->get_name(), '★')))
				$quality = 12;
			$this->quality = $quality;
		}
		
		function get_price() {
			return (float)$this->price;
		}

		function set_price($price) {
			$this->price = (float)$price;
		}

		function set_parametrs( $id, $name, $image, $quality, $price, $network, $mintaddress, $status, $date, $tranche) {
 			$this->set_id($id);
			$this->set_name($name);
			$this->set_image($image);
			$this->set_quality($quality);
			$this->set_price($price);
            $this->set_network($network);
            $this->set_mintaddress($mintaddress);
            $this->set_status($status);
            $this->set_date($date);
            $this->set_tranche($tranche);
		}

		function set_parametrs_from_request() {
			if ($_REQUEST['name'] != '')
				$this->set_name($_REQUEST['name']);
			if ($_REQUEST['image'] != '')
				$this->set_image($_REQUEST['image']);
			if ($_REQUEST['quality'] != '')
				$this->set_quality($_REQUEST['quality']);
			if ($_REQUEST['price'] != '')
				$this->set_price($_REQUEST['price']);
            if ($_REQUEST['network'] != '')
                $this->set_network($_REQUEST['network']);
            if ($_REQUEST['mintaddress'] != '')
                $this->set_mintaddress($_REQUEST['mintaddress']);
            if ($_REQUEST['status'] != '')
                $this->set_status($_REQUEST['status']);
            if ($_REQUEST['date'] != '')
                $this->set_date($_REQUEST['date']);
            if ($_REQUEST['tranche'] != '')
                $this->set_tranche($_REQUEST['tranche']);
		}

		function clear_parametrs() {
			$this->set_id('');
			$this->set_name('');
			$this->set_image('');
			$this->set_quality('');
			$this->set_price(0);
            $this->set_network('');
            $this->set_mintaddress('');
            $this->set_status(1);
            $this->set_date('');
            $this->set_tranche(0);
		}

		function load_item($id) {
			$cache = ch()->get('item'.$id);
			if (!$cache) {
                $redis = new Redis();
                $redis->connect('127.0.0.1', 6379);

                $cachekey = "loaditemch".$id;

                $item = '';

                if (!$redis->get($cachekey)) {
                    $item = db()->query_once('select * from opencase_items where id = "'.safeescapestring(db()->nomysqlinj($id)).'"');
                    $redis->set($cachekey, serialize($item));
                    $redis->expire($cachekey, 7);
                } else {
                    $item = unserialize($redis->get($cachekey));
                }


				$this->set_parametrs( $item['id'], $item['name'], $item['image'], $item['quality'], $item['price'], $item['network'], $item['mintaddress'], $item['status'], $item['date'], $item['tranche']);
				if ($this->get_id() != '')
					ch()->set('item'.$id, $this);
			} else {
				$this->set_parametrs( $cache->get_id(), $cache->get_name(), $cache->get_image(), $cache->get_quality(), $cache->get_price(), $cache->get_network(), $cache->get_mintaddress(), $cache->get_status(), $cache->get_date(), $cache->get_tranche());
			}
		}

		function add_item() {
			db()->query_once('insert into opencase_items( `name`, `image`, `quality`, `price`, `network`, `mintaddress`, `status`, `date`, `tranche`) values ( "'.safeescapestring(db()->nomysqlinj($this->get_name())).'", "'.safeescapestring(db()->nomysqlinj($this->get_image())).'", "'.safeescapestring(db()->nomysqlinj($this->get_quality())).'", "'.safeescapestring(db()->nomysqlinj($this->get_price())).'", "'.safeescapestring(db()->nomysqlinj($this->get_network())).'", "'.safeescapestring(db()->nomysqlinj($this->get_mintaddress())).'", "'.safeescapestring(db()->nomysqlinj($this->get_status())).'", "'.safeescapestring(db()->nomysqlinj($this->get_date())).'", "'.safeescapestring(db()->nomysqlinj($this->get_tranche())).'")');
		}

		function update_item() {
			db()->query_once('update opencase_items set `name` = "'.safeescapestring(db()->nomysqlinj($this->get_name())).'", `image` = "'.safeescapestring(db()->nomysqlinj($this->get_image())).'", `quality` = "'.safeescapestring(db()->nomysqlinj($this->get_quality())).'", `price` = "'.safeescapestring(db()->nomysqlinj($this->get_price())).'", `network` = "'.safeescapestring(db()->nomysqlinj($this->get_network())).'", `mintaddress` = "'.safeescapestring(db()->nomysqlinj($this->get_mintaddress())).'", `status` = "'.safeescapestring(db()->nomysqlinj($this->get_status())).'", `date` = "'.safeescapestring(db()->nomysqlinj($this->get_date())).'", `tranche` = "'.safeescapestring(db()->nomysqlinj($this->get_tranche())).'" where id = "'.safeescapestring(db()->nomysqlinj($this->get_id())).'"');
			if ($this->get_id() != '')
				ch()->set('item'.$this->id, $this);
		}

		function delete_item() {
			db()->query_once('delete from opencase_items where id = "'.safeescapestring(db()->nomysqlinj($this->get_id())).'"');
			ch()->delete('item'.$this->id);
		}

		function get_items($where ='', $order = '', $limit = '') {
			$sql = 'select id from opencase_items';
			if ($where != '')
				$sql .= ' where '.$where;
			if ($order != '')
				$sql .= ' order by '.$order;
			if ($limit != '')
				$sql .= ' limit '.$limit;
			$itemsArray = db()->query($sql);
			$items = array();
			if (is_array($itemsArray)) {
				foreach ($itemsArray as $itemElement) {
					$item = new item($itemElement['id']);
					array_push($items, $item);
				}
			}
			return $items;
		}
		
		function get_name_realname() {
			return $this->get_name();
		}
		
		function get_name_realname_no_quality() {
			return $this->get_name_realname();
		}
		
		function get_clear_name_key() {
			return str_replace(' ', '', $this->get_name_realname_no_quality());
		}


}