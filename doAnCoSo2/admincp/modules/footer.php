<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="copyright">
                <?php
                $sql = "select copyright from tbl_lienhe LIMIT 1";
                $row = getRow($sql);

                foreach ($row as $item) {
                    echo '<p class="text-center">' . $item['copyright'] . '</p>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
