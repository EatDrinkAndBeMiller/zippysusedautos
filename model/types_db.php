<?php

    function get_all_types() {
        global $db;
        $query = 'SELECT * FROM types';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();

        return $types;
    }

    function add_type($typeName) {
        global $db;
        $query = 'INSERT INTO types (Type)
                    VALUES (:typeName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeName', $typeName);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_type($typeID) {
        global $db;
        $query = 'DELETE FROM types
                    WHERE type_id = :typeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeID', $typeID);
        $statement->execute();
        $statement->closeCursor();
    }
