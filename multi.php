<?php

function multiplyMatrices($matrixA, $matrixB) {
    $rowsA = count($matrixA);
    $colsA = count($matrixA[0]);
    $rowsB = count($matrixB);
    $colsB = count($matrixB[0]);

    if ($colsA != $rowsB) {
        // Matrices cannot be multiplied
        return null;
    }

    $result = array();

    for ($i = 0; $i < $rowsA; $i++) {
        for ($j = 0; $j < $colsB; $j++) {
            $result[$i][$j] = 0;
            for ($k = 0; $k < $colsA; $k++) {
                $result[$i][$j] += $matrixA[$i][$k] * $matrixB[$k][$j];
            }
        }
    }

    return $result;
}

// Function to print a matrix
function printMatrix($matrix, $label) {
    echo "<strong>$label:</strong>\n";
    foreach ($matrix as $row) {
        echo implode("\t", $row) . "\n";
    }
    echo "<br>";
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $inputMatrixA = $_POST['matrixA'];
    $inputMatrixB = $_POST['matrixB'];

    // Convert input strings to matrices
    $matrixA = array_map(function($row) { return explode(',', $row); }, explode(';', $inputMatrixA));
    $matrixB = array_map(function($row) { return explode(',', $row); }, explode(';', $inputMatrixB));

    // Determine matrix sizes
    $rowsA = count($matrixA);
    $colsA = count($matrixA[0]);
    $rowsB = count($matrixB);
    $colsB = count($matrixB[0]);

    // Check if matrices are 2x2, 3x3, or 4x4
    if (($rowsA <= 4 && $colsA <= 4) && ($rowsB <= 4 && $colsB <= 4)) {
        // Multiply matrices
        $resultMatrix = multiplyMatrices($matrixA, $matrixB);

        // Display result
        if ($resultMatrix !== null) {
            printMatrix($matrixA, 'Matrix A');
            printMatrix($matrixB, 'Matrix B');
            printMatrix($resultMatrix, 'Result Matrix');
        } else {
            echo "Matrices cannot be multiplied. Invalid dimensions.";
        }
    } else {
        echo "Matrices must be 2x2, 3x3, or 4x4.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix Multiplication</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Matrix Multiplication</h2>
    <p class="text-center">Only To Matrices will do, but it can accommodate 2x2 to 4x4</p>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="mt-3">
        <div class="form-group">
            <label for="matrixA">Matrix A (e.g., 1,2;3,4 for a 2x2 matrix):</label>
            <input type="text" name="matrixA" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="matrixB">Matrix B (e.g., 5,6;7,8 for a 2x2 matrix):</label>
            <input type="text" name="matrixB" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Multiply Matrices</button>  <a href="index.php" class="btn btn-secondary">Back</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
