<?php

require 'config.php';

function db_connect()
{
    try {
        $connectionstr = 'mysql:host=' . DBHOST . ";dbname=" . DBNAME;
        $user = DBUSER;
        $pass = DBPASS;
        $pdo = new PDO($connectionstr, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function get_random_image() 
{
    $pdo = db_connect();

    try {
        $sql = 'SELECT filename FROM images ORDER BY RAND() LIMIT 1';
        $sql = $pdo->query($sql);
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function get_locations() {
    $pdo = db_connect();

    try {
        $sql = "SELECT DISTINCT location FROM images;";
        $sql = $pdo->query($sql);
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function get_first_images()
{
    $pdo = db_connect();

    try {
        $sql = 'SELECT * FROM images LIMIT 5';
        $sql = $pdo->query($sql);
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function load_images($offset, $contentCount)
{
    $pdo = db_connect();

    try {
        $sql = "SELECT * FROM images LIMIT $offset, $contentCount";
        $sql = $pdo->query($sql);
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function upload_image($name, $description, $source, $location)
{
    $pdo = db_connect();

    try {
        $sql = $pdo->prepare("INSERT INTO images (filename, description, source, location) VALUES (?, ?, ?, ?)");
        $sql->execute([$name, $description, $source, $location]);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function submit_feedback($name, $email, $message)
{
    $pdo = db_connect();

    try {
        $sql = $pdo->prepare("INSERT INTO contact_submissions (name, email, message) VALUES (?, ?, ?)");
        $sql->execute([$name, $email, $message]);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function get_content($id) 
{
    $pdo = db_connect();

    try {
        $sql = $pdo->prepare("SELECT * FROM images WHERE id = ?");
        $sql->execute([$id]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

?>