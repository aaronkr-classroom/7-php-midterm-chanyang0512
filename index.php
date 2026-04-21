<?php include 'include/header.php'; ?>

<?php
$products = [
    [
        'name' => '키보드',
        'price' => 30000,
        'stock' => 10
    ],
    [
        'name' => '마우스',
        'price' => 15000,
        'stock' => 3
    ],
    [
        'name' => '모니터',
        'price' => 120000,
        'stock' => 0
    ]
];

function getStockMessage($stock)
{/*if문 사용하여 재고 및 색상 반환 함수 작성*/
    if ($stock >= 5) {
        return '<span class="good">재고 충분</span>';
    } elseif ($stock >= 1) {
        return '<span class="low">재고 부족</span>';
    } else {
        return '<span class="out">품절</span>';
    }
}
?>

<table>
    <tr>
        <th>상품명</th>
        <th>가격</th>
        <th>재고</th>
        <th>재고 상태</th>
    </tr>

    <?php foreach ($products as $product): /*상품목록 출력*/?>
        <tr>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo number_format($product['price']); ?>원</td>
            <td><?php echo $product['stock']; ?></td>
            <td><?php echo getStockMessage($product['stock']); ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
/*총 재고 금액 계산*/
$totalStockValue = 0;
foreach ($products as $p) {
    $totalStockValue += $p['price'] * $p['stock'];
}
?>
<div class="summary">
    총 재고 금액: <?php echo number_format($totalStockValue); ?>원
</div>


<?php include 'include/footer.php'; ?>