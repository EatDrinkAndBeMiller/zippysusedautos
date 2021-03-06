<?php include('header.php') ?>

<div class="row justify-content-md-center">
    <div class="col-lg-6">
    <form action="." method="POST">
        <input type="hidden" name="action" value="add_a_vehicle">
        <fieldset >
            <legend class="title-text text-center"> Add a Vehicle to Inventory</legend>
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
    </div>
</div>    

<br><br>
    <h5 class="text-center"><a href=".">Return to Vehicle List</a></h5>

<?php include('footer.php')?>