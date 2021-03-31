<?php

function get_all_vehicles($sortBy) {
    global $db;
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

    function add_a_vehicle($makeID, $typeID, $classID, $year, $model, $price){
        global $db;
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

    function delete_a_vehicle($vehicleID) {
        global $db;
        $query = 'DELETE FROM vehicles
                    WHERE vehicleID = :vehicleID';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicleID', $vehicleID);
        $statement->execute();
        $statement->closeCursor();
    }

        /* Don't need these anymore
        
        function get_vehicles_by_make($makeID){
        global $db;
        if ($sortBy == 'Year') {
            $orderBy = 'V.Year';
        } else {
            $orderBy = 'V.Price';
        }
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class
                FROM vehicles V
                JOIN types T on V.type_id = T.type_id
                JOIN makes M on V.make_id = M.make_id
                JOIN classes C on V.class_id = C.class_id
                WHERE M.make_id = :makeID 
                ORDER BY ' .$orderBy . ' DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeID', $makeID);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();

        return $vehicles;
    } 

    function get_vehicles_by_type($typeID){
        global $db;
        if ($sortBy == 'Year') {
            $orderBy = 'V.Year';
        } else {
            $orderBy = 'V.Price';
        }
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class
                FROM vehicles V
                JOIN types T on V.type_id = T.type_id
                JOIN makes M on V.make_id = M.make_id
                JOIN classes C on V.class_id = C.class_id
                 WHERE T.type_id = :typeID
                ORDER BY ' .$orderBy . ' DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeID', $typeID);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();

        return $vehicles;
    } 
    
    function get_vehicles_by_class($classID){
        global $db;
        if ($sortBy == 'Year') {
            $orderBy = 'V.Year';
        } else {
            $orderBy = 'V.Price';
        }
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class
                FROM vehicles V
                JOIN types T on V.type_id = T.type_id
                JOIN makes M on V.make_id = M.make_id
                JOIN classes C on V.class_id = C.class_id
                WHERE C.class_id = :classID
                ORDER BY ' .$orderBy . ' DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':classID', $classID);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();

        return $vehicles;
    } */