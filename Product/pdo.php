<?php
        require_once 'pdo.php';
        require_once 'helper.php';

        $request = $_POST;
        $product = [
            'name' => $request['name'],
            'id' => $request['id'],
            'id_category' => $request['id_category'],
        ];

        update($product);
        redirectHome();
    ?><?php
    $DB_TYPE = 'mysql';
    $DB_HOST = 'localhost';
    $DB_NAME = 'crud_test';
    $USER = 'root';
    $PW = '';
    
    try {
        $connection = new PDO("$DB_TYPE:host=$DB_HOST;dbname=$DB_NAME", $USER, $PW);
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        die("Connection failed: " . $e->getMessage());
    }
    
    function prepareSQL($sql) {
        global $connection;
        return $connection->prepare($sql);
    }
    
    function all() {
        $sql = "SELECT * FROM products";
        $stmt = prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    function create($data) {
        $sql = "INSERT INTO products (name, id_category) VALUES (:name, :id_category)";
        $stmt = prepareSQL($sql);
        $stmt->execute($data);
    }
    
    function delete($data) {
        $sql = "DELETE FROM products where id = :id";
        $stmt = prepareSQL($sql);
        $stmt->execute($data);
    }
    
    function update($data) {
        $sql = "UPDATE products SET name = :name, id_category = :id_category WHERE id = :id";
        $stmt = prepareSQL($sql);
        $stmt->execute($data);
    }
    
    function findById($data) {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = prepareSQL($sql);
        $stmt->execute($data);
        return $stmt -> fetch();
    }
    
    function findCategoryNameByID($data) {
        $sql = "SELECT categories.name 
            FROM categories 
            JOIN products ON categories.id = products.id_category
            WHERE products.id = :product";
        $stmt = prepareSQL($sql);
        $stmt->execute($data);
        $result = $stmt->fetch();
        return $result['name'];
    }