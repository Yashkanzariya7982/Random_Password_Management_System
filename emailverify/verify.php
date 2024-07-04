<?php 
    require('connection.php');

    if(isset($_GET['email']) && isset($_GET['v_code']))
    {
        $query="SELECT * FROM `registered_users` WHERE `email`='$_GET[email]' AND `verification_code`='$_GET[v_code]'";
        $result=mysqli_query($db,$query);
        if($result)
        {
            if(mysqli_num_rows($result)==1)
            {
                $result_fetch=mysqli_fetch_assoc($result);
                if($result_fetch['is_verified']==0)
                {
                    $update="UPDATE `registered_users` SET `is_verified` ='1' WHERE `email`='$result_fetch[email]'";
                    if(mysqli_query($db,$update)){
                        echo "
                            <script>
                                alert('Email verified successfully');
                                window.location.href='index.php';
                            </script>
                        ";
                    }
                    else
                    {
                        echo "
                        <script>
                            alert('Cannot run Query');
                            window.location.href='index.php';
                        </script>
                        "; 
                    }
                }
                else
                {
                    echo "
                        <script>
                            alert('Email already registered');
                            window.location.href='index.php';
                        </script>
                     ";
                }
            }
        }
        else
        {
            # if the data can not be inserted
            echo "
            <script>
                alert('Cannot ru Query');
                window.location.href='index.php';
            </script>
            ";
        }

    }
?>