<?php
class TypesDB{
    public static function get_all_types() {
        $db = Database::getDB();
        $query = 'SELECT * FROM types';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();

        return $types;
    }

    public static function get_type_name($typeID) {
        $db = Database::getDB();
        $query = 'SELECT * FROM types WHERE type_id = :typeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeID', $typeID);
        $statement->execute();
        $type = $statement->fetch();
        $statement->closeCursor();
        $type_name = $type['Type'];
        return $type_name;
    }

    public static function add_type($typeName) {
        $db = Database::getDB();
        $query = 'INSERT INTO types (Type)
                    VALUES (:typeName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeName', $typeName);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function delete_type($typeID) {
        $db = Database::getDB();
        $query = 'DELETE FROM types
                    WHERE type_id = :typeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeID', $typeID);
        $statement->execute();
        $statement->closeCursor();
    }
}