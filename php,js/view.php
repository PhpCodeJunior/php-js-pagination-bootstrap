<?php
$conn = mysqli_connect("localhost","root","","php_js");

if(isset($_GET["page"])) {
    $page = $_GET["page"];
    if ($page == "" || $page == "1") {
        $page1 = 0;
    } else {
        $page1 = ($page * 5) - 5;
    }
}
$query = mysqli_query($conn,"select * from users limit $page1 ,2");
    while($row = mysqli_fetch_assoc($query)){
        echo $row["username"] . " " .$row["pass"]."<br>";

}
    $pag = mysqli_query($conn, "select * from users");
    $count = mysqli_num_rows($pag);
    $a = $count / 2;
    $a = ceil($a);
    for ($b = 1; $b <= $a; $b++) {
        ?>
        <a href="view.php?page=<?php echo $b; ?>"><?php echo $b; ?></a>
        <?php

}