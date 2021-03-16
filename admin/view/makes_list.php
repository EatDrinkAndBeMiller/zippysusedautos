<?php include('header.php') ?>

<h4 class="text-center title-text">Removing Vehicle Makes</h4>
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

<h4 class="text-center title-text">Add a Vehicle Make</h4><br>
<div  class="row justify-content-md-center">
    <div class="col col-md-5 d-flex">
        <form action="." method="POST">
            <input type="hidden" name="action" value="add_make">
            <label for="make">Make: &nbsp;</label>
            <input type="text" id="make" max="30" name="make" required> &nbsp; &nbsp;
            <button class="btn btn-primary">Add Make</button>
        </form>
    </div>
</div>

<br><br>
    <h5 class="text-center"><a href=".">Return to Vehicle List</a></h5>



<?php include('footer.php')?>