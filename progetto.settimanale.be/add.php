<?php
include __DIR__ . "/start.php";


$book_id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titolo = $_POST["titolo"];
    $autore = $_POST["autore"];
    $anno = $_POST["anno_pubblicazione"];
    $genere = $_POST["genere"];

    if ($book_id != 0) {
        $query = "UPDATE libri 
                  SET titolo = :titolo, autore = :autore, anno_pubblicazione = :anno_pubblicazione, genere = :genere 
                  WHERE id = :id";
                   $stmt = $pdo->prepare($query);
                   $stmt->execute([
                       'titolo' => $titolo,
                       'autore' => $autore,
                       'anno_pubblicazione' => $anno,
                       'genere' => $genere,
                   ]);
    } else {
        $query = "INSERT INTO libri (titolo, autore, anno_pubblicazione, genere) 
                  VALUES (:titolo, :autore, :anno_pubblicazione, :genere)";
                   $stmt = $pdo->prepare($query);
                   $stmt->execute([
                       'titolo' => $titolo,
                       'autore' => $autore,
                       'anno_pubblicazione' => $anno,
                       'genere' => $genere,
                   ]);
    }
    
    header("Location: index.php");
}
?>

<div class="row">
    <div class="col-md-6">
        <div class="card text-center bg-primary text-white rounded">
            <div class="card-body">
                <h3 class="card-title mb-3"><?= isset($_REQUEST["id"]) ? "Modifica libro" : "Aggiungi libro" ?></h3>
                <form action="" method="POST" novalidate>
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $book_id ?>">
                        <label for="titolo" class="form-label">Titolo</label>
                        <input type="text" class="form-control" name="titolo" id="titolo" required>
                    </div>
                    <div class="mb-3">
                        <label for="autore" class="form-label">Autore</label>
                        <input type="text" class="form-control" name="autore" id="autore" required>
                    </div>
                    <div class="mb-3">
                        <label for="anno" class="form-label">Anno di pubblicazione</label>
                        <input type="number" class="form-control" name="anno_pubblicazione" id="anno" required>
                    </div>
                    <div class="mb-3" >
                        <label for="genere" class="form-label">Genere</label>
                        <input type="text" class="form-control" name="genere" id="genere" required>
                    </div>
                    <div class="d-grid">
                        <button class="btn <?= isset($_REQUEST["id"]) ? "btn-success" : "btn-primary" ?>"><?= isset($_REQUEST["id"]) ? "Modifica" : "Aggiungi" ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

