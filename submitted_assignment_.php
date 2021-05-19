<?php include('includes/s_header.php'); ?>
<?php include('includes/term_info.php'); ?>
<?php require_once('classes/functions.php'); ?>
<?php require_once('classes/session.php'); ?>
<?php require_once('includes/config2.php'); ?>
<?php require_once('classes/database.php'); ?>
<?php
// Access the $_FILES global variable for this specific file being uploaded
// and create local PHP variables from the $_FILES array of information
$ass_id=$_POST['ass_id'];
$location="homework";
$fileName = $_FILES["uploaded_file"]["name"]; // The file name
$fileTmpLoc = $_FILES["uploaded_file"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["uploaded_file"]["type"]; // The type of file it is
$fileSize = $_FILES["uploaded_file"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["uploaded_file"]["error"]; // 0 for false... and 1 for true
$split_foto = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = end($split_foto); // Now target the last array element to get the file extension
// START PHP Image Upload Error Handling --------------------------------------------------
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
} else if($fileSize > 15242880) { // if file size is larger than 15.24 Megabytes
    echo "ERROR: Your file was larger than 5 Megabytes in size.";
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
    exit();
} else if (!preg_match("/.(jpg|png|jpeg|pdf|docx|dotx|xls|xlsx)$/i", $fileName) ) {
     // This condition is only if you wish to allow uploading of specific file types    
     echo "ERROR: Your image was not .gif, .jpg, or .png.";
     unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
     exit();
} else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
    echo "ERROR: An error occured while processing the file. Try again.";
    exit();
}
// END PHP Image Upload Error Handling ----------------------------------------------------
// Place it into your "uploads" folder mow using the move_uploaded_file() function
$moveResult = move_uploaded_file($fileTmpLoc, "$location/$fileName");

	//querry//
$date=date('M j, Y');

$query="INSERT INTO `submitted_homework` (file_name, file_ext, file_size, `class_name`, `date`, `sess_id`, `term_id`, `student_id`, `assignment_id`) VALUES ('$fileName', '$fileExt', '$fileSize', '$my_class', '$date', '$sess_id', '$term_id', '$s_id', '$ass_id') "; // id from s_header
$result=mysql_query($query);
	if ($result){
				$_SESSION['foto_name']= $fileName;
				$session->message("Assignment / homework has been successfully uploaded and submitted to class teacher");
		redirect_to('download_assignment.php');
		exit();
	}
		else
		
		{
			die ('uploads  was not successful, please try again later'. mysql_error());
		}
		?>


		

</body>
</html>
