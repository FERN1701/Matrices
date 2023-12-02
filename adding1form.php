<?php

function addMatrices($matrix1, $matrix2) {
    $rows = count($matrix1);
    $cols = count($matrix1[0]);

    // Check if the matrices are of the same size
    if (count($matrix2) != $rows || count($matrix2[0]) != $cols) {
        return "Matrices must be of the same size for addition.";
    }

    $result = array();

    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            $result[$i][$j] = $matrix1[$i][$j] + $matrix2[$i][$j];
        }
    }

    return $result;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve matrix values from the form and convert them to a 2D array
    $matrixInput = $_POST['matrixInput'];
    $rows = explode(";", $matrixInput);

    $matrixA = array_map(function ($row) {
        return explode(",", $row);
    }, $rows);

    // Example: You can use the same matrix input for both matrices
    $matrixB = $matrixA;

    // Perform matrix addition
    $resultMatrix = addMatrices($matrixA, $matrixB);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix Addition</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Matrix Addition</h2>

    <div class="btn-group mb-3">
        <a href="adding1form.php" class="btn btn-primary">1 Matrix</a>
        <a href="adding2form.php" class="btn btn-primary">2 Matrix</a>
        <a href="adding3form.php" class="btn btn-primary">3 Matrix</a>
        <a href="index.php" class="btn btn-secondary">Back</a>
    </div>

    <div>
        <?php echo "Generated Value [ ".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99)." ]"?>
    </div>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mt-3">
        <div class="form-group">
            <label for="matrixInput">Enter values for Matrix A (semicolon for rows, comma for elements):</label>
            <input type="text" name="matrixInput" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Add Matrices</button>
    </form>

    <?php
    // Display the result matrix if it exists
    if (isset($resultMatrix)) {
        echo "<h3 class='mt-4'>Result:</h3>";
        echo "<pre>";
        print_r($resultMatrix);
        echo "</pre>";
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
