<?php include('header.php') ?>

<?=$action?>
<div class="row">
    <div class="col-lg-6">
    <section id="list" class="list">

        <form action="." method="post" id="listing" class="listing">
            <input type="hidden" name="action" value="list_by_trait">
        
        <!--select a specfic make to list-->
            <select name="makeID">
                <option value="0">View All Makes</option>
                <?php foreach ($makes as $make) : ?>
                <?php if ($makeID == $make['make_id']) { ?>
                    <option value="<?=$make['make_id'] ?>" selected>
                <?php } else { ?>
                    <option value="<?=$make['make_id'] ?>">
                <?php } ?>
                    <?=$make['Make'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

        <!--listing specific type-->
            <select name="typeID">
            <!-- <input type="hidden" name="selection" value="list_by_type"> -->
                <option value="0">View All Types</option>

                <?php foreach ($types as $type) : ?>
                <?php if ($typeID == $type['type_id']) { ?>
                    <option value="<?=$type['type_id'] ?>" selected>
                <?php } else { ?>
                    <option value="<?=$type['type_id'] ?>">
                <?php } ?>
                    <?=$type['Type'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!--listing specific class-->
            <select name="classID">
            <!-- <input type="hidden" name="selection" value="list_by_class"> -->
                <option value="0">View All Classes</option>

                <?php foreach ($classes as $class) : ?>
                <?php if ($classID == $class['class_id']) { ?>
                    <option value="<?=$class['class_id'] ?>" selected>
                <?php } else { ?>
                    <option value="<?=$class['class_id'] ?>">
                <?php } ?>
                    <?=$class['Class'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <br><br>
            <h6>Sort By:</h6>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sortBy" value="Price" id="Price" checked>
                <label class="form-check-label" for="Price">
                    Price
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sortBy" value="Year" id="Year">
                <label class="form-check-label" for="Year">
                    Year
                </label>
            </div>
            <button class="btn btn-primary">Search</button>
        </form>
    </section>
    </div>

    <div class="col-lg-6">
        <section>
            <!-- <p><a href=".?action=list_for_add_a_vehicle">Add a Vehicle</a></p> -->
            <form action="." method="POST" id="list_for_add_a_vehicle">
            <input type="hidden" name="action" value="list_for_add_a_vehicle">
            <button type="submit" class="btn btn-info">Add a Vehicle</button>
            </form> 
            <!-- <p><a href=".?action=list_makes">View/Edit Makes</a></p> -->
            <form action="." method="GET">
                <button class="btn btn-info" name="action" value="list_makes">View/Edit Makes</button>
            </form>
            <!-- <p><a href=".?action=list_types">View/Edit Types</a></p> -->
            <form action="." method="POST">
            <input type="hidden" name="action" value="list_types">
            <button class="btn btn-info">View/Edit Types</button>
            </form>
            <!-- <p><a href=".?action=list_class">View/Edit Classes</a></p> -->
            <form action="." method="POST">
            <input type="hidden" name="action" value="list_classes">
            <button class="btn btn-info">View/Edit Class</button>
            </form>
        </section>
    </div>
</div>

<!--table of results-->
<table class="table table-striped table-hover">
    <thead>
        <tr>
        <th scope="col">Year</th>
        <th scope="col">Make</th>
        <th scope="col">Model</th>
        <th scope="col">Type</th>
        <th scope="col">Class</th>
        <th scope="col">Price</th>
        <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($vehicles as $vehicle) :
            $year = $vehicle['Year'];
            $model = $vehicle['Model'];
            $price = $vehicle['Price'];
            $type = $vehicle['Type'];
            $make = $vehicle['Make'];
            $class = $vehicle['Class'];
            $vehicleID = $vehicle['vehicleID'];
            ?>
        <tr>
        <td><?=$year?></td>
        <td><?=$make?></td>
        <td><?=$model?></td>
        <td><?=$type?></td>
        <td><?=$class?></td>
        <td>$<?=$price?></td>
        <td>
            <form action="." method="POST">
                <input type="hidden" name="action" value="delete_vehicle">
                <input type="hidden" name="vehicleID" value="<?=$vehicleID;?>">
                <button class="btn btn-danger">Delete</button>
            </form>
        </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include('footer.php')?>