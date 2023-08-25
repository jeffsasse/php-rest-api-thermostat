<?php

// required headers

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/x-www-form-urlencoded; charset=UTF-8");
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
    // check the mac id exist in table

    // read products will be here
    // query products

    $product->mac_id = $_GET['mac_id'];
    $stmt = $product->read();
    $num = $stmt->rowCount();

    if($num>0){
        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            // extract row
            // this will make $row['name'] to
            // just $name only

            extract($row);
    
            // set product property values

            $product->mac_id = $_GET['mac_id'];
            $product->pattern = isset($_GET['pattern']) ? $_GET['pattern'] : $pattern;
            $product->humidity = isset($_GET['humidity']) ? $_GET['humidity'] : $humidity;
            $product->temperature = isset($_GET['temperature']) ? $_GET['temperature'] :  $temperature;
            $product->indoor_temperature = isset($_GET['indoor_temperature']) ? $_GET['indoor_temperature'] : $indoor_temperature;
            $product->indoor_humidity = isset($_GET['indoor_humidity']) ? $_GET['indoor_humidity'] : $indoor_humidity;
            $product->state = isset($_GET['state']) ? $_GET['state'] : $state;
            $product->antifreeze = isset($_GET['antifreeze']) ? $_GET['antifreeze'] : $antifreeze;
            $product->delay_time = isset($_GET['delay_time']) ? $_GET['delay_time'] : $delay_time;
            $product->temperature_difference =isset($_GET['temperature_difference']) ? $_GET['temperature_difference'] : $temperature_difference;
            $product->holding_temperature = isset($_GET['holding_temperature']) ? $_GET['holding_temperature'] : $holding_temperature;
            $product->holding_time = isset($_GET['holding_time']) ? $_GET['holding_time'] : $holding_time;
            $product->keyboards = isset($_GET['keyboards']) ? $_GET['keyboards'] : $keyboards;
            $product->leave_days = isset($_GET['leave_days']) ? $_GET['leave_days'] : $leave_days;
            $product->temper_type = isset($_GET['temper_type']) ? $_GET['temper_type'] : $temper_type;
            $product->time_zone = isset($_GET['time_zone']) ? $_GET['time_zone'] : $time_zone;
            $product->holiday = isset($_GET['holiday']) ? $_GET['holiday'] : $holiday;
            $product->holiday_startime = isset($_GET['holiday_startime']) ? $_GET['holiday_startime'] : $holiday_startime;
            $product->holiday_endtime = isset($_GET['holiday_endtime']) ? $_GET['holiday_endtime'] : $holiday_endtime;
            $product->standbys = isset($_GET['standbys']) ? $_GET['standbys'] : $standbys;
            $product->program_mode =isset($_GET['program_mode']) ? $_GET['program_mode'] : $program_mode;
            $product->speed = isset($_GET['speed']) ? $_GET['speed'] : $speed;
            $product->keyboards_pass =isset($_GET['keyboards_pass']) ? $_GET['keyboards_pass'] : $keyboards_pass;
            $product->optimized_startup = isset($_GET['optimized_startup']) ? $_GET['optimized_startup'] : $optimized_startup;
            $product->online_type =isset($_GET['online_type']) ? $_GET['online_type'] : $online_type;
            $product->program_mode_con = isset($_GET['program_mode_con']) ? $_GET['program_mode_con'] : $program_mode_con;
        }


        // update the product

        if($product->update()){

            
            // set response code - 200 created

            http_response_code(200);
            $products_arr["result"]="succ";
            $products_arr["msg"]="The data was updated.";
            $products_arr["info"]='';

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
        // set product property values

        $product->mac_id = $_GET['mac_id'];
        $product->pattern = isset($_GET['pattern']) ? $_GET['pattern'] : null;
        $product->humidity = isset($_GET['humidity']) ? $_GET['humidity'] : null;
        $product->temperature = isset($_GET['temperature']) ? $_GET['temperature'] :  null;
        $product->indoor_temperature = isset($_GET['indoor_temperature']) ? $_GET['indoor_temperature'] : null;
        $product->indoor_humidity = isset($_GET['indoor_humidity']) ? $_GET['indoor_humidity'] : null;
        $product->state = isset($_GET['state']) ? $_GET['state'] : null;
        $product->antifreeze = isset($_GET['antifreeze']) ? $_GET['antifreeze'] : null;
        $product->delay_time = isset($_GET['delay_time']) ? $_GET['delay_time'] : null;
        $product->temperature_difference =isset($_GET['temperature_difference']) ? $_GET['temperature_difference'] : null;
        $product->holding_temperature = isset($_GET['holding_temperature']) ? $_GET['holding_temperature'] : null;
        $product->holding_time = isset($_GET['holding_time']) ? $_GET['holding_time'] : null;
        $product->keyboards = isset($_GET['keyboards']) ? $_GET['keyboards'] : null;
        $product->leave_days = isset($_GET['leave_days']) ? $_GET['leave_days'] : null;
        $product->temper_type = isset($_GET['temper_type']) ? $_GET['temper_type'] : null;
        $product->time_zone = isset($_GET['time_zone']) ? $_GET['time_zone'] : null;
        $product->holiday = isset($_GET['holiday']) ? $_GET['holiday'] : null;
        $product->holiday_startime = isset($_GET['holiday_startime']) ? $_GET['holiday_startime'] : null;
        $product->holiday_endtime = isset($_GET['holiday_endtime']) ? $_GET['holiday_endtime'] : null;
        $product->standbys = isset($_GET['standbys']) ? $_GET['standbys'] : null;
        $product->program_mode =isset($_GET['program_mode']) ? $_GET['program_mode'] : null;
        $product->speed = isset($_GET['speed']) ? $_GET['speed'] : null;
        $product->keyboards_pass =isset($_GET['keyboards_pass']) ? $_GET['keyboards_pass'] : null;
        $product->optimized_startup = isset($_GET['optimized_startup']) ? $_GET['optimized_startup'] : null;
        $product->online_type =isset($_GET['online_type']) ? $_GET['online_type'] : null;
        $product->program_mode_con = isset($_GET['program_mode_con']) ? $_GET['program_mode_con'] : null;

        // create the product

        if($product->create()){
    
            // set response code - 200 created

            http_response_code(200);
            $products_arr["result"]="succ";
            $products_arr["msg"]="The data was created.";
            $products_arr["info"]='';
    
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