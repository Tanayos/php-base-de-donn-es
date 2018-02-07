<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

include "utility.php";

$db = connectDB("localhost", "base_test_1", "root", "root");
$users = getUsers();


if (isset($_GET["id"])) {
    $user = getUser($_GET["id"]);
    debug($user);
    # code...
}
if (isset($_POST["update_user"])) {
    updateUser();
    # code...
}
if (isset($_POST["delete_users"]) && isset($_POST["delete_user_id"]) && count($_POST["delete_user_id"]))  {
  deleteUser();
  header('Location : index.php');
}

if(isset($_POST["create_user"])){
    createUser();
    header('Location: index.php');
}

function createUser(){
    global $db;
    $sql= "INSERT INTO users(name, lastname, email, age)
        VALUES (:name, :lastname, :email, :age)";

    $statement = $db->prepare($sql);
    $statement->bindParam(":name", $_POST["name"], PDO::PARAM_STR);
    $statement->bindParam(":lastname", $_POST["lastname"], PDO::PARAM_STR);
    $statement->bindParam(":email", $_POST["email"], PDO::PARAM_STR);
    $statement->bindParam(":age", $_POST["age"], PDO::PARAM_STR);

    $res = $statement->execute();
    $msg_crud = ($res === true) ? "insertion ok" : "souci à l'insertion";

}
function deleteUser() {

    global $db;
    foreach ($_POST["delete_user_id"] as $id) {
        $sql = "DELETE FROM users WHERE id = $id";
         $exec = $db->query($sql);
         header("Location: index.php");
         debug($id);
    }

}

function getUser($id) {

    global $db;
    $sql = "SELECT * FROM users WHERE id = :id";
    $statement = $db->prepare($sql);
    $statement->bindParam(":id", $id, PDO::PARAM_INT);
    $check = $statement->execute();
    return $statement->fetch(PDO::FETCH_OBJ);
}
function getUsers() {

    global $db;
    $sql = "SELECT * FROM users";
    $exec = $db->query($sql);
    return $exec->fetchAll(PDO::FETCH_OBJ);

}
function updateUser() {

    global $db;

    $sql = "UPDATE users SET lastname = :lastname, name = :name, age = :age, email = :email WHERE id = :id";
    $age = $_POST["age"] !== "" ? (int)$_POST["age"] : null;
    $email = $_POST["email"] !== "" ? $_POST["email"] : null;
    $statement = $db->prepare($sql);
    $statement->bindParam(":id", $_POST["id"], PDO::PARAM_INT);
    $statement->bindParam(":lastname", $_POST["lastname"], PDO::PARAM_STR);
    $statement->bindParam(":name", $_POST["name"], PDO::PARAM_STR);
    $statement->bindParam(":email", $email, PDO::PARAM_STR);
    $statement->bindParam(":age", $age, PDO::PARAM_INT);
    $statement->execute();
    // var_dump($check);
    header("Location: index.php");

}


?>
