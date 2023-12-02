<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Adjoint Matrix Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Adjoint Matrix Calculator</h2>

    <form method="post" action="" class="mb-4">
        <div class="form-group">
            <label for="matrixInput">Enter Matrix (use commas for elements within a row and semicolons to separate rows):</label>
            <textarea id="matrixInput" name="matrix" rows="5" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="matrixSize">Select Matrix Size:</label>
            <select id="matrixSize" name="matrix_size" class="form-control">
                <option value="2">2x2</option>
                <option value="3">3x3</option>
                <option value="4">4x4</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Calculate Adjoint</button> <a href="index.php" class="btn btn-secondary">Back</a>
    </form>

    <?php
   function calculateAdjoint($matrix) {
    $rows = explode(';', $matrix);
    $size = count($rows);

    // Initialize the matrix
    $resultMatrix = [];
    for ($i = 0; $i < $size; $i++) {
        $resultMatrix[$i] = array_map('intval', explode(',', $rows[$i]));
    }

    // Calculate the adjoint matrix
    $cofactors = [];
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            $minorMatrix = getMinorMatrix($resultMatrix, $i, $j);
            $cofactors[$i][$j] = pow(-1, $i + $j) * determinant($minorMatrix);
        }
    }

    // Transpose the cofactor matrix to get the adjoint matrix
    $adjointMatrix = transposeMatrix($cofactors);

    return $adjointMatrix;
}

function getMinorMatrix($matrix, $rowToRemove, $colToRemove) {
    $minorMatrix = [];
    $size = count($matrix);

    for ($i = 0; $i < $size; $i++) {
        if ($i !== $rowToRemove) {
            $minorMatrixRow = [];
            for ($j = 0; $j < $size; $j++) {
                if ($j !== $colToRemove) {
                    $minorMatrixRow[] = $matrix[$i][$j];
                }
            }
            $minorMatrix[] = $minorMatrixRow;
        }
    }

    return $minorMatrix;
}

function determinant($matrix) {
    $size = count($matrix);

    if ($size === 2) {
        return ($matrix[0][0] * $matrix[1][1]) - ($matrix[0][1] * $matrix[1][0]);
    } else {
        $det = 0;
        for ($i = 0; $i < $size; $i++) {
            $det += pow(-1, $i) * $matrix[0][$i] * determinant(getMinorMatrix($matrix, 0, $i));
        }
        return $det;
    }
}

function transposeMatrix($matrix) {
    $transposedMatrix = [];
    $rows = count($matrix);
    $cols = count($matrix[0]);

    for ($i = 0; $i < $cols; $i++) {
        $transposedMatrixRow = [];
        for ($j = 0; $j < $rows; $j++) {
            $transposedMatrixRow[] = $matrix[$j][$i];
        }
        $transposedMatrix[] = $transposedMatrixRow;
    }

    return $transposedMatrix;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matrix = $_POST["matrix"];
    $matrix_size = $_POST["matrix_size"];

    // Validate input and calculate adjoint matrix
    if (!empty($matrix) && is_numeric($matrix_size) && $matrix_size >= 2 && $matrix_size <= 4) {
        $adjointMatrix = calculateAdjoint($matrix);

        // Display the result
        echo "<br><br><b>Resulting Adjoint Matrix:</b><br>";
        foreach ($adjointMatrix as $row) {
            echo implode(', ', $row) . "<br>";
        }
    } else {
        echo "<br><br><b>Please enter a valid matrix and select a valid matrix size.</b>";
    }
}
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
