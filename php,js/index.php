<?php
$conn = mysqli_connect("localhost","root","","php_js");
if($_SERVER["REQUEST_METHOD"]=="POST") {
    $name = $_POST["username"];
    $pass = $_POST["pass"];
    $pass_confirm = $_POST["pass_conf"];
    $valid = true;
    $query = mysqli_query($conn, "insert into users(username,pass)values('$name','$pass')");
    header("location:login.php");

}

include_once("head.php");
?>

<div class="container">
        <h1 class="alert alert-success text-centar">WELCOME GUEST, please sign up</h1>

        <form method="post" class="form-group"  action="<?php echo $_SERVER['PHP_SELF']; ?>" name="form" onsubmit="return validateForm()">
            <input type="text" name="username" id="username" placeholder="name" class="form-control">
                <div id="nameErr" style="color: chartreuse;"></div>
            <input type="password" name="pass" id="pass" placeholder="pass" class="form-control">
                <div id="passErr" style="color: chartreuse;"></div>
            <input type="password" name="pass_conf" placeholder="pass confirm" class="form-control">
                <div id="pErr" style="color: chartreuse;"></div>
            <input type="submit" name="submit" id="sub" value="REGISTER" class="form-control">

        </form>

    <script>
        var username= document.forms["form"]["username"];
        var pass= document.forms["form"]["pass"];
        var pConf= document.forms["form"]["pass_conf"];

        var nameErr= document.getElementById("nameErr");
        var passErr= document.getElementById("passErr");
        var pErr= document.getElementById("pErr");

        username.addEventListener("blur",nameVerify, true);
        pass.addEventListener("blur",passVerify, true);

        function validateForm() {

            if (username.value == "") {
                username.style.border = "1px solid red";
                nameErr.textContent = "Username is required";
                username.focus();
                return false;
            }
            if (pass.value == "") {
                pass.style.border = "1px solid red";
                passErr.textContent = "Password is required";
                pass.focus();
                return false;
            }
            if (pass.value != pConf.value) {
                pass.style.border = "1px solid red";
                pConf.style.border = "1px solid red";
                pErr.innerHTML = "PASSWORD DO NOT MATCH";
                return false;
            }
        }


        function nameVerify() {
            if (username.value != "") {
                username.style.border = "1px solid blue";
                nameErr.innerHTML = "";
                return true;
            }
        }
        function passVerify() {
            if(pass.value !=""){
                pass.style.border = "1px solid blue";
                passErr.innerHTML = "";
                return true;
            }
        }



    </script>
</div>
<?php include_once("footer.php");
?>