<?php
include '../config.php';
include_once '../models/User.php';
class UserC
{
    function outputUser()
    {
        $sql = "SELECT * FROM user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function deleteUser($userName)
    {
        $sql = "DELETE FROM user WHERE userName=:userName";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':userName', $userName);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function addUser($user)
    {
        $sql = "INSERT INTO user(FullName, UserName, Email)
    VALUES (:FullName, :UserName, :Email) ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'FullName' => $user->getFullName(),
                'UserName' => $user->getUserName(),
                'Email' => $user->getEmail()
            ]);
        } catch (Exception $e) {
            die('Erreur:' . $e->getMessage());
        }
    }

    function updateUser($user, $userName)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET
            FullName=:FullName,
            UserName=:UserName,
            Email=:Email
            WHERE userName'
            );
            $query->execute([
                'FullName' => $user->getFullName(),
                'UserName' => $user->getUserName(),
                'Email' => $user->getEmail()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
