<html>
    <body>
<form action="" method="POST">

Credit card number:<input type="text" name="number_entered" value='<?php if ($submitbutton) { echo "$number";} ?>'/> 

<?php 
if ($submitbutton)
{
if (validatecard($number) !== false)
{
echo "<green> $type detected. credit card number is valid</green>";
}
else
{
echo " <red>This credit card number is invalid</red>";
}
}
?>

<br><br>

<input type="submit" value="Submit" name="submitbutton"/>

</form>



<?php

$submitbutton= $_POST['submitbutton'];

$number= $_POST['number_entered'];

function validatecard($number)
 {
    global $type;

    $cardtype = array(
        "visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
        "mastercard" => "/^5[1-5][0-9]{14}$/",
        "amex"       => "/^3[47][0-9]{13}$/",
        "discover"   => "/^6(?:011|5[0-9]{2})[0-9]{12}$/",
    );

    if (preg_match($cardtype['visa'],$number))
    {
	$type= "visa";
        return 'visa';
	
    }
    else if (preg_match($cardtype['mastercard'],$number))
    {
	$type= "mastercard";
        return 'mastercard';
    }
    else if (preg_match($cardtype['amex'],$number))
    {
	$type= "amex";
        return 'amex';
	
    }
    else if (preg_match($cardtype['discover'],$number))
    {
	$type= "discover";
        return 'discover';
    }
    else
    {
        return false;
    } 
 }

validatecard($number);


?>
</body>
</html>