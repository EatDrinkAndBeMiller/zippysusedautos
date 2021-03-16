<?php include('header.php') ?>

<h4 class="text-center title-text">Removing Vehicle Types</h4>
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

<h4 class="text-center title-text">Add a Vehicle Type</h4><br>
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
    <h5 class="text-center"><a href=".">Return to Vehicle List</a></h5>


<?php include('footer.php')?>