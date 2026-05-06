<?php

    $daysOfWeek=["Lundi",
                 "Mardi",
                 "Mercredi",
                 "Jeudi",
                 "Vendredi",
                 "Samedi",
                 "Dimanche",
                ];

    $data1 = "first_name";
    $data2 = "last_name";
    $data3 = "age";
    $data4 = "diplome";    

    $addData = [  "data1" => $data1,
                  "data2" => $data2,
                  "data3" => $data3,
                  "data4" => $data4                      
                ]; 

    $arrayData=[];
    array_push($arrayData,$daysOfWeek);  
    array_push($arrayData,$addData);  

    print_r(json_encode($arrayData));    

    
