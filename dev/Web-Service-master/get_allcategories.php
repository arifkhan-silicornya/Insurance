<<?php 

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

// json response array
$response = array("error" => FALSE);
   

    // get the user by email and password
    $categories = $db->getcategories();
    foreach ($categories as $category ) {
        if ($categories != false) {
        // category is found
        $response["error"] = FALSE;        
        $category.$response["categories"]["category_name"] = $categories["category_name"];        
        $category.$response["categories"]["created_at"] = $categories["created_at"];
        $category.$response["categories"]["updated_at"] = $categories["updated_at"];
        echo json_encode($response);
    
    }
    else {
        // Categories not found
        $response["error"] = TRUE;
        $response["error_msg"] = "Category name not found. Please try again!";
        echo json_encode($response);
    }

}

 ?>