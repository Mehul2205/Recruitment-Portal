<?php
    require 'rec_server.php';
    session_start();
    if(isset($_POST['lemail']) && isset($_POST['lpass']))
    {
        $sql="SELECT id,password,firstname,lastname,department,post from details WHERE email='".$_POST['lemail']."';";
        $result = $conn->query($sql);
        $result=$result->fetch_assoc();
        $password = md5($_POST['lpass']);
        if($result['password']=="$password")
        {
            $_SESSION['id']=$result['id'];
            $_SESSION['name']=$result['firstname'];
            $_SESSION['lastname']=$result['lastname'];
            $_SESSION['department']=$result['department'];
            $_SESSION['post']=$result['post'];
            header('Location:rec_detail.php');
        }
        else{

            header('Location:rec_index.php?invalid=True');
        }

    }

?>