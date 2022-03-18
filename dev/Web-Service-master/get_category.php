<<?php 

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['category_name'])) {

    // receiving the post params
    $category_name = $_POST['category_name'];    

    // get the user by email and password
    $categories = $db->getcategory($category_name);

    if ($categories != false) {
        // category is found
        $response["error"] = FALSE;        
        $response["categories"]["category_name"] = $categories["category_name"];        
        $response["categories"]["created_at"] = $categories["created_at"];
        $response["categories"]["updated_at"] = $categories["updated_at"];
        echo json_encode($response);
    } else {
        // user is not found with the credentials
        $response["error"] = TRUE;
        $response["error_msg"] = "Category name not found. Please try again!";
        echo json_encode($response);
    }
} else {
    // required post params is missing
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters name is missing";
    echo json_encode($response);
}








 ?>