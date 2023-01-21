<?php

$server = 'localhost';

$username = 'root';

$password = '';

$database = 'scandiweb';

$conn = new mysqli($server,$username,$password,$database);

# Polymorphism portrays an example in object-oriented programming where methods in various classes that 

# do similar things should have a similar name. 

# Polymorphism allows objects of different classes to respond differently based on the same message.

# A primary uniquely identifies a record

# A foreign key is a primary key of another table

abstract class Products{

    private $id;

    private $sku;

    private $name;

    private $price;

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function get_id(): string
    {
        return $this->id;
    }

    public function set_sku($sku)
    {
        $this->sku = $sku;
    }

    public function get_sku(): string
    {
        return $this->sku;
    }

    public function set_name($name)
    {
        $this->name = $name;
    }

    public function get_name(): string
    {
        return $this->name;
    }

    public function set_price($sku)
    {
        $this->price = $sku;
    }

    public function get_price(): string
    {
        return $this->price;
    }

    public static function get_products(){

        global $conn;

        $SQL = "SELECT * FROM product";

        $result = $conn->query($SQL);

        if($result->num_rows > 0){

                $count = 0;

                $data = array();

                while($row = $result->fetch_assoc()) { // we are reading the result1 as a associative array according to column name

                    $data[$count]['main'] = $row;  // muti dimensional array with a main (u can call it any name) variable. 
                    
                    #used  by data count main to recover from product table
    
                    $SQL2 = "SELECT * FROM ".$row['type']." WHERE Product_ID  = '".$row['Product_ID']."'";
    
                    $result2 = $conn->query($SQL2);
    
                    while($row2 = $result2->fetch_assoc()) {
    
                        $data[$count]['special'] = $row2; // data array for special tables (types)
    
                        break;
    
                    }
    
    
                    $count++;
    
                }
    
                return $data;
    
            }
    
            else{
    
              return null;
    
            }
            
            }


        


    
    
    
    
    
    

        }






    





class Book extends Products{

    

    private $weight;

    

    public function set_weight($weight)
    {
        $this->weight = $weight;
    }

    function get_weight() : string
    {
        return $this->weight;
    }

    public function add_product(): string
    {
         global $conn;

         $SQL1 = "INSERT INTO product (Product_ID , sku , name , price , type) VALUES ('". $this->get_id() ."' , '". $this->get_sku() ."' ,

            '".$this->get_name()."', '".$this->get_price()."' , 'books' 

         )";

         $SQL2 = "INSERT INTO books (Product_ID , weight) VALUES ('". $this->get_id() ."' , '". $this->get_weight() ."')";

         if($conn->query($SQL1) && $conn->query($SQL2))
         {
            header('Location: /index.php');
         }
         else
         {
            return false;
         }
    }

   



}

class DVD extends Products{

    

    private $size;

    
    public function set_size($size)
    {
        $this->size = $size;
    }

    function get_size() : string
    {
        return $this->size;
    }

    public function add_product(): string
    {
         global $conn;

         $SQL1 = "INSERT INTO product (Product_ID , sku , name , price , type) VALUES ('". $this->get_id() ."' , '". $this->get_sku() ."' ,

            '".$this->get_name()."', '".$this->get_price()."' , 'dvds' 

         )";

         $SQL2 = "INSERT INTO dvds (Product_ID , size) VALUES ('". $this->get_id() ."' , '". $this->get_size() ."')";

         if($conn->query($SQL1) && $conn->query($SQL2))
         {
            header('Location: /index.php');
         }
         else
         {
            return false;
         }
    }

   



}



class FURNITURE extends Products{

    

    private $width;

    private $height;

    private $length;

    
    public function set_width($width)
    {
        $this->width = $width;
    }

    function get_width() : string
    {
        return $this->width;
    }

    public function set_height($height)
    {
        $this->height = $height;
    }

    function get_height() : string
    {
        return $this->height;
    }

    public function set_length($length)
    {
        $this->length = $length;
    }

    function get_length() : string
    {
        return $this->length;
    }

    public function add_product(): string
    {
         global $conn;

         $SQL1 = "INSERT INTO product (Product_ID , sku , name , price , type) VALUES ('". $this->get_id() ."' , '". $this->get_sku() ."' ,

            '".$this->get_name()."', '".$this->get_price()."' , 'furniture' 

         )";

         $SQL2 = "INSERT INTO furniture (Product_ID , width, length , height) VALUES ('". $this->get_id() ."' , '". $this->get_width() ."' , '". $this->get_length() ."' , '". $this->get_height() ."')";

         if($conn->query($SQL1) && $conn->query($SQL2))
         {
            header('Location: /index.php');
         }
         else
         {
            return false;
         }
    }

   



}



















?>