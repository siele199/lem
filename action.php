<?php
try {
    $connection = mysqli_connect("localhost:3308", "root", "root", "lem");
}
catch (mysqli_sql_exception $ex) {
    echo("error in connection");
}
if (isset($_POST['iid'])) {
    $iid = $_POST['iid'];
    $iname = $_POST['iname'];
    $price = $_POST['price'];
    $spec = $_POST['spec'];
    $qty = 1;
    $stmt = $connection->prepare("SELECT`includes_id`FROM `includes`WHERE `includes_id`=?");
    $stmt->bind_param("i", $iid);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    $code = $r['product_code'];
    if (!$code) {
        $query = $connection->prepare("INSERT INTO `basket1`(`includes_name`, `price`, `qty`, `total_price`) VALUES (?,?,?,?)");
        $query->bind_param("ssis", $iname, $price, $qty, );
        $query->execute();
        echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Item Added to Basket!</strong>
        </div>';
    }
    else {
        echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Item Already Added to Basket!</strong>
        </div>';
    }
}
?>