<?php

$url = "https://i.ewanto.de/a/v0/EWANTO_Produkt.json";

$jsonData = file_get_contents($url);

$products = json_decode($jsonData, true);

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKU Ohne Bild</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <h2>Produkte ohne Bilder</h2>
    <table>
        <tr>
            <th>SKU</th>
            <th>Name</th>
            <th>Herstellername</th>
        </tr>
        <?php
        if (!empty($products)) {
            foreach ($products as $product) {
                if (empty($product['public_image'])) { 
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($product['sku']) . "</td>";
                    echo "<td>" . htmlspecialchars($product['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($product['hersteller_name']) . "</td>";
                    echo "</tr>";
                }
            }
        } else {
            echo "<tr><td colspan='3'>Alle Produkte haben bereits Bilder</td></tr>";
        }
        ?>
    </table>
</body>
</html>
