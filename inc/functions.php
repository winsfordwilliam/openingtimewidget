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
    $currentTime = date('h:i');
    $times = openingTime();
    //open
    if(empty($times['opening'])||empty($times['closing'])){
        return 'Closed';
    }
    if($currentTime > $times['opening'] && $currentTime < $times['closing']){
        if($currentTime< $times['closing'] && date('h:i', '-10 minutes')< $times['closing']){
            return "Closing Soon";
        }else{
            return "Open";
        }
    }else{
        if($currentTime< $times['opening'] && date('h:i', '-10 minutes')< $times['opeing']){
            return "Opening Soon";
        }else{
        return "Closed";
        }
    }
}