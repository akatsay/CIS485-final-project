<?php
    require_once __DIR__ . '/../../utils/DataSource.php';

    $dataSource = new DataSource();

    // Prepare and execute select query
    $query = "SELECT c.*, ca.NAME, ca.DESCRIPTION, ca.IMAGE, ca.PRICE
          FROM cart c
          JOIN catalog ca ON c.code = ca.code
          WHERE c.userid = :userid";
    $params = [':userid' => $userid];

    try {
        $result = $dataSource->runQuery($query, $params);
        $items = $result->fetchAll(PDO::FETCH_ASSOC); // Fetch all items as an associative array
    } catch (PDOException $e) {
        $errors[] = 'Failed to fetch items: ' . $e->getMessage();
    }
?>

<?php if (!empty($items)): ?>
    <?php foreach ($items as $item): ?>
        <div style="border: solid green 1px; background: #FFFFFF; float: left; margin: 10px; padding: 10px;">
            <span class="left">
                <a href="<?=$item['IMAGE']?>">
                    <img src="<?=htmlspecialchars($item['IMAGE'])?>" style="width:200px" alt="<?= htmlspecialchars($item['NAME']) ?> image" />
                </a>
            </span>
            <div class="title"><?= htmlspecialchars($item['NAME']) ?></div>
            <p class="size">
                <?= htmlspecialchars($item['DESCRIPTION']) ?>
                <a href="./views/single.php?code=<?= htmlspecialchars($item['CODE']) ?>">More...</a><br />
                <span style="float: right; text-align: left; padding: .5em;">
                    <!-- <a href="/addToCart.php?code=<?= htmlspecialchars($item['CODE']) ?>?price=<?= htmlspecialchars($item['PRICE']) ?>">Add to Cart</a>&nbsp;&nbsp;
                    <a href="../../cart.php">Goto Cart</a> -->
                </span>
            </p>
            <div class="price">Price: $<?= number_format($item['PRICE'], 2) ?></div>
        </div>
    <?php endforeach; ?>
    <form action="./model/finish.php" method="delete">
        <input type="submit" value="BUY" class="but" title="BUY">
    </form>
<?php else: ?>
    <p>No items here, keep shopping.</p>
<?php endif; ?>