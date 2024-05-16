<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    unset($_SESSION['user']);
    header('Location: /redleaves');
    exit();
}
?>

<div id="header">
    <div id="buttons">
        <?php
        if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
            echo '<a href="/redleaves/login" class="but" title="">Login</a><div class="but_razd"></div>';
        } else {
            echo '
            <form style="display: inline" action="" method="post">
                <input type="submit" value="Logoff" class="but" title="Logoff">
            </form>
            <div class="but_razd"></div>
            ';
        }
        ?>
        <a href="/redleaves/products" class="but" title="">Products</a><div class="but_razd"></div>
        <a href="/redleaves/about.php" class="but" title="">About us</a><div class="but_razd"></div>
    </div>
    <div id="logo">
        <b><a href="../redleaves">BMCC ELECTRONICS</a></b>
        <h2><a href="../redleaves"><small>Small Company Slogan Goes Here</small></a></h2>
    </div>
</div>