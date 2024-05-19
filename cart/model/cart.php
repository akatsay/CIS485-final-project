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

    // Calculate total price
    $totalPrice = 0;
    if (!empty($items)) {
        foreach ($items as $item) {
            $totalPrice += $item['PRICE'] * $item['QUANTITY'];
        }
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
                <a href="../products/views/single.php?code=<?= htmlspecialchars($item['CODE']) ?>">More...</a><br />
                <span style="float: right; text-align: left; padding: .5em;">
                <form method="POST" action="./model/modifyQty.php">
                    <input type="hidden" name="code" value="<?= htmlspecialchars($item['CODE']) ?>">
                    <button type="submit" name="action" value="decrement">-</button>
                    <button type="submit" name="action" value="increment">+</button>
                    <button type="submit" name="action" value="remove">remove</button>
                </form>
                <p>Quantity: <?= htmlspecialchars($item['QUANTITY']) ?></p>
                </span>
            </p>
            <div class="price">Price: $<?= number_format($item['PRICE'] * number_format($item['QUANTITY']), 2) ?></div>
        </div>
    <?php endforeach; ?>
    <div style="clear: both;"></div>
    <div style="border: solid darkgreen 2px; background: #F9F9F9; margin: 10px; padding: 10px;">
        <strong>Total Price: $<?= number_format($totalPrice, 2) ?></strong>
    </div>
    <form action="./model/finish.php" method="delete">
        <input type="submit" value="BUY" class="but" title="BUY">
    </form>
<?php else: ?>
    <p>No items here, keep shopping.</p>
<?php endif; ?>