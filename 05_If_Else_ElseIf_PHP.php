<?php
    $a=0;
    if($a>=18){
        echo "You Can Drive";
    }
    elseif($a<0){
        echo "Invalid Age";
    }
    elseif($a<18 && $a>=10){
        echo "You can drive after 18";
    }
    else{
        echo "You can't think about drive because you are not greter than 10 also less than 18";
    }
?>
  