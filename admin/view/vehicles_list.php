<?php include('header.php') ?>

<div class="row  justify-content-md-center">
    <div class="col-lg-6">
    <section id="list" class="list">

        <form action="." method="post" id="listing" class="listing">
            <input type="hidden" name="action" value="list_vehicles">
        
        <!--select a specfic make to list-->
        <div class="mb-3">
            <select name="makeID" class="form-select" aria-label="Default select example">
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
        </div>

        <!--listing specific type-->
        <div class="mb-3">
            <select name="typeID" class="form-select" aria-label="Default select example">
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
        </div>
            <!--listing specific class-->
        <div class="mb-3">
            <select name="classID" class="form-select" aria-label="Default select example">
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
        </div>

            <br>
        <div class="d-flex">
            <h6>Sort By:</h6> &nbsp; &nbsp;
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sortBy" value="Price" id="Price" checked>
                <label class="form-check-label" for="Price">
                    Price
                </label>
            </div> &nbsp; &nbsp;
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sortBy" value="Year" id="Year">
                <label class="form-check-label" for="Year">
                    Year
                </label>
            </div> &nbsp; &nbsp;
            <button class="btn btn-primary">Search</button>
        </div>
        </form>
    </section>
    </div>
</div><br>

<!--table of results-->
<div class="table-responsive">
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
</div>

<?php include('footer.php')?>