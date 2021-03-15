<?php include('header.php') ?>

<br>
<h4 class="text-center">Removing Vehicle Classes</h4>
<br>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-md-3">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Class</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($classes as $class) : ?>
                        <tr>
                        <td><?=$class['Class']?></td>
                        <td class="text-end">
                            <form action="." method="POST">
                            <input type="hidden" name="action" value="delete_class">
                            <input type="hidden" name="classID" value="<?=$class['class_id'];?>">
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

<h4 class="text-center">Add a Vehicle Class</h4>
<div  class="row justify-content-md-center">
    <div class="col col-md-4">
        <form action="." method="POST">
            <input type="hidden" name="action" value="add_class">
            <label for="className">Class: &nbsp; &nbsp;</label>
            <input type="text" id="className" max="30" name="className" require> &nbsp; &nbsp;
            <button class="btn btn-primary">Add Class</button>
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
        <!-- <p><a href=".?action=list_types">View/Edit Types</a></p> -->
        <form action="." method="POST" id="edit_types">
        <input type="hidden" name="action" value="list_types">
        <button class="btn btn-info">View & Edit Types</button>
        </form>
    </div>
</div>


<?php include('footer.php')?>