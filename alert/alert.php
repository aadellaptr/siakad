<?php
if (isset($_SESSION["alert-success"])){ ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        <?php echo $_SESSION["alert-success"]?>
    </div>
    <?php
    unset($_SESSION["alert-success"]);

}else if (isset($_SESSION["alert-danger"])){?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
        <p><?php echo $_SESSION["alert-danger"]?></p>
    </div>
    <?php
    unset($_SESSION["alert-danger"]);
}
?>
<?php
if (isset($_GET["message"])){ 
    $pesan = $_GET['message'];?>
    <div class="alert alert-warning alert-dismissible" style="color: white;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        <?php echo $pesan?>
    </div>
<?php
}else if(isset($_GET["msg"])){
    $pesan = $_GET['msg'];?>
    <div class="alert alert-success alert-dismissible" style="color: white;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        <?php echo $pesan?>
    </div>
<?php
}
?>

