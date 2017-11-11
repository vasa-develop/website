<br><br><br><br>
<?php
$string = "This,is,an,example,string";
/* Use tab and newline as tokenizing characters as well  */
$tok = strtok($string, ",");
//echo ($string);

while ($tok !== false) {
    echo "Word=$tok<br />";
    $tok = strtok(",");
}
?>
Terms of use.