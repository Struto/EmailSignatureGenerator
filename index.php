<?php
if($_POST['submit']){
    $name = $_REQUEST['name'];
    $position = $_REQUEST['position'];
    $email =  $_REQUEST['email'];
    $skype =  $_REQUEST['skype'];
    $phone= $_REQUEST['phone'];
    $mobile =  $_REQUEST['mobile'];


    //if ($phone == ""){
    //    $phone = "4241 6160";
    //}

    $contactInformationRows = "";
    $emptyEndRows = 0;
    if(strlen($_REQUEST['email']) == 0){
        $emptyEndRows++;
    }else{
        //$contactInformationRows .= "<tr><td style=\"white-space:pre;\">E-mail:</td><td><a style=\"text-decoration: none; color: black;\" href=\"mailto:".$email."\">".$email."</a></td></tr>\n";
        $contactInformationRows .= "<a href=\"mailto:".$email."\" style=\"color:black!important;text-decoration:none!important;\">".$email."</a><br/>\n";
    }

    if(strlen($_REQUEST['skype']) == 0){
        $emptyEndRows++;
    }else{
        //$contactInformationRows .= "<tr><td style=\"white-space:pre;\">Skype:</td><td>".$skype."</td></tr>\n";
        $contactInformationRows .= "S: ".$skype."<br/>\n";
    }

    // If UK
    if ( (!empty($phone)) && (!empty($mobile)) ) {
        $contactInformationRows .= "T: ".$phone."<br/>\n";
        $contactInformationRows .= "P: ".$mobile."<br/>\n";
    } else {
        $emptyEndRows++;
    }

    //$contactInformationRows .= "<tr><td style=\"white-space:pre;\">Telefon:</td><td><a style=\"text-decoration: none; color: black;\" href=\"tel:".$tele."\">".$tele."</a></td></tr>\n";
    //$contactInformationRows .= "Phone: +" . $phone . "<br/>\n";

    $infoToPrint = "<br/>\n<br/>\n<div style=\"font-family:Arial!important; font-size: 12px;color: black;\">\n";
    $infoToPrint .= "Many thanks,<br/>\n<br/>\n";
    $infoToPrint .= "--" . "<br/>\n";
    $infoToPrint .= "<strong style=\"color:black !important;\">".$name."</strong><br/>\n";
    $infoToPrint .= $position."<br/>\n";
    $infoToPrint .= "Struto Limited.<br/>\n";
    $infoToPrint .= $contactInformationRows;
    $infoToPrint .= "Web: <a href=\"http://www.struto.co.uk\" style=\"color:black!important;\">www.struto.co.uk</a><br/>\n";
    $infoToPrint .= "<br/>Struto Ltd | Registered in England & Wales Number: 07587184\n";
    $infoToPrint .= "<br/>Registered Office: Groundfloor, 1-7 Station Road, Crawley, West Sussex, RH10 1HT\n";
    $infoToPrint .= "<br/>Vat Number :151507730.<br/>\n";
    $infoToPrint .= "<br/><a style=\"text-decoration:none !important;color:black !important;\" href=\"http://www.struto.co.uk/blog\">Sign up for our <span style=\"text-decoration:underline !important;\">fantastic newsletter</span> - click here!</a><br/>\n";

    $infoToPrint .= "</div>";
}
?>

<!-- HTML5 Baby -->
<!DOCTYPE html>
<html>
<head>
    <title>Struto Email Generator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <header>
        <img class="logo" src="//cdn2.hubspot.net/hub/165931/hubfs/Stefan_Webflow_Images/struto-logo-image.png?t=1449216526275&width=300" />
        <div class="inner-container">
            <h1>Email Signature Generator</h1>
            <p>Give us your details and we'll give you your brand.</p>
        </div>
    </header>

    <section>
        <div class="inner-container">

            <div class="generator-form-wrapper">
                <h1>Let's get rockin' already ;-)</h1>
                <!-- <p>Very easy stuff...</p>  -->
                <form method="post" action="" id="info">
                    <label for="name">Full Name </label>
                    <input type="text" id="name" name="name" placeholder="(e.g. John Smith)" value="<?=$name?>"/><br/>
                    <label for="position">Position </label>
                    <input type="text" id="position" name="position" placeholder="(e.g. Developer)" value="<?=$position?>"/><br/>
                    <label for="email">Email </label>
                    <input type="email" id="email" name="email" placeholder="(e.g. john@company.com)" value="<?=$email?>"/><br/>
                    <label for="skype">Skype ID</label>
                    <input type="text" id="skype" name="skype" placeholder="(e.g. BigAce)" value="<?=$skype?>"/><br/>
                    <!-- SA guys ignore -->
                    <p style="color:red; font-size:14px;">South Africa crew, please ignore the following fields.</p>
                    <label for="telephone">Telephone (International Format without '+')</label>
                    <input type="tel" id="telephone" name="telephone" placeholder="(e.g 27 21 556 2323)" value="<?=$phone?>"/><br/>
                    <label for="mobile">Mobile Number (International Format without '+')</label>
                    <input type="tel" id="mobile" name="mobile" placeholder="(e.g 27 21 556 2323)" value="<?=$mobile?>"/><br/>
                    <input type="submit" name="submit" value="Gimme My Signature"/>
                </form>
            </div>


            <?php
            if($_POST['submit']){
                echo "<br/>Copy and paste the output below in your mailclient of choice:<br/>";
                echo "<div id='copybox'";
                echo $infoToPrint;
                echo "</div>";
                echo "<br/>Alternatively copy the code below: <br/>";
                echo "<div id='copybox'>";
                echo "<xmp>".$infoToPrint."</xmp>";
                echo "</div>";
            }
            ?>

        </div>
    </section>


    <footer>
            <p>&copy; Struto <?php echo date('Y'); ?>. All rights reserved.</p>
    </footer>


</body>
</html>
