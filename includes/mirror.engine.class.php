<?php
	class Mirror {
		private $campData;
		private $connect;

		function __construct ($campCode) {
			$this->connect = new Connect();
			$this->setCampData($campCode);
		}

		public function setCampData ($campCode) {
			$this->campData = $this->findCamp($campCode);
		}

		private function getCampData () {
			if (empty($this->campData))
				$this->campData = $this->findCamp();

			return $this->connect;
		}

		private function findCamp ($campCode) {
	        $query = "SELECT `id`, `camp_name` FROM `table_camp` WHERE `camp_code` = '{$campCode}'";
	        $this->connect->query($query);
	        $this->connect->next_record();
	        return $this->connect;
		}

		public function getCampID () {
			if ($this->isCampExist()) {
				while($this->getCampData()) {
					return $this->connect->getValue("id");
				}
			}
		}

		public function getCampName () {
			if ($this->isCampExist()) {
				while($this->getCampData()) {
					return $this->connect->getValue("camp_name");
				}
			}
		}

		public function isCampExist () {
			$connect = $this->getCampData();
			return $connect->num_rows() > 0;
		}
	}
?>