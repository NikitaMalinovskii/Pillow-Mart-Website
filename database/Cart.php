<?php

class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->connection)) return null;

        $this->db = $db;
    }

    // Insert item into cart
    public function insertIntoCart($params = null)
    {

        if ($params != null) {
            $_SESSION['cart'][] = $params['id'];
        }

        header('Location: ' . $_SERVER['PHP_SELF']);
    }

    // Get user id and insert it into cart table
    public function addToCart($itemId)
    {
        if (isset($itemId)) {

            // Get data from user
            $params = array(
                "id" => $itemId
            );

            // Insert data into cart
            $result = $this->insertIntoCart($params);

            if ($result) {
                header("Location: " . $_SERVER['PHP_SELF']);
            }
        }
    }

    public function calculateSubtotal($arr)
    {
        if (isset($arr)) {
            $sum = 0;

            foreach ($arr as $item) {
                $sum += floatval($item[0]);
            }
            
            return sprintf("%.2f", $sum);
        }
    }


}
