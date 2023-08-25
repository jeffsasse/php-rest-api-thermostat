<?php

// required headers

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/x-www-form-urlencoded; charset=UTF-8");
  
// database connection will be here
// include database and object files

include_once '../config/database.php';
include_once '../objects/product.php';

// instantiate database and product object

$database = new Database();
$db = $database->getConnection();
  
// initialize object

$product = new Product($db);


if (!empty($_GET['mac_id'])){

    // read products will be here
    // query products

    $product->mac_id = $_GET['mac_id'];
    $stmt = $product->read();
    $num = $stmt->rowCount();

    // return value (array value)

    $products_arr=array();

    // check if more than 0 record found

    if($num>0){
    
        // products array

        $products_arr["info"]=array();
        $products_arr["result"] = "succ";
        $products_arr["msg"] = "";
    
        // retrieve our table contents
        // fetch() is faster than fetchAll()
        // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            // extract row
            // this will make $row['name'] to
            // just $name only

            extract($row);
    
            $product_item=array(
                "mac_id" => $mac_id,
                "pattern" => $pattern,
                "humidity" => $humidity,
                "temperature" => $temperature,
                "indoor_temperature" => $indoor_temperature,
                "indoor_humidity" => $indoor_humidity,
                "state" => $state,
                "antifreeze" => $antifreeze,
                "delay_time" => $delay_time,
                "temperature_difference" => $temperature_difference,
                "holding_temperature" => $holding_temperature,
                "holding_time" => $holding_time,
                "keyboards" => $keyboards,
                "leave_days" => $leave_days,
                "temper_type" => $temper_type,
                "time_zone" => $time_zone,
                "holiday" => $holiday,
                "holiday_startime" => $holiday_startime,
                "holiday_endtime" => $holiday_endtime,
                "standbys" => $standbys,
                "program_mode" => $program_mode,
                "speed" => $speed,
                "keyboards_pass" => $keyboards_pass,
                "optimized_startup" => $optimized_startup,
                "online_type" => $online_type,
                "program_mode_con" => $program_mode_con
            );
    
            array_push($products_arr["info"], $product_item);
        }
    
        // set response code - 200 OK

        http_response_code(200);
    
        // show products data in json format

        echo json_encode($products_arr);
    }
    
    // no products found will be here

    else{
        $products_arr["info"]=array();
        $products_arr["result"] = "succ";
        $products_arr["msg"] = "No data";
    
        // set response code - 404 Not found

        http_response_code(200);
    
        // tell the user no products found

        echo json_encode($products_arr);
    }
} else{

    $products_arr["info"]=array();
    $products_arr["result"] = "error";
    $products_arr["msg"] = "No found";

    // set response code - 404 Not found

    http_response_code(404);
    
    // tell the user no products found

    echo json_encode(

        array($products_arr)
        
    );
}