<?php include_once "data/config.php"; ?>
<div id="header">
    <h1><?php echo "<a href='" . $root . "'>" . $title . "</a>";?></h1>
<span id="header-motd"><?php include "data/motd"?></span>
    <div id="header-banner">
        <a href="<?php echo $root;?>">Home</a> | <a href="<?php echo $root;?>boards.php">Boards</a> | <a href="<?php echo $root;?>post.php">New Post</a><br>
    </div>
</div>