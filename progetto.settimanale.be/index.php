<?php
include __DIR__ . "/start.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Library</title>
</head>
<body style="background-color:aliceblue;"> 

<?php include __DIR__ . '/db.php';
$search = isset($_GET['search']) ? $_GET['search'] : '';

$stmt = $pdo->prepare("SELECT * FROM libri WHERE titolo LIKE ?");
$stmt->execute([
    "%$search%"
]);
?>
<div class="container" style="background-color:aliceblue; border:0.5px solid blue; border-radius:20px;">
        <h1 class="text-center text-primary">The Library</h1>

        <form class="row g-3">
            <div class="col">
                <input type="text" name="search" class="form-control" placeholder="Cerca un film" style="color:blue; border:0.5px solid blue; ::placeholder { color: blue; }">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Cerca</button>
            </div>
        </form>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="card mb-4 mx-4" style="background-color:aliceblue; border:0.5px solid blue;">
                <div class="card-body">
                    <h1 class="card-title text-primary "><?= $row["titolo"] ?></h1>
                    <p class="card-text bg-primary text-white rounded"  style= "width: 200px; height:50px; font-size:20px; padding-top:8px; padding-left:5px; " >Autore: <?= $row["autore"] ?></p>
                    <p class="card-text bg-primary text-white rounded" style="width: 200px; height:50px; font-size:20px; padding-top:8px; padding-left:5px;">Anno: <?= $row["anno_pubblicazione"] ?></p>
                    <p class="card-text bg-primary text-white rounded" style="width: 200px; height:50px; font-size:20px; padding-top:8px; padding-left:5px;">Genere: <?= $row["genere"] ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
        

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>