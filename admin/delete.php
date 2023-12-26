
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="js/sweetalert.min.js"></script>
</head>
<body>

<?php
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"resturant");
$id = $_GET["id"];
$name = $_GET["name"];
if($name == "product")
{
	mysqli_query($link,"update food set status='deactive' where id=$id");
	?>
	<script type="text/javascript">
		swal({
                title: "Food Deletion Success",
                text: "Food #<?php echo $id; ?> deleted successfully!!!!!!",
                icon: "success"
            }).then(function() {
            window.location = "product.php";
        });
	</script>
	<?php
}
else if($name == "category")
{
	mysqli_query($link,"update foodtype set status='deactive' where id=$id");
	?>
	<script type="text/javascript">
		swal({
                title: "Category Deletion Success",
                text: "Category #<?php echo $id; ?> deleted successfully!!!!!!",
                icon: "success"
            }).then(function() {
            window.location = "category.php";
        });
	</script>
	<?php
}

?>
</body>
</html>