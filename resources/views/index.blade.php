<?php 

include '../resources/src/affiliates.php';
include '../resources/src/coordinates.php';
include '../resources/src/colletion.php';

//Open the file txt with the data.
$file = fopen("../resources/affiliates.txt", "r");

//Create the array with the data
$affiliates = new AffiliateCollection();

while(! feof($file)) {

    $data = json_decode(fgets($file), true);
    $homeCoordinates = new Coordinates($data['latitude'], $data['longitude']);
    $affiliates->addSortedById(new Affiliate($data['affiliate_id'], $data['name'], $homeCoordinates));
    
  }

 fclose($file);
  


 // Dublin office coordinates (location)
$officeCoordinates = new Coordinates(53.3340285, -6.2535495);

// Loop through each affiliate on array to check.


?>

<!DOCTYPE html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="{{ URL::asset('css/mystyle.css') }}">
<script src="{{ URL::asset('js/script.js') }}"></script>
<title>List Of Invitation</title>

</head>

<body>
<div id="my_logo"> 
	<img id ="pic" src="{{ URL::asset('image/gambling.png') }}"> 
</div> 


<p id="text">Gambling.com Groups Irish office, would like  to invite all Affiliates
  that lives within 100km of our Dublin office for some food and drinks. <br> 
Please find below the list of affiliates. </p> 


<table id="tablelist">
    <tr><th>Id</th>
    <th>Contact</th> 
    <th>Check Invitation</th></tr>
    
 <?php

foreach ($affiliates->affiliates() as $affiliate) {
    // Show  Affiliates in less than 100 km.
    if ($officeCoordinates->distance($affiliate->homeCoordinates()) < 100) {
 // echo $affiliate->id() . ' ' . $affiliate->name() . "<br>";
       echo   "<tr>
               <td>".$affiliate->id()."</td>
               <td id='teste".$affiliate->id()."'>".$affiliate->name()."</td>
               <td><button id='teste' value='teste' onclick='basicPopup(".$affiliate->id().");'>See Invitation</button></td>
               </tr> ";
    }
}

?>
 
</table>
</body>
</html>
