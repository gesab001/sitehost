<?php

for ($i=1; $i<=100; $i++){
  $threes = $i % 3;
  $fives = $i % 5;
  if ($threes==0 or $fives==0){
    if ($threes==0 and $fives==0){
      echo 'SiteHost' . PHP_EOL;   
    }
	else{
      if ($threes==0){
        echo 'Site' . PHP_EOL;
	  }
      if ($fives==0){
        echo 'Host' . PHP_EOL;
	  }		
	}
  }
  else{ 
    echo $i . PHP_EOL;
  }	
}
