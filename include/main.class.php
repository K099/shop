<?php 
	require_once("AES.php");
	Class MainShop {
		public $file = array("config"=>"include/config.enn","version"=>"include/version.enn");
		public $isfile;
		public $aes;
		public $db;
		public function __construct(){
			$this->aes = new Crypt_AES();
			$this->aes->setkey("fpjDg8hRB0E1xFiiUgiHp40kTVGZymSDAX2wiqvv9e574qyjXysnvg970SK7lbM8WKE5KPLJ8HbJxB2luYUgkNaIcRRnXOhD8yP0C8I");
			$this->isfile = pathinfo($_SERVER["SCRIPT_FILENAME"]);
			$this->isfile = $this->isfile["basename"];
			if($this->isfile != "install.php"){
				if($this->isInstall() == true){
					$this->db = new Database();
				}else{
					go("install.php");
				}
			}
		}
		public function isInstall(){
			if(!file_exists($this->file["config"])){
				go("install.php");
			}
			return true;
		}
		public function encrypt($str){
			return base64_encode($this->aes->encrypt($str));
		}
		public function decrypt($str){
			return $this->aes->decrypt(base64_decode($str));
		}
		public function loadfile($file){
			if(file_exists($file)){
				return json_decode($this->decrypt(file_get_contents($file)),true);
			}else{
				return false;
			}
		}
	}
	Class Database {
		private $con;
		public function __construct(){
			$this->con = mysqli_connect("localhost","root","123456","test");
			mysqli_set_charset($this->con,"utf-8");
		}
		public function query($str){
			return mysqli_query($this->con,$str);
		}
		public function bind($str){
			return mysqli_real_escape_string($this->con,htmlentities($str));
		}
	}
?>