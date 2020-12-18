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


//getting the date
$currentDate = date('Y-m-d');

//We are getting the slot in condition of the websiteID and fetch all 
//the informations that we got into a variable
        $slot_object_query = "SELECT * FROM date WHERE website_id=2 AND end IS NOT NULL ORDER BY end asc ";
        $result = mysqli_query($db, $slot_object_query);
        $data= mysqli_fetch_assoc($result);
        $slot1 = $data['slot1'];
        $slot2 = $data['slot2'];
        $slot3 = $data['slot3'];

        if ($data === TRUE) {
                $advert1 = getAdvert($db, $data['slot1']);
                $advert2 = getAdvert($db, $data['slot2']);
                $advert3 = getAdvert($db, $data['slot3']);
        }else{
                echo'je suis ici';
        }

        $slot_object_query = "SELECT * FROM date WHERE website_id=2 AND end IS NULL ";
        $result = mysqli_query($db, $slot_object_query);
        $data= mysqli_fetch_assoc($result);
        $slot1 = $data['slot1'];
        $slot2 = $data['slot2'];
        $slot3 = $data['slot3'];

        if (is_null($data) && $data != TRUE) {
                $advert1 = getAdvert($db, $data['slot1']);
                $advert2 = getAdvert($db, $data['slot2']);
                $advert3 = getAdvert($db, $data['slot3']);
        }

//making a function that pick what we want from the adverts table with the ID specify higher 
        function getAdvert($db, $id){
                $slot_object_query = "SELECT * FROM adverts WHERE id=$id";
                $result = mysqli_query($db, $slot_object_query);
                $advert = mysqli_fetch_assoc($result);
                return $advert;
        }

?>

<div class="main-content">
        <div>
                <p><?=$advert1['advert_title']?></p>
                <a href="<?=$advert1['website_link']?>" target="_blank"">
                <img src="<?=$advert1['type_image']?>">
                </a>
        </div>
        <div>
                <p><?=$advert2['advert_title']?></p>
                <a href="<?=$advert2['website_link']?>" target="_blank"">
                <img src="<?=$advert2['type_image']?>">
                </a>
        </div>
        <div>
                <p><?=$advert3['advert_title']?></p>
                <a href="<?=$advert3['website_link']?>" target="_blank"">
                <img src="<?=$advert3['type_image']?>">
                </a>
        </div>
</div>
</body>
</html>
