<?php
    //index
    //$sortBy = filter_input(INPUT_POST, 'sortBy', FILTER_SANITIZE_STRING);
/*     switch($action) {
        case 'list_by_trait':
            if ($makeID) {
                $vehicles = get_vehicles_by_make($makeID, $sortBy);
                $makes = get_all_makes();
                $types = get_all_types();
                $classes = get_all_classes();
            } else if ($typeID) {
                $vehicles = get_vehicles_by_type($typeID, $sortBy);
                $makes = get_all_makes();
                $types = get_all_types();
                $classes = get_all_classes();
            } else if ($classID) {
                $vehicles = get_vehicles_by_class($classID, $sortBy);
                $makes = get_all_makes();
                $types = get_all_types();
                $classes = get_all_classes();
            } else {  //if only year is selected
                $vehicles = get_all_vehicles($sortBy);
                $makes = get_all_makes();
                $types = get_all_types();
                $classes = get_all_classes();
            }
            include('view/vehicles_list.php');
            break; */


    function get_all_vehicles($sortBy) {
        global $db;
        if ($sortBy) {
            $query = "SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class
                        FROM vehicles V
                        JOIN types T on V.type_id = T.type_id
                        JOIN makes M on V.make_id = M.make_id
                        JOIN classes C on V.class_id = C.class_id
                        ORDER BY :sortBy DESC";
            $statement = $db->prepare($query);
            $statement->bindValue(':sortBy', $sortBy);
            $statement->execute();
            $vehicles = $statement->fetchAll();
            $statement->closeCursor();
        } else {
            $query = 'SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class
                        FROM vehicles V
                        JOIN types T on V.type_id = T.type_id
                        JOIN makes M on V.make_id = M.make_id
                        JOIN classes C on V.class_id = C.class_id
                        ORDER BY Price DESC';
            $statement = $db->prepare($query);
            $statement->execute();
            $vehicles = $statement->fetchAll();
            $statement->closeCursor();
        }
        return $vehicles;
    }

    function get_vehicles_by_make($makeID, $sortBy){
        global $db;
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class
                    FROM vehicles V
                    JOIN types T on V.type_id = T.type_id
                    JOIN makes M on V.make_id = M.make_id
                    JOIN classes C on V.class_id = C.class_id
                    WHERE M.make_id = :makeID 
                    ORDER BY :sortBy DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeID', $makeID);
        $statement->bindValue(':sortBy', $sortBy);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();

        return $vehicles;
    } 

    function get_vehicles_by_type($typeID, $sortBy){
        global $db;
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class
                    FROM vehicles V
                    JOIN types T on V.type_id = T.type_id
                    JOIN makes M on V.make_id = M.make_id
                    JOIN classes C on V.class_id = C.class_id
                    WHERE T.type_id = :typeID 
                    ORDER BY :sortBy DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeID', $typeID);
        $statement->bindValue(':sortBy', $sortBy);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();

        return $vehicles;
    }  
    
    function get_vehicles_by_class($classID, $sortBy){
        global $db;
        $query = 'SELECT V.Year, V.Model, V.Price, T.Type, M.Make, C.Class
                    FROM vehicles V
                    JOIN types T on V.type_id = T.type_id
                    JOIN makes M on V.make_id = M.make_id
                    JOIN classes C on V.class_id = C.class_id
                    WHERE C.class_id = :classID 
                    ORDER BY :sortBy DESC';
        $statement = $db->prepare($query);
        $statement->bindValue(':classID', $classID);
        $statement->bindValue(':sortBy', $sortBy);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();

        return $vehicles;
    } 