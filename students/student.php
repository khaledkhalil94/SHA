<?php
require_once ("../classes/init.php");
if (isset($_GET['id'])) {
	$id = intval($_GET["id"]);
}

$studentInfo = StudentInfo::find_by_id($id);
$student = Student::find_by_id($studentInfo->id);


if (empty($studentInfo)){
	echo "User was not found!";
	//header("Location: " . BASE_URL . "students/");
	exit;
}

$section = "students";
$pageTitle = $studentInfo->id;
include (ROOT_PATH . "inc/head.php");
include (ROOT_PATH . 'inc/header.php');
include (ROOT_PATH . 'inc/navbar.php');
 ?>
<div class="container">
<?php echo "Username: " . $studentInfo->username . "<br>";?>
<?php 
if (!empty($studentInfo->email)){
	echo "E-Mail: " . $studentInfo->email . "<br>";
} else {
	echo "User has not set an E-Mail! <br>";
}
 ?>


	<div class="details row">
		<div class="col-md-5">
			<div class="image"><img src=<?php echo $student->id;?> alt=""></div>
		</div>
			<div class="col-md-6">
				<p><?php echo "Name: " . $student->full_name(); ?></p>
				<p><?php echo "ID: " . $student->id; ?></p>
				<p><?php echo "Address: " . $student->address; ?></p>
				<p><?php echo "Phone Number: " . $student->phoneNumber; ?></p>
			</div>
	</div>
	
	<a href="<?php echo BASE_URL ."students/editstudent.php?id=". $id ?>"><p>Edit information</p></a>
</div>
<?php
include (ROOT_PATH . 'inc/footer.php');
?>