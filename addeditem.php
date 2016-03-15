<?php 
session_start();

   require "connect.php";
/*data upload function*/
function dbRowInsert($con, $table_name, $form_data)
{
    // retrieve the keys of the array (column titles)
    $fields = array_keys($form_data);

    // build the query
    $sql = "INSERT INTO ".$table_name."
    (`".implode('`,`', $fields)."`)
    VALUES('".implode("','", $form_data)."')";
    // run and return the query result resource
	echo $sql;
    return mysqli_query($con, $sql);
}

/*check image*/
$imagedata = addslashes(file_get_contents($_FILES["fileToUpload"]["tmp_name"]));

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);  
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . "." ;
        //$uploadOk = 1;
    } else {
        echo "File is not an image.";
       //$uploadOk = 0;
    }
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    //$uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //$uploadOk = 0;
}




//insert item info into database
if(isset($_POST['submit'])){
 

$form_data = array(
    "item_name" => $_POST["item_name"],
    "item_description" => $_POST["item_description"],
    "item_selling_price" => $_POST['item_selling_price'],
    "item_reserve_price" => $_POST["item_reserve_price"],
    "item_category_id" => $_POST[ "categorylist"],
    "seller_id"=>$_SESSION["UserID"],
    "item_image"=>$_POST[$imagedata]
);


dbRowInsert($connection,"item", $form_data);

header('Location:../php/ManageAccount.php');

}



?>