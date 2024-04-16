<?php

include __DIR__ . "/db.php";

$stmt = $pdo->prepare("DELETE FROM libri WHERE id = ?");
$stmt->execute([$_GET["id"]]);

header("Location: /progetto.settimanale.be/");