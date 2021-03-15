    <hr>

    <!-- <p><a href=".?action=list_makes">View/Edit Makes</a></p> -->
    <form action="." method="POST">
    <input type="hidden"  name="action" value="list_makes">
        <button type="submit" class="btn btn-info">View/Edit Makes</button>
    </form>
    <!-- <p><a href=".?action=list_types">View/Edit Types</a></p> -->
    <form action="." method="POST">
    <input type="hidden" name="action" value="list_types">
    <button type="submit" class="btn btn-info">View/Edit Types</button>
    </form>
    <!-- <p><a href=".?action=list_class">View/Edit Classes</a></p> -->
    <form action="." method="POST">
    <input type="hidden" name="action" value="list_classes">
    <button type="submit" class="btn btn-info">View/Edit Class</button>
    </form>

    <footer>
    <p class="copyright"> &copy; 
        <?= date("Y"); ?> Zippy's Used Cars <br>
        Website created by MillerTime Creations </p>
    </footer>
    
    </main>
</body>
</html>