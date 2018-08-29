<?php
        namespace pro1\Model;

use pro1\Model\DBconfig;

class DBaccess
{
    // Create connection
    public function connect()
    {
        $conn = mysqli_connect(DBconfig::$servername, DBconfig::$username, DBconfig::$password, DBconfig::$dbname);
        // Check connection
        if (!$conn) {
            return false;
        } else {
            mysqli_query($conn, "SET NAMES UTF8");
            return true;
        }
    }
    public function select_all()
    {
        if ($this->connect()) {
            $conn = mysqli_connect(
                    DBconfig::$servername,
                    DBconfig::$username,
                DBconfig::$password,
                    DBconfig::$dbname
                );
            $sql = "select email from users";
            $result = mysqli_query($conn, $sql);
            echo '<table class="table table-bordered">
						<thead><tr><th>Emails</th></tr></thead>';
            while ($row = mysqli_fetch_row($result)) {
                echo '<tbody><tr>';
                echo '<td>' . $row[0] . '</td>';
                echo '</tr></tbody>';
            }
            echo '</table>';
        } else {
            echo 'DB connection is failed!';
            echo '<br><a href="..\index.php">回首頁</a>';
        }
    }
    public function insert_into(string $email, string $pwd)
    {
        if ($this->connect()) {
            $conn = mysqli_connect(
                    DBconfig::$servername,
                    DBconfig::$username,
                    DBconfig::$password,
                    DBconfig::$dbname
                );
            $pwd = password_hash($pwd, PASSWORD_DEFAULT);
            $sql = "select * from users where email='" . $email . "'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_fetch_row($result) == null) {
                $sql = "INSERT INTO users(email,password)
				Values('" . $email . "','" . $pwd."')";
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                    header('Location: ..\View\login.php');
                    sleep(3);
                    exit;
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    echo '<br><a href="..\index.php">回首頁</a>';
                }
            } else {
                echo 'email is existed <br>';
                echo '<br><a href="..\index.php">回首頁</a>';
            }
        } else {
            echo 'DB connection is failed!';
            echo '<br><a href="..\index.php">回首頁</a>';
        }
    }
    public function login(string $email, string $pwd)
    {
        if ($this->connect()) {
            $conn = mysqli_connect(
                    DBconfig::$servername,
                    DBconfig::$username,
                DBconfig::$password,
                    DBconfig::$dbname
                );
            $sql = "select * from users where email='" . $email . "'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_row($result);
            if (isset($row)) {
                if (password_verify($pwd, $row[2])) {
                    session_start();
                    $_SESSION['username'] = $email;
                    header('Location: ..\View\lobby.php');
                    exit;
                } else {
                    echo 'Wrong Password';
                    echo '<br><a href="..\index.php">回首頁</a>';
                }
            } else {
                echo 'email does not exist!';
                echo '<br><a href="..\index.php">回首頁</a>';
            }
        } else {
            echo 'DB connection is failed!';
            echo '<br><a href="..\index.php">回首頁</a>';
        }
    }
    public function delete($email)
    {
        if ($this->connect()) {
            $conn = mysqli_connect(
                    DBconfig::$servername,
                    DBconfig::$username,
                DBconfig::$password,
                    DBconfig::$dbname
                );
            $sql = "delete from users where email='" . $email . "'";
            mysqli_query($conn, $sql);
            header('Location: ../index.php');
            exit;
        } else {
            echo 'DB connection is failed!';
            echo '<br><a href="..\index.php">回首頁</a>';
        }
    }
}
