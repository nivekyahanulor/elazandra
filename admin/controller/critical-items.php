<?php
include('../controller/database.php');


$customer = $mysqli->query("SELECT a.* , b.name as category, c.name as supplier from pos_items a 
							LEFT JOIN pos_item_category b on b.category_id  = a.item_category_id
							LEFT JOIN pos_supplier c on c.supplier_id   = a.item_supplier_id");

