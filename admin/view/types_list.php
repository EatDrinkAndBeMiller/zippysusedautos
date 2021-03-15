<?php include('header.php') ?>

<br>
<h4 class="text-center">Removing Vehicle Types</h4>
<br>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-md-3">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Type</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($types as $type) : ?>
                        <tr>
                        <td><?=$type['Type']?></td>
                        <td class="text-end">
                            <form action="." method="POST">
                            <input type="hidden" name="action" value="delete_type">
                            <input type="hidden" name="typeID" value="<?=$type['type_id'];?>">
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

<h4 class="text-center">Add a Vehicle Type</h4>
<div  class="row justify-content-md-center">
    <div class="col col-md-4">
        <form action="." method="POST">
            <input type="hidden" name="action" value="add_type">
            <label for="typeName">Type: &nbsp; &nbsp;</label>
            <input type="text" id="typeName" max="30" name="typeName" require> &nbsp; &nbsp;
            <button class="btn btn-primary">Add Type</button>
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
        <!-- <p><a href=".?action=list_makes">View/Edit Makes</a></p> -->
        <form action="." method="POST" id="edit_makes">
        <input type="hidden" name="action" value="list_makes">
        <button class="btn btn-info">View & Edit Makes</button>
        </form>
        <!-- <p><a href=".?action=list_class">View/Edit Classes</a></p> -->
        <form action="." method="POST" id="edit_classes">
        <input type="hidden" name="action" value="list_classes">
        <button class="btn btn-info">View & Edit Classes</button>
        </form>
    </div>
</div>


<?php include('footer.php')?>