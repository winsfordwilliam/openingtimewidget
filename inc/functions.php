<?php

function callAll(){
    include('connection.php');
    try{
     $results = $db -> query("SELECT * FROM openingtime");
     return $results -> fetchAll(PDO::FETCH_ASSOC);
    }catch(Exception $e){
        echo "Unable to retrieve results";
        echo $e -> getMessage();
        exit;
    }
    
}
function getToday(){
    $today = strtolower(date("l"));
    return $today;
}
function openingTime(){
    $times = array();
    $today = getToday();
    include('connection.php');
    try{
        $opening = $db -> query("SELECT opening FROM openingtime WHERE day = '$today'");
        $closing = $db -> query("SELECT closing FROM openingtime WHERE day = '$today'");
    } catch(Exception $e){
        echo "Unfortunately, this process cannot be completed!";
        echo $e -> getMessage();
        exit;
    }
    $times[] = $opening -> fetchAll(PDO::FETCH_ASSOC);
    $times[] = $closing -> fetchAll(PDO::FETCH_ASSOC);
    return $times;
}

function displayOpening(){
    $currentTime = date("h:i");
    $times = openingTime();
    $opening = strtotime($times[0]['opening']);
    $closing = strtotime($times[1]['closing']);
    //open
    if($currentTime > $opening && $currentTime < $closing){
            return "Open";
    }else{
        return "Closed";
        }
    }