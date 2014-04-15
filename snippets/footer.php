<footer>
    <hr>
    <p>&copy; <?= $brand;?> &nbsp;&nbsp; <span class="text-muted"><i class="fa fa-long-arrow-left"></i> This is data that can be changed in assets/data/data.yml</span></p>
    <br>
        <a href="?session_destroy=true">Renew Prototype Session</a>&nbsp;&nbsp;|&nbsp;&nbsp;
        <?php foreach ($languages as $key => $language){ ?>
            <a href="?session=true&lang=<?php echo $key ;?>"><?php echo $language ;?></a>&nbsp;&nbsp;
        <?php } ?>
</footer>