<?php
    require_once __DIR__ . '/../../utils/DataSource.php';

    $dataSource = new DataSource();

    // Prepare and execute select query
    $query = "SELECT * FROM catalog";
    $params = [];

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
                    <a href="/add_to_cart.php?code=<?= htmlspecialchars($item['CODE']) ?>">Add to Cart</a>&nbsp;&nbsp;
                    <a href="/view_cart.php">Goto Cart</a>
                </span>
            </p>
            <div class="price">Price: $<?= number_format($item['PRICE'], 2) ?></div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>No items found in the catalog.</p>
<?php endif; ?>