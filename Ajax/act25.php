<?php
if (isset($_REQUEST['addition'])){
    echo "Addition: ";
    echo $_REQUEST['number1'] + $_REQUEST['number2'];
}
if (isset($_REQUEST['subtract'])){
    echo "Subtract: ";
    echo $_REQUEST['number1'] - $_REQUEST['number2'];
}
if (isset($_REQUEST['product'])){
    echo "Product: ";
    echo $_REQUEST['number1'] * $_REQUEST['number2'];
}
if (isset($_REQUEST['division'])){
    echo "Division: ";
    echo $_REQUEST['number1'] / $_REQUEST['number2'];
}