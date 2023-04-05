<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://api.astrosage.com/v1/horoscope/YOUR_API_KEY/daily/Taurus";
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Weather Hub</title>
  </head>

  <body>
  
  <?php include ('header.php'); ?>

  <?php include ('nav.php'); ?>

    <h1> Today's Horoscope for you, John.</h1>

    <?php

    $sign = "";
    $day = date('l');

    // Function to get the astrological sign based on birthdate
    function getAstroSign($dob) 
    {
        list($year, $month, $day) = explode('-', $dob);
        $signs = array(
            'Capricorn' => '12-22 to 01-19',
            'Aquarius' => '01-20 to 02-18',
            'Pisces' => '02-19 to 03-20',
            'Aries' => '03-21 to 04-19',
            'Taurus' => '04-20 to 05-20',
            'Gemini' => '05-21 to 06-20',
            'Cancer' => '06-21 to 07-22',
            'Leo' => '07-23 to 08-22',
            'Virgo' => '08-23 to 09-22',
            'Libra' => '09-23 to 10-22',
            'Scorpio' => '10-23 to 11-21',
            'Sagittarius' => '11-22 to 12-21'
        );
        $sign = '';
        foreach ($signs as $zodiac => $date) 
        {
            list($start, $end) = explode(' to ', $date);
            if (($month == 12 && $day >= $start) || ($month == 1 && $day <= $end) || ($month > 1 && $month < 12 && ($month * 100 + $day >= $start) && ($month * 100 + $day <= $end))) 
            {
                $sign = $zodiac;
                break;
            }
        }
        return $sign;
    }

    // Set the astrological sign based on user's birthdate
    $sign = getAstroSign('1995-04-16');

    // Call the aztro API
    function aztro($sign, $day) 
    {
        $aztro = curl_init('https://aztro.sameerkumar.website/?sign='.$sign.'&day='.$day);
        curl_setopt_array($aztro, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            )
        ));
        $response = curl_exec($aztro);
        if($response === FALSE){
            die(curl_error($aztro));
        }
        $responseData = json_decode($response, TRUE);
        return $responseData;
    }

    $ObjData = aztro($sign, $day);
    echo $ObjData['description'];

?>
    
    <script src="horoscopes.js"></script>
    <?php include ('footer.php'); ?>
  </body>
</
