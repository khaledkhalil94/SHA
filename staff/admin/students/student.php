<?php
require_once ($_SERVER["DOCUMENT_ROOT"]."/sha/classes/init.php");
$session->adminLock();
$id =sanitize_id($_GET['id']) ?: null;

if(!$id){
	redirect_to_D("/sha", 2);
}
$studentInfo = StudentInfo::find_by_id($id) ? StudentInfo::find_by_id($id) : die("User was not found");
$student = Student::find_by_id($studentInfo->id);
$img_path = ProfilePicture::get_profile_pic($student);
$faculty = Student::get_faculty($student->faculty_id);
$date = displayDate($studentInfo->activity);
$dateAgo = get_timeago($studentInfo->activity);

if (empty($studentInfo)){
	echo "User was not found!";
	//header("Location: " . BASE_URL . "students/");
	exit;
} elseif(empty($student)){
	$session->message("Please update your information");
	header("Location: " . BASE_URL . "students/settings/editstudent.php?id=".$id);
}

$pageTitle = $studentInfo->id;
include (ROOT_PATH . "inc/head.php");
 ?>
<div style="padding:20px;" class="content student">
<?= msgs(); ?>
<a href="<?= "students.php" ?>">&laquo; Go back</a>

		<a style="float:right;" class="btn btn-default" href="<?= BASE_URL."staff/admin/students/compose.php?to=".$id?>" role="button">Send a private message</a>
	<div class="details row">
		<div class="col-md-5">
			<div class="image"><img src="<?= $img_path;?>" alt="" style="width:278px;"></div>
		</div>
			<div class="col-md-6">
				<p><?= "Name: " . $student->full_name(); ?></p>
				<p><?= "ID: " . $student->id; ?></p>
				<p><?= "Address: " . $student->address; ?></p>
				<p><?= "Phone Number: " . $student->phoneNumber; ?></p>
				<?= !empty($faculty) ? "<p>Faculty {$faculty}</p>" : null; ?>
				<p title="<?= $date; ?>"><?= "Latest Activity: " . $dateAgo; ?></p>
				<p title="<?= $date; ?>"><?= "Registered on : " . displayDate($studentInfo->register_date, "j/n/Y"); ?></p>
				<a class="btn btn-default" href="<?= BASE_URL."staff/admin/students/editstudent.php?id=".$id?>" role="button">Change information</a>
				<a class="btn btn-default" href="<?= BASE_URL."staff/admin/students/account.php?id=".$id?>" role="button">Change settings</a>
				<a class="btn btn-default" href="<?= "previewlogs.php?id=".$id ?>" role="button">Preview user logs</a>
				<a class="btn btn-danger" href="<?= BASE_URL."staff/admin/students/deleteuser.php?id=".$id ?>" role="button">Delete User</a>

			</div>
	</div>
</div>
<?php
include (ROOT_PATH . 'inc/footer.php');
?>