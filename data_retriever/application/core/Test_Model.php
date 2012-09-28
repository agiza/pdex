<?php

class MY_Model extends CI_Model {
	
	private static $modelAliasCache = array();
	
	protected $tableName = "";

	public function MY_Model($tableName) {
		$this->tableName = $tableName;
		parent::Model();
	}
	
	/**
	 * @access public
	 * @param  arr $data
	 * @return array
	 */
	public function deleteAndSelectAll($data) {
		$this->db->delete($this->tableName, $data);
		return $this->selectAll();
	}
	
	/**
	 * @access public
	 * @param  arr $data
	 * @return array
	 */
	public function insertAndSelectAll($data) {
		$this->db->insert($this->tableName, $data);
		return $this->selectAll();
	}

	/**
	 * @param string $fields can be specified if you dont want everything
	 * @return void
	 */
	protected function loadAndSelectAll($fields = null) {
		$this->db->select(empty($fields) ? '*' : $fields);
		$this->db->from($this->tableName);
	}	
	
	public function selectAll() {
		$result = array();
		$this->loadAndSelectAll();
		$result = $this->db->get()->result_array();		
		return $result;
	}	
	
	// for now $options only supports order by, obviously can be expanded as needed
	function selectAllById($keyName, $keyValue, $options = null) {
		$result = array();
		if (!empty($keyName) && !empty($keyValue)) {
			$this->loadAndSelectAll();
			$this->db->where($this->tableName . '.' . $keyName, $keyValue);
			if (!empty($options)) {
				if (isset($options['orderby'])) {
					// default to ascending if nothing is set
					$direction = "asc";
					if (isset($options['direction'])) {
						$direction = $options['direction'];
					}
					$this->db->order_by($options['orderby'], $direction); 
				}
			}			
			if (!empty($options) && isset($options['count']) && $options['count']) {
				$result = $this->db->count_all_results();
			}
			else {
				$result = $this->db->get()->result_array();
			}
		}		
		return $result;
	}	
	
	/**
	 * @access public
	 * @param  mix $keyName
	 * @param  mix $keyValue
	 * @param  bool $useMemcache
	 * @return array
	 */
	public function selectById($keyName, $keyValue, $useMemcache = FALSE) {
		$result = array();
		if (!empty($keyName) && !empty($keyValue)) {
			$this->db->from($this->tableName);
			$this->db->where($keyName, $keyValue);
			$this->db->limit(1);
			if ($useMemcache) {
				$result = $this->db->get('', NULL, NULL, $this->db->generate_key())->row_array();
			} else {
				$result = $this->db->get()->row_array();
			}
		}
		return $result;
	}
        
	function updateFieldById($keyName, $keyValue, $updateName, $updateValue) {
		$success = false;
		if (!empty($keyName) && !empty($keyValue) && !empty($updateName)) {
			$dataToUpdate = array($updateName => $updateValue);
			$this->db->where($this->tableName . '.' . $keyName, $keyValue);
			$success = $this->db->update($this->tableName, $dataToUpdate);
		}
		return $success;
	}		
	
	public static function getModelAlias($pathToModel) {
		if (isset(self::$modelAliasCache[$pathToModel])) {
			return self::$modelAliasCache[$pathToModel];
		}
		self::$modelAliasCache[$pathToModel] = implode('_', explode('/', $pathToModel));
		return self::$modelAliasCache[$pathToModel];
	}
	
}

?>