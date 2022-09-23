<?php



function rand_Pass($upper , $lower , $numeric , $other ){

    $password = "";

    for ($i=0; $i < $upper; $i++) { 

       $password .= chr(rand(65,90));

      
    }

    for ($i=0; $i < $lower; $i++) { 

        $password .= chr(rand(97,122));
 
       
     }

    for ($i=0; $i < $numeric; $i++) { 

        $password .= chr(rand(49,57));
 
       
     }

     for ($i=0; $i < $other; $i++) { 

        $password .= chr(rand(33,47));
 
       
     }

    

    return str_shuffle($password);
}

echo rand_Pass(2,2,2,3);



?>
