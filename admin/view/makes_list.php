<?php include('header.php') ?>

<br>
<h4 class="text-center">Removing Vehicle Makes</h4>
<br>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-md-3">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Make</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($makes as $make) : ?>
                        <tr>
                        <td><?=$make['Make']?></td>
                        <td  class="text-end"><form action="." method="POST">
                            <input type="hidden" name="action" value="delete_make">
                            <input type="hidden" name="makeID" value="<?=$make['make_id'];?>">
                            <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br>

<h4 class="text-center">Add a Vehicle Make</h4>
<div  class="row justify-content-md-center">
    <div class="col col-md-4">
        <form action="." method="POST">
            <input type="hidden" name="action" value="add_make">
            <label for="make">Make: &nbsp; &nbsp;</label>
            <input type="text" id="make" max="30" name="make" required> &nbsp; &nbsp;
            <button class="btn btn-primary">Add Make</button>
        </form>
    </div>
</div>

<br><br>
<div  class="row justify-content-md-center">
    <div class="col col-md-4">
        <h5><a href=".">Return to Vehicle List</a></h5>
        <br>
            <!-- <p><a href=".?action=list_for_add_a_vehicle">Add a Vehicle</a></p> -->
            <form action="." method="POST" id="list_for_add_a_vehicle">
            <input type="hidden" name="action" value="list_for_add_a_vehicle">
            <button class="btn btn-info">Add a Vehicle</button>
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