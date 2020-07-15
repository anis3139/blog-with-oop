<?php include "inc/header.php"?>
<?php include "inc/sidebar.php"?>

<?php
if(!Session::get('userroll')=='0'){
    echo "<script> window.location='index.php'</script>";
}?>

<?php
$db = new Database();
$format = new Formate();
?>
        <div class="grid_10">

            <div class="box round first grid">
                <h2>Add New user</h2>
               <div class="block copyblock">
                   <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $format->validation($_POST['username']);
    $password = $format->validation(md5($_POST['password']));
    $email = $format->validation($_POST['email']);
    $roll = $format->validation($_POST['roll']);

    $username = mysqli_real_escape_string($db->link, $username);
    $password = mysqli_real_escape_string($db->link, $password);
    $email = mysqli_real_escape_string($db->link, $email);
    $roll = mysqli_real_escape_string($db->link, $roll);

    if (empty($username) || empty($password) || empty($roll) || empty($email) ) {
        echo "<span style='error'> Field Must ot be Empty! </span>";
    } else{
        // var_dump($email);
        // die();
        $query="SELECT * FROM tbl_user where email= '$email' limit 1";
        $usermail=$db->SELECT($query);
       
        if($usermail!=false){
            echo "Mail allraedy Exist";
        } else {
            $query = "INSERT INTO tbl_user(username, password, roll) VALUES('$username', '$password', ' $roll' )";
            $userinsert = $db->insert($query);
            if ($userinsert) {
                echo "<span style='sucsess'>  User Created Successfully.. </span>";
            } else {
                echo "<span style='error'>  User Not Inserted...</span>";
            }
        }
    }

}
?>
                 <form action="" method="post">
                    <table class="form">
                        <tr>
                            <td>
                            <label for="username">User Name</label>
                            </td>
                            <td>
                                <input type="text" value="<?php if(isset($username)){echo $username; }?>" name="username" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                        <td>
                            <label for="password">Password</label>
                            </td>
                            <td>
                                <input type="password" name="password" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                        <td>
                            <label for="email">Email</label>
                            </td>
                            <td>
                                <input type="email" name="email" placeholder="Enter valied email address..." class="medium" />
                            </td>
                        </tr>                        
                        <tr><td>
                            <label for="roll">Role</label>
                            </td>
                            <td>
                               <select name="roll" id="roll">
                                   <option selected disabled >Select User Roll</option>
                                   <option value="0">Admin</option>
                                   <option value="1">User</option>
                                   <option value="2">Editor</option>
                               </select>
                            </td>
                        </tr>
						<tr>
                            <td>

                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include "inc/footer.php"?>
