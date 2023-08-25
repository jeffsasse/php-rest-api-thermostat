<?php
class Product{
  
    // database connection and table name

    private $conn;
    private $table_name = "thermostats";
  
    // object properties

    public $mac_id;
    public $pattern;
    public $humidity;
    public $temperature;
    public $indoor_temperature;
    public $indoor_humidity;
    public $state;
    public $antifreeze;
    public $delay_time;
    public $temperature_difference;
    public $holding_temperature;
    public $holding_time;
    public $keyboards;
    public $leave_days;
    public $temper_type;
    public $time_zone;
    public $holiday;
    public $holiday_startime;
    public $holiday_endtime;
    public $standbys;
    public $program_mode;
    public $speed;
    public $keyboards_pass;
    public $optimized_startup;
    public $online_type;
    public $program_mode_con;
  
    // constructor with $db as database connection

    public function __construct($db){

        $this->conn = $db;
    }

    // read products

    function read(){
    
        // select one mac id query

        $query = "SELECT * FROM ".$this->table_name." WHERE mac_id= '".$this->mac_id."'";
    
        // prepare query statement

        $stmt = $this->conn->prepare($query);
    
        // execute query

        $stmt->execute();
    
        return $stmt;
    }

    // create product

    function create(){
    
        // query to insert record

        $query = "INSERT INTO " . $this->table_name . " SET mac_id=:mac_id, pattern=:pattern, humidity=:humidity, temperature=:temperature, indoor_temperature=:indoor_temperature,indoor_humidity=:indoor_humidity, state=:state,antifreeze=:antifreeze,delay_time=:delay_time,temperature_difference=:temperature_difference,holding_temperature=:holding_temperature,holding_time=:holding_time,keyboards=:keyboards,leave_days=:leave_days,temper_type=:temper_type,time_zone=:time_zone,holiday=:holiday,holiday_startime=:holiday_startime,holiday_endtime=:holiday_endtime,standbys=:standbys,program_mode=:program_mode,speed=:speed,keyboards_pass=:keyboards_pass,optimized_startup=:optimized_startup,online_type=:online_type,program_mode_con=:program_mode_con";
    
        // prepare query

        $stmt = $this->conn->prepare($query);
    
        // sanitize

        $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
        $this->pattern=htmlspecialchars(strip_tags($this->pattern));
        $this->humidity=htmlspecialchars(strip_tags($this->humidity));
        $this->temperature=htmlspecialchars(strip_tags($this->temperature));
        $this->indoor_temperature=htmlspecialchars(strip_tags($this->indoor_temperature));
        $this->indoor_humidity=htmlspecialchars(strip_tags($this->indoor_humidity));
        $this->state=htmlspecialchars(strip_tags($this->state));
        $this->antifreeze=htmlspecialchars(strip_tags($this->antifreeze));
        $this->delay_time=htmlspecialchars(strip_tags($this->delay_time));
        $this->temperature_difference=htmlspecialchars(strip_tags($this->temperature_difference));
        $this->holding_temperature=htmlspecialchars(strip_tags($this->holding_temperature));
        $this->holding_time=htmlspecialchars(strip_tags($this->holding_time));
        $this->keyboards=htmlspecialchars(strip_tags($this->keyboards));
        $this->leave_days=htmlspecialchars(strip_tags($this->leave_days));
        $this->temper_type=htmlspecialchars(strip_tags($this->temper_type));
        $this->time_zone=htmlspecialchars(strip_tags($this->time_zone));
        $this->holiday=htmlspecialchars(strip_tags($this->holiday));
        $this->holiday_startime=htmlspecialchars(strip_tags($this->holiday_startime));
        $this->holiday_endtime=htmlspecialchars(strip_tags($this->holiday_endtime));
        $this->standbys=htmlspecialchars(strip_tags($this->standbys));
        $this->program_mode=htmlspecialchars(strip_tags($this->program_mode));
        $this->speed=htmlspecialchars(strip_tags($this->speed));
        $this->keyboards_pass=htmlspecialchars(strip_tags($this->keyboards_pass));
        $this->optimized_startup=htmlspecialchars(strip_tags($this->optimized_startup));
        $this->online_type=htmlspecialchars(strip_tags($this->online_type));
        $this->program_mode_con=htmlspecialchars(strip_tags($this->program_mode_con));
    
        // bind values

        $stmt->bindValue(":mac_id", $this->mac_id);
        $stmt->bindValue(":pattern", $this->pattern);
        $stmt->bindValue(":humidity", $this->humidity);
        $stmt->bindValue(":temperature", $this->temperature);
        $stmt->bindValue(":indoor_temperature", $this->indoor_temperature);
        $stmt->bindValue(":indoor_humidity", $this->indoor_humidity);
        $stmt->bindValue(":state", $this->state);
        $stmt->bindValue(":antifreeze", $this->antifreeze);
        $stmt->bindValue(":delay_time", $this->delay_time);
        $stmt->bindValue(":temperature_difference", $this->temperature_difference);
        $stmt->bindValue(":holding_temperature", $this->holding_temperature);
        $stmt->bindValue(":holding_time", $this->holding_time);
        $stmt->bindValue(":keyboards", $this->keyboards);
        $stmt->bindValue(":leave_days", $this->leave_days);
        $stmt->bindValue(":temper_type", $this->temper_type);
        $stmt->bindValue(":time_zone", $this->time_zone);
        $stmt->bindValue(":holiday", $this->holiday);
        $stmt->bindValue(":holiday_startime", $this->holiday_startime);
        $stmt->bindValue(":holiday_endtime", $this->holiday_endtime);
        $stmt->bindValue(":standbys", $this->standbys);
        $stmt->bindValue(":program_mode", $this->program_mode);
        $stmt->bindValue(":speed", $this->speed);
        $stmt->bindValue(":keyboards_pass", $this->keyboards_pass);
        $stmt->bindValue(":optimized_startup", $this->optimized_startup);
        $stmt->bindValue(":online_type", $this->online_type);
        $stmt->bindValue(":program_mode_con", $this->program_mode_con);
    

        // execute query

        if($stmt->execute()){
            return $stmt;
        }
    
        return false;
        
    }

