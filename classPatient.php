<?php


	Class patient{

		private $server = "localhost";
		private $username = "root";
		private $password = "";
		private $db = "blood_bank_system";
		private $conn;

		public function __construct(){
			try {
				
				$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "connection failed" . $e->getMessage();
			}
		}

		public function insertPatient(){
			if($_SERVER['REQUEST_METHOD'] == "POST")
            {
				if (!empty($_POST['name']) && !empty($_POST['bloodType']) && !empty($_POST['address']))
                {
					$name = $_POST['name'];
					$bloodType = $_POST['bloodType'];
					$address = $_POST['address'];
					$query = "INSERT INTO patients (name,bloodType,address) VALUES ('$name','$bloodType','$address')";
					if ($sql = $this->conn->query($query)){
						echo "<script>alert('record added successfully');</script>";
						echo "<script>window.location.href = 'Donors&Patient.php';</script>";
					}else{
						echo "<script>alert('failed');</script>";
						echo "<script>window.location.href = 'addPatient.php';</script>";
					}
				}else{
					echo "<script>alert('empty');</script>";
					echo "<script>window.location.href = 'addPatient.php';</script>";
				}
			}
		}
		public function fetch(){
			$data = null;

			$query = "SELECT * FROM patients";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function delete($id){

			$query = "DELETE FROM patients where id = '$id'";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}

		public function fetch_single($id){

			$data = null;

			$query = "SELECT * FROM patients WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while ($row = $sql->fetch_assoc()) {
					$data = $row;
				}
			}
			return $data;
		}

		public function edit($id){

			$data = null;

			$query = "SELECT * FROM patients WHERE id = '$id'";
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

		public function update($data){

			$query = "UPDATE patients SET name='$data[name]', bloodType='$data[bloodType]', address='$data[address]' WHERE id='$data[id] '";

			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}

		public function search(){
			$data = null;

			$filtervalues = $_GET['search'];
            $query = "SELECT * FROM patients WHERE CONCAT(name,bloodType,address) LIKE '%$filtervalues%' ";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}
	}

?>