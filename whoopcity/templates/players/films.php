<?php 

// Where the file is going to be placed 
$target_path = "films/";

/* Add the original filename to our target path.  
Result is "uploads/filename.extension" */

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

$target_path = "films/";

$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
    " has been uploaded";
    	header('Location: profile_edit');

}


else{
    echo "There was an error uploading the file, please try again!";
}