<?php

class Product
{
    private  $name;
    private $description;
    private $price;
    private $stock;
    private $image;

    public function __construct($name, $image, $price)
    {
        $this->name = $name;
        $this->description = self::lorem();
        $this->image = $image;
        $this->price = $price;
        $this->stock = rand(0, 50);
    }

    //genererar lorem ipsum för produktbeskrivningar
    public static function lorem()
    {
        $endpoint = "https://loripsum.net/api/1";
        return file_get_contents($endpoint);
    }

    //gör objekt till en associative array
    public function toArray()
    {
        $array = array(
            "name" => $this->name,
            "description" => $this->description,
            "image" => $this->image,
            "price" => $this->price,
            "stock" => $this->stock
        );
        return $array;
    }
}
