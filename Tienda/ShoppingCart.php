<?php
require_once "DBController.php";

class ShoppingCart extends DBController
{

    function getAllProduct()
    {
        $query = "SELECT * FROM product";
        
        $productResult = $this->getDBResult($query);
        return $productResult;
    }

    function getMemberCartItem($member_id)
    {
        $query = "SELECT product.*, tbl_cart.id as cart_id,tbl_cart.quantity FROM product, tbl_cart WHERE 
            product.id = tbl_cart.product_id AND tbl_cart.member_id = ?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $member_id
            )
        );
        
        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }

    function getProductByCode($product_code)
    {
        $query = "SELECT * FROM product WHERE code=?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $product_code
            )
        );
        
        $productResult = $this->getDBResult($query, $params);
        return $productResult;
    }

    function getCartItemByProduct($product_id, $member_id)
    {
        $query = "SELECT * FROM tbl_cart WHERE product_id = ? AND member_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "s",
                "param_value" => $member_id
            )
        );
        
        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }

    function addToCart($product_id, $quantity, $member_id)
    {
        $query = "INSERT INTO tbl_cart (product_id,quantity,member_id) VALUES (?, ?, ?)";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "s",
                "param_value" => $member_id
            )
        );
        
        $this->updateDB($query, $params);
    }

    function updateCartQuantity($quantity, $cart_id)
    {
        $query = "UPDATE tbl_cart SET  quantity = ? WHERE id= ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );
        
        $this->updateDB($query, $params);
    }
    // borra un elemento del carrito de compras
    function deleteCartItem($cart_id)
    {
        // query para borrar el item de la BD
        $query = "DELETE FROM tbl_cart WHERE id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );
        
        $this->updateDB($query, $params);
    }

    function emptyCart($member_id)
    {
        $query = "DELETE FROM tbl_cart WHERE member_id = ?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $member_id
            )
        );
        
        $this->updateDB($query, $params);
    }
    // Agregar un item a tabla de compras
    function addToSold($product_id, $name, $quantity, $costo, $member_id,$DateAndTime)
    {
        // Query para insertar datos en la BD
        $query = "INSERT INTO tbl_sold (product_id, name, quantity, costo, member_id, date) VALUES (?, ?, ?, ?, ?, ?)";
        // Array de propiedades y parametros esperados
        $params = array(
            // id del producto
            array(
                "param_type" => "s",
                "param_value" => $product_id
            ),
            // nombre del producto
            array(
                "param_type" => "s",
                "param_value" => $name
            ),
            // cantidad
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            // Costo del producto
            array(
                "param_type" => "d",
                "param_value" => $costo
            ),
            // usuario
            array(
                "param_type" => "s",
                "param_value" => $member_id
            ),
            // Fecha de compra
            array(
                "param_type" => "s",
                "param_value" => $DateAndTime
            )
        );
        // Actualizamos la tabla en la BD
        $this->updateDB($query, $params);
    }
}
