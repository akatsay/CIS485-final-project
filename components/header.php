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
            <form action="" method="post">
                <input type="submit" value="Logoff" class="but" title="Logoff">
            </form>
            <div class="but_razd"></div>
            ';
        }
        ?>
        <a href="/redleaves/products" class="but" title="">Products</a><div class="but_razd"></div>
        <a href="/redleaves/about.html" class="but" title="">About us</a><div class="but_razd"></div>
        <a href="/redleaves/contact.html" class="but" title="">Contact us</a>
    </div>
    <div id="logo">
        <b><a href="#">BMCC ELECTRONICS</a></b>
        <h2><a href="#"><small>Small Company Slogan Goes Here</small></a></h2>
    </div>
</div>