<?php
require_once __DIR__ . '/../../utils/DataSource.php';

$dataSource = new DataSource();

// Check if the code parameter is set in the URL
if(isset($_GET['code'])) {
    // Get the code from the URL parameter
    $code = $_GET['code'];

    // Prepare and execute select query with a WHERE clause to fetch the item corresponding to the code
    $query = "SELECT * FROM catalog WHERE code = :code";
    $params = [':code' => $code];

    try {
        $result = $dataSource->runQuery($query, $params);
        $item = $result->fetch(PDO::FETCH_ASSOC); // Fetch the item as an associative array
    } catch (PDOException $e) {
        $errors[] = 'Failed to fetch item: ' . $e->getMessage();
    }
}
?>

<?php if (!empty($item)): ?>
    <div id="content" style="border:solid darkred 15px;">
                	
        <div class="hh1"><?= htmlspecialchars($item['NAME']) ?></div>
        <p>&nbsp;</p>
        <!-- -------------------------------------------------  -->
        <center>
        <img src="<?=htmlspecialchars($item['IMAGE'])?>" style="width:500px" alt="<?= htmlspecialchars($item['NAME']) ?> image" />
        </center>

            <p class="size">
            <?= htmlspecialchars($item['DESCRIPTION']) ?>
            <br />
            <span style="float:right;text-align:left;padding:.5em;">
                <a href="/add_to_cart.php?code=<?= htmlspecialchars($item['CODE']) ?>">Add to Cart</a>&nbsp;&nbsp;
                <a href="/view_cart.php">Goto Cart</a>
            </span>
            </p>
        
        <!-- -------------------------------------------------  -->
        <div style="clear:both"></div>
        
        
    </div>
<?php else: ?>
    <p>No items found in the catalog.</p>
<?php endif; ?>