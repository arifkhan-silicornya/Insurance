<?php 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);

if (isset($_POST['category_name'])) {

    // receiving the post params
    $category_name = $_POST['category_name']; 

    
        // create a new category
        $categories = $db->storeCategory($category_name);
        if ($categories) {
            // user stored successfully
            $response["error"] = FALSE;            
            $response["categories"]["category_name"] = $categories["category_name"];            
            $response["categories"]["created_at"] = $categories["created_at"];
            $response["categories"]["updated_at"] = $categories["updated_at"];
            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
 else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (category_name) is missing!";
    echo json_encode($response);
}


 ?>