    // find product

    function find(){

        // count query based on mac id

        $query = "SELECT * FROM ".$this->table_name." WHERE mac_id= '".$this->mac_id."' LIMIT 1";
    
        // prepare query statement

        $stmt = $this->conn->prepare($query);
    
        // execute query

        $stmt->execute();
        // count lists

        $num = $stmt->rowCount();
    
        if($num>0){
            return true;
        } else {
            return false;
        }
    }

    // update the product

    function update(){

        // update query one list

        $query = "UPDATE ".$this->table_name." SET pattern=:pattern, humidity=:humidity, temperature=:temperature, indoor_temperature=:indoor_temperature,indoor_humidity=:indoor_humidity, state=:state,antifreeze=:antifreeze,delay_time=:delay_time,temperature_difference=:temperature_difference,holding_temperature=:holding_temperature,holding_time=:holding_time,keyboards=:keyboards,leave_days=:leave_days,temper_type=:temper_type,time_zone=:time_zone,holiday=:holiday,holiday_startime=:holiday_startime,holiday_endtime=:holiday_endtime,standbys=:standbys,program_mode=:program_mode,speed=:speed,keyboards_pass=:keyboards_pass,optimized_startup=:optimized_startup,online_type=:online_type,program_mode_con=:program_mode_con WHERE mac_id= '".$this->mac_id."'";

        // prepare query

        $stmt = $this->conn->prepare($query);
    
        // sanitize

        $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
        $this->pattern=htmlspecialchars(strip_tags($this->pattern));
        $this->humidity=htmlspecialchars(strip_tags($this->humidity));
        $this->temperature=htmlspecialchars(strip_tags($this->temperature));
        $this->indoor_temperature=htmlspecialchars(strip_tags($this->indoor_temperature));
        $this->indoor_humidity=htmlspecialchars(strip_tags($this->indoor_humidity));
        $this->state=htmlspecialchars(strip_tags($this->state));
        $this->antifreeze=htmlspecialchars(strip_tags($this->antifreeze));
        $this->delay_time=htmlspecialchars(strip_tags($this->delay_time));
        $this->temperature_difference=htmlspecialchars(strip_tags($this->temperature_difference));
        $this->holding_temperature=htmlspecialchars(strip_tags($this->holding_temperature));
        $this->holding_time=htmlspecialchars(strip_tags($this->holding_time));
        $this->keyboards=htmlspecialchars(strip_tags($this->keyboards));
        $this->leave_days=htmlspecialchars(strip_tags($this->leave_days));
        $this->temper_type=htmlspecialchars(strip_tags($this->temper_type));
        $this->time_zone=htmlspecialchars(strip_tags($this->time_zone));
        $this->holiday=htmlspecialchars(strip_tags($this->holiday));
        $this->holiday_startime=htmlspecialchars(strip_tags($this->holiday_startime));
        $this->holiday_endtime=htmlspecialchars(strip_tags($this->holiday_endtime));
        $this->standbys=htmlspecialchars(strip_tags($this->standbys));
        $this->program_mode=htmlspecialchars(strip_tags($this->program_mode));
        $this->speed=htmlspecialchars(strip_tags($this->speed));
        $this->keyboards_pass=htmlspecialchars(strip_tags($this->keyboards_pass));
        $this->optimized_startup=htmlspecialchars(strip_tags($this->optimized_startup));
        $this->online_type=htmlspecialchars(strip_tags($this->online_type));
        $this->program_mode_con=htmlspecialchars(strip_tags($this->program_mode_con));
    
        // bind values

        $stmt->bindValue(":pattern", $this->pattern);
        $stmt->bindValue(":humidity", $this->humidity);
        $stmt->bindValue(":temperature", $this->temperature);
        $stmt->bindValue(":indoor_temperature", $this->indoor_temperature);
        $stmt->bindValue(":indoor_humidity", $this->indoor_humidity);
        $stmt->bindValue(":state", $this->state);
        $stmt->bindValue(":antifreeze", $this->antifreeze);
        $stmt->bindValue(":delay_time", $this->delay_time);
        $stmt->bindValue(":temperature_difference", $this->temperature_difference);
        $stmt->bindValue(":holding_temperature", $this->holding_temperature);
        $stmt->bindValue(":holding_time", $this->holding_time);
        $stmt->bindValue(":keyboards", $this->keyboards);
        $stmt->bindValue(":leave_days", $this->leave_days);
        $stmt->bindValue(":temper_type", $this->temper_type);
        $stmt->bindValue(":time_zone", $this->time_zone);
        $stmt->bindValue(":holiday", $this->holiday);
        $stmt->bindValue(":holiday_startime", $this->holiday_startime);
        $stmt->bindValue(":holiday_endtime", $this->holiday_endtime);
        $stmt->bindValue(":standbys", $this->standbys);
        $stmt->bindValue(":program_mode", $this->program_mode);
        $stmt->bindValue(":speed", $this->speed);
        $stmt->bindValue(":keyboards_pass", $this->keyboards_pass);
        $stmt->bindValue(":optimized_startup", $this->optimized_startup);
        $stmt->bindValue(":online_type", $this->online_type);
        $stmt->bindValue(":program_mode_con", $this->program_mode_con);
    
        // execute query

        if($stmt->execute()){

            return true;
        }
    
        return false;
    }


