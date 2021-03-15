<?php

    function get_all_vehicles_by_price() {
        global $db;
            $query = 'SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class, V.vehicleID
                        FROM vehicles V
                        JOIN types T on V.type_id = T.type_id
                        JOIN makes M on V.make_id = M.make_id
                        JOIN classes C on V.class_id = C.class_id
                        ORDER BY Price DESC';
            $statement = $db->prepare($query);
            $statement->execute();
            $vehicles = $statement->fetchAll();
            $statement->closeCursor();

        return $vehicles;
    }

    function get_all_vehicles_by_year() {
        global $db;
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class, V.vehicleID
                    FROM vehicles V
                    JOIN types T on V.type_id = T.type_id
                    JOIN makes M on V.make_id = M.make_id
                    JOIN classes C on V.class_id = C.class_id
                    ORDER BY Year DESC';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();

        return $vehicles;
    }

    function get_vehicles_by_make_price($makeID){
        global $db;
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class, V.vehicleID
                    FROM vehicles V
                    JOIN types T on V.type_id = T.type_id
                    JOIN makes M on V.make_id = M.make_id
                    JOIN classes C on V.class_id = C.class_id
                    WHERE M.make_id = :makeID 
                    ORDER BY Price DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeID', $makeID);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();

        return $vehicles;
    } 

    function get_vehicles_by_make_year($makeID){
        global $db;
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class, V.vehicleID
                    FROM vehicles V
                    JOIN types T on V.type_id = T.type_id
                    JOIN makes M on V.make_id = M.make_id
                    JOIN classes C on V.class_id = C.class_id
                    WHERE M.make_id = :makeID  
                    ORDER BY Year DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeID', $makeID);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();

        return $vehicles;
    } 

    function get_vehicles_by_type_price($typeID){
        global $db;
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class, V.vehicleID
                    FROM vehicles V
                    JOIN types T on V.type_id = T.type_id
                    JOIN makes M on V.make_id = M.make_id
                    JOIN classes C on V.class_id = C.class_id
                    WHERE T.type_id = :typeID 
                    ORDER BY Price DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeID', $typeID);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();

        return $vehicles;
    } 

    function get_vehicles_by_type_year($typeID){
        global $db;
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class, V.vehicleID
                    FROM vehicles V
                    JOIN types T on V.type_id = T.type_id
                    JOIN makes M on V.make_id = M.make_id
                    JOIN classes C on V.class_id = C.class_id
                    WHERE T.type_id = :typeID
                    ORDER BY Year DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeID', $typeID);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();

        return $vehicles;
    } 
    
    function get_vehicles_by_class_price($classID){
        global $db;
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class, V.vehicleID
                    FROM vehicles V
                    JOIN types T on V.type_id = T.type_id
                    JOIN makes M on V.make_id = M.make_id
                    JOIN classes C on V.class_id = C.class_id
                    WHERE C.class_id = :classID 
                    ORDER BY Price DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':classID', $classID);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();

        return $vehicles;
    } 

    function get_vehicles_by_class_year($classID){
        global $db;
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class, V.vehicleID
                    FROM vehicles V
                    JOIN types T on V.type_id = T.type_id
                    JOIN makes M on V.make_id = M.make_id
                    JOIN classes C on V.class_id = C.class_id
                    WHERE C.class_id = :classID 
                    ORDER BY Year DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':classID', $classID);
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