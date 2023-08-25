<?php

// required headers

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection

include_once '../config/database.php';
  
// instantiate product object

include_once '../objects/product.php';
  
$database = new Database();
$db = $database->getConnection();
  
$product = new Product($db);
  
// get posted data

$data = json_decode(file_get_contents("php://input"));

// return value (array value)

$products_arr=array();
  
// make sure data is not empty

if(
    !empty($_GET['mac_id'])
){
  
    // set product property values

    $product->mac_id = $_GET['mac_id'];
    $product->pattern = empty($data->pattern) ? null : $data->pattern;
    $product->humidity = empty($data->humidity) ? null : $data->humidity;
    $product->temperature = empty($data->temperature) ? null : $data->temperature;
    $product->indoor_temperature = empty($data->indoor_temperature) ? null : $data->indoor_temperature;
    $product->indoor_humidity = empty($data->indoor_humidity) ? null : $data->indoor_humidity;
    $product->state = empty($data->state) ? null : $data->state;
    $product->antifreeze = empty($data->antifreeze) ? null : $data->antifreeze;
    $product->delay_time = empty($data->delay_time) ? null : $data->delay_time;
    $product->temperature_difference = empty($data->temperature_difference) ? null : $data->temperature_difference;
    $product->holding_temperature = empty($data->holding_temperature) ? null : $data->holding_temperature;
    $product->holding_time = empty($data->holding_time) ? null : $data->holding_time;
    $product->keyboards = empty($data->keyboards) ? null : $data->keyboards;
    $product->leave_days = empty($data->leave_days) ? null : $data->leave_days;
    $product->temper_type = empty($data->temper_type) ? null : $data->temper_type;
    $product->time_zone = empty($data->time_zone) ? null : $data->time_zone;
    $product->holiday = empty($data->holiday) ? null : $data->holiday;
    $product->holiday_startime = empty($data->holiday_startime) ? null : $data->holiday_startime;
    $product->holiday_endtime = empty($data->holiday_endtime) ? null : $data->holiday_endtime;
    $product->standbys = empty($data->standbys) ? null : $data->standbys;
    $product->program_mode = empty($data->program_mode) ? null : $data->program_mode;
    $product->speed = empty($data->speed) ? null : $data->speed;
    $product->keyboards_pass = empty($data->keyboards_pass) ? null : $data->keyboards_pass;
    $product->optimized_startup = empty($data->optimized_startup) ? null : $data->optimized_startup;
    $product->online_type = empty($data->online_type) ? null : $data->online_type;
    $product->program_mode_con = empty($data->program_mode_con) ? null : $data->program_mode_con;

    // check the mac id exist in table

    if($product->find()){

        // update the product

        if($product->update()){
            
            // set response code - 200 created

            http_response_code(200);
            $products_arr["result"]="succ";
            $products_arr["msg"]="The data was updated.";
            $products_arr["info"]=$product;
    
            // tell the user

            echo json_encode($products_arr);

        } else {
            
            // set response code - 503 service unavailable

            http_response_code(503);
            $products_arr["result"]="error";
            $products_arr["msg"]="Unable to update data.";
            $products_arr["info"]="";
    
            // tell the user

            echo json_encode($products_arr);
        }

    } else {

        // create the product

        if($product->create()){
    
            // set response code - 200 created

            http_response_code(200);
            $products_arr["result"]="succ";
            $products_arr["msg"]="The data was created.";
            $products_arr["info"]=$product;
    
            // tell the user

            echo json_encode($products_arr);

        }
    
        // if unable to create the product, tell the user

        else{
    
            // set response code - 503 service unavailable

            http_response_code(503);
    
            // tell the user

            $products_arr["result"]="error";
            $products_arr["msg"]="Unable to create data.";
            $products_arr["info"]="";
    
            // tell the user

            echo json_encode($products_arr);

        }
    }
}
  
// tell the user data is incomplete

else{
  
    // set response code - 400 bad request

    http_response_code(400);
    
    $products_arr["result"]="error";
    $products_arr["msg"]="Unable to create data or machine ID is not allowed to us. Data is incomplete.";
    $products_arr["info"]="";
    
    // tell the user
    
    echo json_encode($products_arr);

}
?>