    // update the one parameter

    function part_update($pr){

        // update query one parameter

        if($pr=='pattern'){

            $query = "UPDATE ".$this->table_name." SET pattern=:pattern WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->pattern=htmlspecialchars(strip_tags($this->pattern));

            $stmt->bindValue(":pattern", $this->pattern);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter humidity

        if($pr=='humidity'){

            $query = "UPDATE ".$this->table_name." SET humidity=:humidity WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->humidity=htmlspecialchars(strip_tags($this->humidity));

            $stmt->bindValue(":humidity", $this->humidity);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter temperature

        if($pr=='temperature'){

            $query = "UPDATE ".$this->table_name." SET temperature=:temperature WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->temperature=htmlspecialchars(strip_tags($this->temperature));

            $stmt->bindValue(":temperature", $this->temperature);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter indoor_temperature

        if($pr=='indoor_temperature'){

            $query = "UPDATE ".$this->table_name." SET indoor_temperature=:indoor_temperature WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->indoor_temperature=htmlspecialchars(strip_tags($this->indoor_temperature));

            $stmt->bindValue(":indoor_temperature", $this->indoor_temperature);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter indoor_humidity

        if($pr=='indoor_humidity'){

            $query = "UPDATE ".$this->table_name." SET indoor_humidity=:indoor_humidity WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->indoor_humidity=htmlspecialchars(strip_tags($this->indoor_humidity));

            $stmt->bindValue(":indoor_humidity", $this->indoor_humidity);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter state

        if($pr=='state'){

            $query = "UPDATE ".$this->table_name." SET state=:state WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->state=htmlspecialchars(strip_tags($this->state));

            $stmt->bindValue(":state", $this->state);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter antifreeze

        if($pr=='antifreeze'){

            $query = "UPDATE ".$this->table_name." SET antifreeze=:antifreeze WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->antifreeze=htmlspecialchars(strip_tags($this->antifreeze));

            $stmt->bindValue(":antifreeze", $this->antifreeze);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter delay_time

        if($pr=='delay_time'){

            $query = "UPDATE ".$this->table_name." SET delay_time=:delay_time WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->delay_time=htmlspecialchars(strip_tags($this->delay_time));

            $stmt->bindValue(":delay_time", $this->delay_time);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter temperature_difference

        if($pr=='temperature_difference'){

            $query = "UPDATE ".$this->table_name." SET temperature_difference=:temperature_difference WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->temperature_difference=htmlspecialchars(strip_tags($this->temperature_difference));

            $stmt->bindValue(":temperature_difference", $this->temperature_difference);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter holding_temperature

        if($pr=='holding_temperature'){

            $query = "UPDATE ".$this->table_name." SET holding_temperature=:holding_temperature WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->holding_temperature=htmlspecialchars(strip_tags($this->holding_temperature));

            $stmt->bindValue(":holding_temperature", $this->holding_temperature);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter holding_time

        if($pr=='holding_time'){

            $query = "UPDATE ".$this->table_name." SET holding_time=:holding_time WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->holding_time=htmlspecialchars(strip_tags($this->holding_time));

            $stmt->bindValue(":holding_time", $this->holding_time);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter keyboards

        if($pr=='keyboards'){

            $query = "UPDATE ".$this->table_name." SET keyboards=:keyboards WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->keyboards=htmlspecialchars(strip_tags($this->keyboards));

            $stmt->bindValue(":keyboards", $this->keyboards);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter leave_days

        if($pr=='leave_days'){

            $query = "UPDATE ".$this->table_name." SET leave_days=:leave_days WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->leave_days=htmlspecialchars(strip_tags($this->leave_days));

            $stmt->bindValue(":leave_days", $this->leave_days);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter temper_type

        if($pr=='temper_type'){

            $query = "UPDATE ".$this->table_name." SET temper_type=:temper_type WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->temper_type=htmlspecialchars(strip_tags($this->temper_type));

            $stmt->bindValue(":temper_type", $this->temper_type);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter time_zone

        if($pr=='time_zone'){

            $query = "UPDATE ".$this->table_name." SET time_zone=:time_zone WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->time_zone=htmlspecialchars(strip_tags($this->time_zone));

            $stmt->bindValue(":time_zone", $this->time_zone);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter holiday

        if($pr=='holiday'){

            $query = "UPDATE ".$this->table_name." SET holiday=:holiday WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->holiday=htmlspecialchars(strip_tags($this->holiday));

            $stmt->bindValue(":holiday", $this->holiday);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter holiday_startime

        if($pr=='holiday_startime'){

            $query = "UPDATE ".$this->table_name." SET holiday_startime=:holiday_startime WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->holiday_startime=htmlspecialchars(strip_tags($this->holiday_startime));

            $stmt->bindValue(":holiday_startime", $this->holiday_startime);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter holiday_endtime

        if($pr=='holiday_endtime'){

            $query = "UPDATE ".$this->table_name." SET holiday_endtime=:holiday_endtime WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->holiday_endtime=htmlspecialchars(strip_tags($this->holiday_endtime));

            $stmt->bindValue(":holiday_endtime", $this->holiday_endtime);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter standbys

        if($pr=='standbys'){

            $query = "UPDATE ".$this->table_name." SET standbys=:standbys WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->standbys=htmlspecialchars(strip_tags($this->standbys));

            $stmt->bindValue(":standbys", $this->standbys);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter program_mode

        if($pr=='program_mode'){

            $query = "UPDATE ".$this->table_name." SET program_mode=:program_mode WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->program_mode=htmlspecialchars(strip_tags($this->program_mode));

            $stmt->bindValue(":program_mode", $this->program_mode);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter speed

        if($pr=='speed'){

            $query = "UPDATE ".$this->table_name." SET speed=:speed WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->speed=htmlspecialchars(strip_tags($this->speed));

            $stmt->bindValue(":speed", $this->speed);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter keyboards_pass

        if($pr=='keyboards_pass'){

            $query = "UPDATE ".$this->table_name." SET keyboards_pass=:keyboards_pass WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->keyboards_pass=htmlspecialchars(strip_tags($this->keyboards_pass));

            $stmt->bindValue(":keyboards_pass", $this->keyboards_pass);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter optimized_startup

        if($pr=='optimized_startup'){

            $query = "UPDATE ".$this->table_name." SET optimized_startup=:optimized_startup WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->optimized_startup=htmlspecialchars(strip_tags($this->optimized_startup));

            $stmt->bindValue(":optimized_startup", $this->optimized_startup);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter online_type

        if($pr=='online_type'){

            $query = "UPDATE ".$this->table_name." SET online_type=:online_type WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->online_type=htmlspecialchars(strip_tags($this->online_type));

            $stmt->bindValue(":online_type", $this->online_type);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }

        // update query one parameter program_mode_con

        if($pr=='program_mode_con'){

            $query = "UPDATE ".$this->table_name." SET program_mode_con=:program_mode_con WHERE mac_id= '".$this->mac_id."'";

            // prepare query

            $stmt = $this->conn->prepare($query);

            $this->mac_id=htmlspecialchars(strip_tags($this->mac_id));
            $this->program_mode_con=htmlspecialchars(strip_tags($this->program_mode_con));

            $stmt->bindValue(":program_mode_con", $this->program_mode_con);

            // execute query

            if($stmt->execute()){

                return true;
            }
        
            return false;

        }
              
    }
}
?>