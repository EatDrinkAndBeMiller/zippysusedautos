<?php
class VehiclesDB{
    public static function get_all_vehicles($sortBy) {
        $db = Database::getDB();
        if ($sortBy == 'Year') {
            $orderBy = 'V.Year';
        } else {
            $orderBy = 'V.Price';
        }
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class, V.vehicleID 
                    FROM vehicles V
                    JOIN types T on V.type_id = T.type_id
                    JOIN makes M on V.make_id = M.make_id
                    JOIN classes C on V.class_id = C.class_id
                    ORDER BY ' .$orderBy . ' DESC';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();

        return $vehicles;
        }

    public static function add_a_vehicle($makeID, $typeID, $classID, $year, $model, $price){
        $db = Database::getDB();
        $query = 'INSERT INTO vehicles (make_id, type_id, class_id, Price, Model, Year)
                    VALUES (:makeID, :typeID, :classID, :price, :model, :year)';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeID', $makeID);
        $statement->bindValue(':typeID', $typeID);
        $statement->bindValue(':classID', $classID);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':price', $price);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function delete_a_vehicle($vehicleID) {
        $db = Database::getDB();
        $query = 'DELETE FROM vehicles
                    WHERE vehicleID = :vehicleID';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicleID', $vehicleID);
        $statement->execute();
        $statement->closeCursor();
    }
}