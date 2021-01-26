<?php

class Data
{
    public static $ENDPOINT = "http://localhost/eastcompany/API/API.php?";

    public static function main($limit)
    {
        try {
            $array = self::getData($limit);
            self::viewData($array);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }

    public static function getData($limit)
    {
        $json = @file_get_contents(self::$ENDPOINT.'limit='.$limit);
        if (!$json)
            throw new Exception("<h1>Ett fel har inträffat</h1>");

        return json_decode($json, true);
    }

    public static function viewData($array)
    {
        // check if the array is an error message and if so, return the error json as is

        if (array_key_exists("error",$array)){
            echo json_encode($array);
        }
        else {
        $output = "";
        foreach ($array as $key => $value) {
            $output .= "<div class='row product'><img class='thumbnail col' src='" . $value['image'] . "'>
            <div class='product-info col'>
            <p class='name'>" . $value['name'] . "</p>
            <p class='description'>" . $value['description'] . "</p>
            <p class='price'>$" . $value['price'] . "</p>";
            if($value['stock'] == 0){
                $output .= "<p class='stock' id='no-stock'>Finns ej i lager</p>";    
            } else{
                $output .= "<p class='stock'>" . $value['stock'] . "st finns i lager </p>";   
            }
            $output .= "</div></div>";
        }
        echo $output;
        }
    }
}
