<?php
    if(isset($_GET['dangxuat']) && ($_GET['dangxuat'] == 1)) {
        unset($_SESSION['dangnhap']);
        header ("Location: login.php");
        exit();
    }
?>

<div class="text-center mb-2 mt-2">
    <a href="index.php?dangxuat=1">
        <i class="fa-solid fa-right-from-bracket"></i>
        <?php
              if (isset($_SESSION['dangnhap'])) {
                echo $_SESSION['dangnhap'];
            }
        ?>
    </a>
</div>
