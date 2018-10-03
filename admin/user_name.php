<?php
$username_query = mysql_query("select * from tb_user where user_id=$session_id") or die(mysql_error());
$user_row = mysql_fetch_array($username_query);
?>  
<div class="pull-right-date">
    <?php
    $Today = date('m/d/y');
    $new = date('l, F d, Y', strtotime($Today));
    echo $new;
    ?>
</div>
<div class="username">Welcome:&nbsp;&nbsp;<?php echo $user_row['firstname'] . " " . $user_row['lastname']; ?></div>

