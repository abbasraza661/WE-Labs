<?php

//This code is official written by Ali Mujtaba - F16SW92
    include("connection.php");
    //Calculate distance
    function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
          return 0;
        }
        else {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);
      
          if ($unit == "K") {
            return ($miles * 1.609344);
          } else if ($unit == "N") {
            return ($miles * 0.8684);
          } else {
            return $miles;
          }
        }
      }
    // Finding stores
   
    // $sql = "SELECT * FROM stores WHERE zip_code LIKE '%" . $_GET['zipCode'] ."%' ORDER BY zip_code ASC";
    // $sql_zipcodes = "SELECT * FROM zip_codes WHERE zip_code LIKE '%" . $_GET['zipCode'] ."%'";
    // $result1 = mysqli_query($conn, $sql) or die(mysqli_error($conn));   
    //This code is official written by Ali Mujtaba - F16SW92
   
    $sql1 = "SELECT stores.id, stores.store_name, stores.address1, stores.zip_code, stores.phone, zip_codes.zip, zip_codes.latitude, zip_codes.longitude
    FROM stores INNER JOIN zip_codes ON stores.zip_code=zip_codes.zip";
    // (((acos(sin((".$latitude."*pi()/180)) * sin((`Latitude`*pi()/180))+cos((".$latitude."*pi()/180)) * cos((`Latitude`*pi()/180)) * cos(((".$longitude."- `Longitude`)*pi()/180))))*180/pi())*60*1.1515) as distance FROM `MyTable` WHERE
    $res = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
    foreach ($res as $row1) {
      $latitude1 = $row1['latitude'];
      $longitude1 = $row1['longitude'];
      $sql = "SELECT zip, longitude, latitude,(((acos(sin((".$latitude1."*pi()/180)) * sin((`latitude`*pi()/180))+cos((".$latitude1."*pi()/180)) * cos((`latitude`*pi()/180)) * cos(((".$longitude1."- `longitude`)*pi()/180))))*180/pi())*60*1.1515) as distance 
      FROM zip_codes WHERE zip = '" . $_GET['zipCode'] ."' GROUP BY distance ASC";
      $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    foreach ($result as $row2) {
        $latitude2 = $row2['latitude'];
        $longitude2 = $row2['longitude'];    
        //$qry = "SELECT *,(((acos(sin((".$latitude1."*pi()/180)) * sin((`Latitude`*pi()/180))+cos((".$latitude1."*pi()/180)) * cos((`".$latitude2."`*pi()/180)) * cos(((".$longitude2- `longitude`)*pi()/180))))*180/pi())*60*1.1515) as distance 
        //FROM `zip_codes` ORDER BY distance ASC";
        //$qry = "SELECT *,(((acos(sin((".$latitude1."*pi()/180)) * sin((`latitude`*pi()/180))+cos((".$latitude1."*pi()/180)) * cos((`latitude`*pi()/180)) * cos(((".$longitude1."- `longitude`)*pi()/180))))*180/pi())*60*1.1515) as distance 
        // FROM `zip_codes` WHERE zip = '".$_GET['zipCode'] ."' ORDER BY distance ASC";
        // $distanceMiles = distance($latitude1, $longitude1, $latitude2, $longitude2, "M") . " Miles";
        // $distanceKM = distance($latitude1, $longitude1, $latitude2, $longitude2, "K") . " KM";
        // $distanceN = distance($latitude1, $longitude1, $latitude2, $longitude2, "N") . " NM";
        ?>       
        
        <h1><?php echo "Store Name: ".$row1['store_name']; ?></h1>
        <b><?php echo "Address: ".$row1['address1']; ?></b><br>
        <b><?php echo "Zip Code: ".$row1['zip_code']; ?></b><br>
        <b><?php echo "Phone: ".$row1['phone']; ?></b><br> 
        <!-- <b><?php echo $latitude1." ".$longitude1." ".$latitude2." ".$longitude2; ?></b><br>  -->
        <b><?php echo "(Approx distance in Miles: ".intval($row2['distance'])." )"; ?></b><br>
        
        <?php
    }


}
?>


