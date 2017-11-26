<?php

class Personal {
  private $id;
  private $name;
  private $lastname;
  private $age;
  private $gender;
  private $date_age;
  private $dni;
  private $movil_phone;
  private $email;
  private $street_id;
  private $number_street;
  private $location_id;
  private $rank_id;
  private $date_start;
  private $date_end;
  private $info;




  public function __construct($id, $name, $lastname, $age, $gender, $date_age, $dni, $movil_phone, $email, $street_id, $number_street, $location_id, $rank_id, $date_start, $date_end, $info = null) {


    $this->$id = $id;
    $this->$name = $name;
    $this->$lastname = $lastname;
    $this->$age = $age;
    $this->$gender = $gender;
    $this->$date_age = $date_age;
    $this->$dni = $dni;
    $this->$movil_phone = $movil_phone;
    $this->$email = $email;
    $this->$street_id = $street_id;
    $this->$number_street = $number_street;
    $this->$location_id = $location_id ;
    $this->$rank_id = $rank_id;
    $this->$date_start = $date_start;
    $this->$date_end = $date_end;
    $this->$info = $info;


  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  public function setLastname($lastname) {
    $this->lastname = $lastname;
  }

  public function getLastname() {
    return $this->lastname;
  }

  public function getAge() {
    return $this->age;
  }

  public function setAge($age) {
    $this->age = $age;
  }

  public function setGender($gender) {
    $this->gender = $gender;
  }

  public function getGender() {
    return $this->gender;
  }

  public function getDate_age() {
    return $this->date_age;
  }

  public function setDate_age($date_age){
    $this->date_age = $date_age;
  }

  public function setDni($dni) {
    $this->dni = $dni;
  }

  public function getDni() {
    return $this->dni;
  }

  public function setMovilphone($movil_phone) {
    $this->movil_phone = $movil_phone;
  }

  public function getMovil_phone() {
    return $this->movil_phone;
  }

  public function setEmail($email) {
    $this->email = $email;
  }
  public function getEmail() {
    return $this->email;
  }

  public function setStreet_id($street_id) {
    $this->street_id = $street_id;
  }
  public function getStreet_id() {
    return $this->street_id;
  }

  public function setNumber_street($number_street) {
    $this->number_street = $number_street;
  }
  public function getNumber_street() {
    return $this->number_street;
  }

  public function setLocation_id($location_id) {
    $this->location_id = $location_id;
  }
  public function getLocation_id() {
    return $this->location_id;
  }

  public function setRank_id($rank_id) {
    $this->rank_id = $rank_id;
  }
  public function getRank_id() {
    return $this->rank_id;
  }

  public function setDate_start($date_star) {
    $this->date_star = $date_star;
  }
  public function getDate_start() {
    return $this->date_star;
  }

  public function setDate_end($date_end) {
    $this->date_end = $date_end;
  }
  public function setDate_end() {
    return $this->date_end;
  }

  public function setInfo($info) {
    $this->info = $info;
  }
  public function getInfo() {
    return $this->info;
  }


  function guardarImagen() {

		if ($_FILES["avatar"]["error"] == UPLOAD_ERR_OK)
		{

			$nombre=$_FILES["avatar"]["name"];
			$archivo=$_FILES["avatar"]["tmp_name"];

			$ext = pathinfo($nombre, PATHINFO_EXTENSION);

			$miArchivo = dirname(__FILE__);
			$miArchivo = $miArchivo . "/../img/";
			$miArchivo = $miArchivo . $this->email . "." . $ext;

			move_uploaded_file($archivo, $miArchivo);
		}
	}
}

?>
