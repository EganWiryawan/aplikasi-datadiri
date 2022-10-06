<h1>Form Login</h1>
<form action="login.php" method="post">
    <label>Username</label><br>
    <input type="text" name="username" placeholder="Ex.rofi" />
    <br>

    <label>Password</label><br>
    <input type="password" name="password" placeholder="Ex.*" />
    <br>

    <input type="submit" name="login" value="masuk" />
</form>

<?php
    include("./input-config.php");
    if ( isset($_POST["login"]) ){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM akun
        WHERE username='$username' AND password=MD5 ('$password'); ";
        $data = mysqli_query($mysqli, $query);
        if(mysqli_num_rows($data) > 0 ){
            $row = mysqli_fetch_array($data);

            $_SESSION["login"] = TRUE;
            $_SESSION["akun_id"] = $row["akun"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["role"] = $row["role"];


            echo "
                <script>
                    alert('Login Berhasil');
                    window.location='input-datadiri.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Akun tidak ditemukan, coba lagi');
                    window.location='login.php';
                </script>
            ";
        }
    }
?>