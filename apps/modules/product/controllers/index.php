<?php
$productIndex = new productIndex($connectDB);



$arrValues = $productIndex->productAll();
$count_product = $productIndex->findFirst("COUNT(*)","products");
