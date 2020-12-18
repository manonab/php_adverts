<!DOCTYPE html>
<html>
<title>
        DATABASE LOCAL
</title>
<header>
        <link rel="stylesheet" href="style.css">
</header>

<body>


<?php
//setting the parameters for the database connection
        $db = mysqli_connect('localhost', 'root', 'root', 'dasboard_ad');

//We are getting the slot in condition of the websiteID and fetch all 
//the informations that we got into a variable.
//         $slot_object_query = "SELECT * FROM date WHERE website_id=1";
//         $result = mysqli_query($db, $slot_object_query);
//         $data = mysqli_fetch_assoc($result);
//         $slot1 = $data['slot1'];
//         $slot2 = $data['slot2'];
//         $slot3 = $data['slot3'];
// //
//        $advert1 = getAdvert($db, $slot1);
//        $advert2 = getAdvert($db, $slot2);
//        $advert3 = getAdvert($db, $slot3);



//         function getAdvert($db, $id){
//                 $slot_object_query = "SELECT * FROM adverts WHERE id=$id";
//                 $result = mysqli_query($db, $slot_object_query);
//                 $advert = mysqli_fetch_assoc($result);
//                 return $advert;
//         }
        

//         $slot_object_query = "SELECT start, end FROM date WHERE website_id=1";
//         $result = mysqli_query($db, $slot_object_query);
//         $data = mysqli_fetch_assoc($result);
//         $startDate = $data['start'];
//         $endDate = $data['end'];
//         echo $startDate;
//         echo $endDate;


//setting the parameters for the database connection
$db = mysqli_connect('localhost', 'root', 'root', 'dasboard_ad');

if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
      }

        $slot_object_query = "SELECT * FROM date WHERE website_id=2 AND end IS NOT NULL ORDER BY end asc ";
        $result = mysqli_query($db, $slot_object_query);
        $data= mysqli_fetch_assoc($result);

        $slot_object_query = "SELECT * FROM date WHERE website_id=2 AND end IS NULL ";
        $result = mysqli_query($db, $slot_object_query);
        $info= mysqli_fetch_assoc($result);
      
      
      if ($data == true && $data['end'] == TRUE) {
              $advert1 = getAdvert($db, $data['slot1']);
              $advert2 = getAdvert($db, $data['slot2']);
              $advert3 = getAdvert($db, $data['slot3']);
      }else{
        if ($info == true) {
                $advert1 = getAdvert($db, $info['slot1']);
                $advert2 = getAdvert($db, $info['slot2']);
                $advert3 = getAdvert($db, $info['slot3']);
        }
        }

        $currentDate = date('Y-m-d');
	$sql = "DELETE FROM date WHERE end <= '$currentDate' AND website_id=2 AND end IS NOT NULL ";
	if (mysqli_query($db, $sql)) {
                echo " ";
              } else {
                echo "Error deleting record: " . mysqli_error($db);
              }
          
        function getAdvert($db, $id){
        $slot_object_query = "SELECT * FROM adverts WHERE id=$id";
        $result = mysqli_query($db, $slot_object_query);
        $advert = mysqli_fetch_assoc($result);
        return $advert;
}
?>

	<div class="flex-container-mobile">
				<div class="adverts">
					<span class="item1">
							<a class="advertLinks" href="<?=$advert1['website_link']?>" target="_blank"">
								<img class="adGifs" src="<?=$advert1['type_image']?>">
							</a>
					</span>
					<span class="item2">
							<a class="advertLinks" href="<?=$advert2['website_link']?>" target="_blank"">
								<img class="adGifs" src="<?=$advert2['type_image']?>">
							</a>
					</span>
					<span class="item3" >
							<a class="advertLinks" href="<?=$advert3['website_link']?>" target="_blank"">
								<img class="adGifs" src="<?=$advert3['type_image']?>">
							</a>
					</span>
				</div>
</body>
</html>
