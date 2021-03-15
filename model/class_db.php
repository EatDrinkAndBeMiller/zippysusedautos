<?php

    function get_all_classes() {
        global $db;
        $query = 'SELECT * FROM classes';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();

        return $classes;
    }

    function add_class($className) {
        global $db;
        $query = 'INSERT INTO classes (Class)
                    VALUES (:className)';
        $statement = $db->prepare($query);
        $statement->bindValue(':className', $className);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_class($classID) {
        global $db;
        $query = 'DELETE FROM classes
                    WHERE class_id = :classID';
        $statement = $db->prepare($query);
        $statement->bindValue(':classID', $classID);
        $statement->execute();
        $statement->closeCursor();
    }