<?php
class MakesDB{
    public static function get_all_makes() {
        $db = Database::getDB();
        $query = 'SELECT * FROM makes';
        $statement = $db->prepare($query);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();

        return $makes;
        }

    public static function get_make_name($makeID) {
        $db = Database::getDB();
        $query = 'SELECT * FROM makes WHERE make_id = :makeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeID', $makeID);
        $statement->execute();
        $make = $statement->fetch();
        $statement->closeCursor();
        $make_name = $make['Make'];
        return $make_name;
    }

    public static function add_make($make) {
        $db = Database::getDB();
        $query = 'INSERT INTO makes (Make)
                    VALUES (:make)';
        $statement = $db->prepare($query);
        $statement->bindValue(':make', $make);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function delete_make($makeID) {
        $db = Database::getDB();
        $query = 'DELETE FROM makes
                    WHERE make_id = :makeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeID', $makeID);
        $statement->execute();
        $statement->closeCursor();
    }
}