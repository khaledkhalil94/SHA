 <?php
require_once ($_SERVER["DOCUMENT_ROOT"] . "/src/init.php");

$sec = "questions";
$session->is_logged_in() ? require(ROOT_PATH . "questions/question_user.php") : require(ROOT_PATH . "questions/question_pub.php");
?>
<script src="<?= BASE_URL ?>scripts/question.js"></script>
<script src="<?= BASE_URL ?>scripts/comment.js"></script>