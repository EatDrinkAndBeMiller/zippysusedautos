<?php include('header.php') ?>

<h4 class="text-center title-text">Removing Vehicle Classes</h4>
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

<h4 class="text-center title-text">Add a Vehicle Class</h4><br>
<div  class="row justify-content-md-center d-flex">
    <div class="col col-md-5">
        <form action="." method="POST">
            <input type="hidden" name="action" value="add_class">
            <label for="className">Class:  &nbsp;</label>
            <input type="text" id="className" max="30" name="className" require> &nbsp; &nbsp;
            <button class="btn btn-primary">Add Class</button>
        </form>
    </div>
</div>

<br><br>
    <h5 class="text-center"><a href=".">Return to Vehicle List</a></h5>


<?php include('footer.php')?>