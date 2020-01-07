<?php
for ($i = 1; $i <= 100; $i++)
{
  if ( $i%3 == 0 && $i%5 == 0 )
   {
     echo $i . " StarStruck"."\n" ;
   }
  else if ( $i%3 == 0 ) 
   {
     echo $i. " Star"."\n";
   }
     else if ( $i%5 == 0 ) 
   {
     echo $i. " Struck"."\n";
   }
     else
   {
     echo $i."\n";
   }
 }
?>
