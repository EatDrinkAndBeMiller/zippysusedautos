<?php

    function get_all_makes() {
            global $db;
            $query = 'SELECT * FROM makes';
            $statement = $db->prepare($query);
            $statement->execute();
            $makes = $statement->fetchAll();
            $statement->closeCursor();

            return $makes;
        }

    function add_make($make) {
        global $db;
        $query = 'INSERT INTO makes (Make)
                    VALUES (:make)';
        $statement = $db->prepare($query);
        $statement->bindValue(':make', $make);
        $statement->execute();
        $statement->closeCursor();
    }

    function delete_make($makeID) {
        global $db;
        $query = 'DELETE FROM makes
                    WHERE make_id = :makeID';
        $statement = $db->prepare($query);
        $statement->bindValue(':makeID', $makeID);
        $statement->execute();
        $statement->closeCursor();
    }
