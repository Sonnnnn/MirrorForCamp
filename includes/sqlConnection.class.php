<?php
	class Connect {
		public $connect;
		private $query;
		private $fetchVar;
		function __construct () {
			$this->connect = mysqli_connect(DB_HOST,DB_USER,DB_PWD, DB_NAME);
			mysqli_query($this->connect, "SET NAMES utf8");
		}

		public function getConnection () {
			return $this->connect;
		}

		public function query ($query) {
			$this->query = mysqli_query($this->connect, $query);
			return $this->query;
		}

		public function next_record () {
			$this->fetchVar = mysqli_fetch_assoc($this->query);
			return is_array($this->fetchVar);
		}

		public function getValue ($key) {
			return $this->fetchVar[$key];
		}

		public function num_rows () {
			return mysqli_num_rows($this->query);
		}

		public function aff_rows () {
			return @mysqli_affected_rows($this->connect);
		}
	}
?>