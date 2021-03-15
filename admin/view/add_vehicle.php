<?php include('header.php') ?>

<?=$action?>
<div class="row  justify-content-md-center">
    <div class="col-lg-6">
    <form action="." method="POST">
        <input type="hidden" name="action" value="add_a_vehicle">
        <fieldset >
            <legend> Add a Vehicle to Inventory</legend>
            <div class="mb-3">
                <label for="makeID" class="form-label"> Make:</label>
                <select class="form-select" name="makeID" aria-label="Default select example">
                    <?php foreach ($makes as $make) : ?>
                        <option value="<?=$make['make_id'] ?>"><?=$make['Make'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="typeID" class="form-label"> Type:</label>
                <select class="form-select" name="typeID" aria-label="Default select example">
                    <?php foreach ($types as $type) : ?>
                        <option value="<?=$type['type_id'] ?>"><?=$type['Type'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="classID" class="form-label"> Class:</label>
                <select class="form-select" name="classID" aria-label="Default select example">
                    <?php foreach ($classes as $class) : ?>
                        <option value="<?=$class['class_id'] ?>"><?=$class['Class'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Year:</label>
                <input type="number" name="year" class="form-control" id="year" required>
            </div>

            <div class="mb-3">
                <label for="model" class="form-label">Model:</label>
                <input type="text" name="model" maxlength="30" class="form-control" id="model" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" name="price" class="form-control" id="price" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>
    
<br><br>
<div  class="row justify-content-md-center">
    <div class="col col-md-4">
        <h5><a href=".">Return to Vehicle List</a></h5>
        <br>
        <!-- <p><a href=".?action=list_makes">View/Edit Makes</a></p> -->
        <form action="." method="POST" id="edit_makes">
        <input type="hidden" name="action" value="list_makes">
        <button class="btn btn-info">View & Edit Makes</button>
        </form>
        <!-- <p><a href=".?action=list_types">View/Edit Types</a></p> -->
        <form action="." method="POST" id="edit_types">
        <input type="hidden" name="action" value="list_types">
        <button class="btn btn-info">View & Edit Types</button>
        </form>
        <!-- <p><a href=".?action=list_class">View/Edit Classes</a></p> -->
        <form action="." method="POST" id="edit_classes">
        <input type="hidden" name="action" value="list_classes">
        <button class="btn btn-info">View & Edit Classes</button>
        </form>
    </div>
</div>


<?php include('footer.php')?>