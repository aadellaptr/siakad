<?php
require "../../_config/config.php";

if (empty($_SESSION["user"])){
  $_SESSION["alert-danger"] = "Anda Harus Login Terlebih Dahulu";
  header ("Location:../../log/login.php");
}
?>