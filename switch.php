<?php

   $greetings = "24";

    switch ($greetings) {
        case ($greetings >= 0 && $greetings <= 11):
            echo "Good Morning Anjali...!";
            break;
            case ($greetings >= 11 && $greetings <= 12):
                echo "Good Noon Anjali...!";
                break;
                case ($greetings >= 17 && $greetings <= 23):
                    echo "Good Evening Anjali...!";
                    break;
                    case ($greetings >= 24):
                        echo "Good Night Anjali...!";
                        break;
        default:
            # code...
            break;
    }

    // switch($greetings )
    // {
    //     case ($greetings>=12):
    //         echo "Good Morning to all";
    //         break;


    //     case ($greetings>=5) :
    //         echo "good afternoon";
    //         break;

    //     case ($greetings>=7) :
    //         echo "good evening";
    //         break;

    //     case ($greetings==12) :
    //         echo "good nignt";
    //         break;
    //     default:    
    //             echo "have a greate day";
    //             break;
            
        

    // }


?>