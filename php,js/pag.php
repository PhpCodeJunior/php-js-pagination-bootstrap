<?php
include_once("head.php");
echo "<div class='container'>";
if(isset($_SESSION["u"])) {
?><div class='alert alert-success'>WELCOME <?php echo $_SESSION['u']; ?> <a href="logout.php">LOGOUT</a></div>
<?php
}
$conn = mysqli_connect("localhost","root","","php_js");

$rez_per_page = 2;

$query = mysqli_query($conn,"select * from users");
$row = mysqli_num_rows($query);
$numberPage =ceil($row/$rez_per_page);
if(!isset($_GET["page"])){
    $page=1;
}else{
    $page=$_GET["page"];
}
$firstRez = ($page-1)*$rez_per_page;
$sql='SELECT * FROM users LIMIT ' . $firstRez . ',' .  $rez_per_page;
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    echo "USERNAME: ". $row["username"] . " | PASSWORD: " .$row["pass"]."<br>";

}
for($page=1;$page<=$numberPage;$page++){
    echo '<ul class="pagination">';
    echo '<li><a  href="pag.php?page='.$page.'">'.$page.'</a></li>';
    echo "</ul>";
}

echo "</div>";
?>

<?php include_once("footer.php");
