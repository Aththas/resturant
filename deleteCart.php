<?php
session_start();
if($_SESSION["user"] == "")
{
?>
<script type="text/javascript">
window.location="login.php";
</script>
<?php
}

$productId = $_GET["id"];
unset($_SESSION['cart'][$productId]);

	?>
        <script type="text/javascript">
          window.location="cart.php";
        </script>
    <?php
?>