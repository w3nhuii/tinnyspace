<?php
include('login.php');
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
            <div id="contentbox" >
                <script type="text/javascript">
                    function countdown() {
                        var i = document.getElementById('timecount');
                        if (parseInt(i.innerHTML)<=1) {
                            location.href = 'index.php';
                        }
                        i.innerHTML = parseInt(i.innerHTML)-1;
                    }
                    setInterval(function(){ countdown(); },1000);
                </script>
                <?php
                $_SESSION["user_name"] = $row['username'];
                $sql="DELETE FROM users WHERE id ='$id'";
                $result=mysqli_query($con,$sql);
                if($result){
                    echo " <div align='center'>";
                    echo "Account Deleted Sucessfully.";
                    echo " <a href='index.php' >Main Menu</a> ";
                    echo "</div> ";
                } elseif(!isset($loggedin_session) || $loggedin_session==NULL) {
                    header("Location: index.php");
                } else {
                    echo "Unable to delete Your Account";
                }
                ?>
            </div>
        </body>
    </html>
</div>