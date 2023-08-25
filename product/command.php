<?php

// required headers

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
  
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

        $products_arr["msg"] = "";
    
        // get the data from GET parameters

        // get the pattern field from parameter

        if(isset($_GET['pattern']))
        {
            // Do something

            $product->pattern = $_GET['pattern'];
            $pr = 'pattern';

            // update the pattern
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ pattern : ".$product->pattern."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the humidity field from parameter humidity

        if(isset($_GET['humidity']))
        {
            // Do something

            $product->humidity = $_GET['humidity'];
            $pr = 'humidity';

            // update the humidity
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ humidity : ".$product->humidity."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the temperature field from parameter temperature

        if(isset($_GET['temperature']))
        {
            // Do something

            $product->temperature = $_GET['temperature'];
            $pr = 'temperature';

            // update the temperature
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ temperature : ".$product->temperature."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the indoor_temperature field from parameter indoor_temperature

        if(isset($_GET['indoor_temperature']))
        {
            // Do something

            $product->indoor_temperature = $_GET['indoor_temperature'];
            $pr = 'indoor_temperature';

            // update the indoor_temperature
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ indoor_temperature : ".$product->indoor_temperature."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the indoor_humidity field from parameter indoor_humidity

        if(isset($_GET['indoor_humidity']))
        {
            // Do something

            $product->indoor_humidity = $_GET['indoor_humidity'];
            $pr = 'indoor_humidity';

            // update the indoor_humidity
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ indoor_humidity : ".$product->indoor_humidity."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the state field from parameter state

        if(isset($_GET['state']))
        {
            // Do something

            $product->state = $_GET['state'];
            $pr = 'state';

            // update the state
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ state : ".$product->state."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the antifreeze field from parameter antifreeze

        if(isset($_GET['antifreeze']))
        {
            // Do something

            $product->antifreeze = $_GET['antifreeze'];
            $pr = 'antifreeze';

            // update the antifreeze
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ antifreeze : ".$product->antifreeze."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the delay_time field from parameter delay_time

        if(isset($_GET['delay_time']))
        {
            // Do something

            $product->delay_time = $_GET['delay_time'];
            $pr = 'delay_time';

            // update the delay_time
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ delay_time : ".$product->delay_time."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the temperature_difference field from parameter temperature_difference

        if(isset($_GET['temperature_difference']))
        {
            // Do something

            $product->temperature_difference = $_GET['temperature_difference'];
            $pr = 'temperature_difference';

            // update the temperature_difference
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ temperature_difference : ".$product->temperature_difference."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the holding_temperature field from parameter holding_temperature

        if(isset($_GET['holding_temperature']))
        {
            // Do something

            $product->holding_temperature = $_GET['holding_temperature'];
            $pr = 'holding_temperature';

            // update the holding_temperature
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ holding_temperature : ".$product->holding_temperature."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the holding_time field from parameter holding_time

        if(isset($_GET['holding_time']))
        {
            // Do something

            $product->holding_time = $_GET['holding_time'];
            $pr = 'holding_time';

            // update the holding_time
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ holding_time : ".$product->holding_time."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the keyboards field from parameter keyboards

        if(isset($_GET['keyboards']))
        {
            // Do something

            $product->keyboards = $_GET['keyboards'];
            $pr = 'keyboards';

            // update the keyboards
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ keyboards : ".$product->keyboards."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the leave_days field from parameter leave_days

        if(isset($_GET['leave_days']))
        {
            // Do something

            $product->leave_days = $_GET['leave_days'];
            $pr = 'leave_days';

            // update the leave_days
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ leave_days : ".$product->leave_days."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the temper_type field from parameter temper_type

        if(isset($_GET['temper_type']))
        {
            // Do something

            $product->temper_type = $_GET['temper_type'];
            $pr = 'temper_type';

            // update the temper_type
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ temper_type : ".$product->temper_type."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the time_zone field from parameter time_zone

        if(isset($_GET['time_zone']))
        {
            // Do something

            $product->time_zone = $_GET['time_zone'];
            $pr = 'time_zone';

            // update the time_zone
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ time_zone : ".$product->time_zone."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the holiday field from parameter holiday

        if(isset($_GET['holiday']))
        {
            // Do something

            $product->holiday = $_GET['holiday'];
            $pr = 'holiday';

            // update the holiday
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ holiday : ".$product->holiday."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the holiday_startime field from parameter holiday_startime

        if(isset($_GET['holiday_startime']))
        {
            // Do something

            $product->holiday_startime = $_GET['holiday_startime'];
            $pr = 'holiday_startime';

            // update the holiday_startime
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ holiday_startime : ".$product->holiday_startime."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the holiday_endtime field from parameter holiday_endtime

        if(isset($_GET['holiday_endtime']))
        {
            // Do something

            $product->holiday_endtime = $_GET['holiday_endtime'];
            $pr = 'holiday_endtime';

            // update the holiday_endtime
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ holiday_endtime : ".$product->holiday_endtime."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the standbys field from parameter standbys

        if(isset($_GET['standbys']))
        {
            // Do something

            $product->standbys = $_GET['standbys'];
            $pr = 'standbys';

            // update the standbys
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ standbys : ".$product->standbys."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the program_mode field from parameter program_mode

        if(isset($_GET['program_mode']))
        {
            // Do something

            $product->program_mode = $_GET['program_mode'];
            $pr = 'program_mode';

            // update the program_mode
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ program_mode : ".$product->program_mode."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the speed field from parameter speed

        if(isset($_GET['speed']))
        {
            // Do something

            $product->speed = $_GET['speed'];
            $pr = 'speed';

            // update the speed
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ speed : ".$product->speed."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the keyboards_pass field from parameter keyboards_pass

        if(isset($_GET['keyboards_pass']))
        {
            // Do something

            $product->keyboards_pass = $_GET['keyboards_pass'];
            $pr = 'keyboards_pass';

            // update the keyboards_pass
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ keyboards_pass : ".$product->keyboards_pass."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the optimized_startup field from parameter optimized_startup

        if(isset($_GET['optimized_startup']))
        {
            // Do something

            $product->optimized_startup = $_GET['optimized_startup'];
            $pr = 'optimized_startup';

            // update the optimized_startup
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ optimized_startup : ".$product->optimized_startup."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the online_type field from parameter online_type

        if(isset($_GET['online_type']))
        {
            // Do something

            $product->online_type = $_GET['online_type'];
            $pr = 'online_type';

            // update the online_type
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ online_type : ".$product->online_type."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // get the program_mode_con field from parameter program_mode_con

        if(isset($_GET['program_mode_con']))
        {
            // Do something

            $product->program_mode_con = $_GET['program_mode_con'];
            $pr = 'program_mode_con';

            // update the program_mode_con
            if($product->part_update($pr)){

                $products_arr["result"] = "succ";
                $products_arr["info"] = "{ program_mode_con : ".$product->program_mode_con."}";

                // set the response code - 200 ok

                http_response_code(200);

            } else {

                $products_arr["result"] = "error";
                $products_arr["info"] = null;

                // set the response code - 304 ok

                http_response_code(304);
                
            }

            echo json_encode($products_arr);

        }

        // // if there is no parameter in get url

        // $products_arr["result"] = "error";
        // $products_arr["info"] = null;
        // $products_arr["msg"] = "There is no parameter";

        // // set the response code - 204 ok

        // http_response_code(204);

        // echo json_encode($products_arr);


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