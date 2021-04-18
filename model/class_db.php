<?php
class ClassDB {
    public static function get_all_classes() {
        $db = Database::getDB();
        $query = 'SELECT * FROM classes';
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();

        return $classes;
    }

    public static function get_class_name($classID) {
        $db = Database::getDB();
        $query = 'SELECT * FROM classes WHERE class_id = :classID';
        $statement = $db->prepare($query);
        $statement->bindValue(':classID', $classID);
        $statement->execute();
        $class = $statement->fetch();
        $statement->closeCursor();
        $class_name = $class['Class'];
        return $class_name;
    }

    public static function add_class($className) {
        $db = Database::getDB();
        $query = 'INSERT INTO classes (Class)
                    VALUES (:className)';
        $statement = $db->prepare($query);
        $statement->bindValue(':className', $className);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function delete_class($classID) {
        $db = Database::getDB();
        $query = 'DELETE FROM classes
                    WHERE class_id = :classID';
        $statement = $db->prepare($query);
        $statement->bindValue(':classID', $classID);
        $statement->execute();
        $statement->closeCursor();
    }
}