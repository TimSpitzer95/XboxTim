<?php

include_once("alexa.php");
include_once("xboxon.php");

$Alexa = new Alexa();
$Xbox = new XboxOn();

$Alexa->setApplicationID("amzn1.ask.skill.183eef65-4dae-469d-b629-743da85da484");
$Alexa->setApplicationName("Xbox");

$Xbox->setIPAddress("192.168.178.60");
$Xbox->setXboxLiveID("FD00039A078E82DA");

if($Alexa->auth()) {
    if($Xbox->ping()) {
        $Alexa->setCard("Xbox is already on.");
        $Alexa->setReprompt("");
        $Alexa->setOutputSpeech("Your xbox has already been turned on.");
    }
    else {
        if($Xbox->switchOn()) {
            $Alexa->setCard("Xbox is now on.");
            $Alexa->setReprompt("");
            $Alexa->setOutputSpeech("Your xbox is now turned on.");
        }
        else {
            $Alexa->setCard("Xbox couldn't be turned on.");
            $Alexa->setReprompt("");
            $Alexa->setOutputSpeech("Your Xbox could not be turned on. Please try again.");
        }
    }
    
    $Alexa->displayOutput();
}

?>
