<?php

function inverseMatrix($matrix) {
    $rows = count($matrix);
    $cols = count($matrix[0]);

    // Check if the matrix is square
    if ($rows !== $cols) {
        return "Error: Only square matrices are supported for this example.";
    }

    // Calculate the determinant
    $det = determinant($matrix);

    // Check if the matrix is invertible
    if ($det == 0) {
        return "Error: The matrix is not invertible (determinant is zero).";
    }

    // Calculate the inverse matrix elements
    $inverseMatrix = [];
    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            $cofactor = cofactor($matrix, $i, $j);
            $inverseMatrix[$j][$i] = $cofactor / $det; // Transpose the matrix
        }
    }

    return $inverseMatrix;
}

function determinant($matrix) {
    $rows = count($matrix);
    $cols = count($matrix[0]);

    // Base case: for a 2x2 matrix
    if ($rows == 2 && $cols == 2) {
        return $matrix[0][0] * $matrix[1][1] - $matrix[0][1] * $matrix[1][0];
    }

    $det = 0;
    for ($i = 0; $i < $cols; $i++) {
        $det += $matrix[0][$i] * cofactor($matrix, 0, $i);
    }

    return $det;
}

function cofactor($matrix, $row, $col) {
    $minorMatrix = [];
    $rows = count($matrix);
    $cols = count($matrix[0]);

    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            if ($i != $row && $j != $col) {
                $minorMatrix[] = $matrix[$i][$j];
            }
        }
    }

    $minorMatrix = array_chunk($minorMatrix, $cols - 1);
    $minorMatrix = array_values($minorMatrix);

    return determinant($minorMatrix) * pow(-1, $row + $col);
}

// Example usage
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming input is received as a string of comma-separated values
    $inputMatrixString = $_POST["matrix"];
    
    // Convert the input string into a 2D array
    $inputMatrix = array_map(function ($row) {
        return explode(",", $row);
    }, explode(";", $inputMatrixString));

    // Calculate the inverse matrix
    $inverseMatrix = inverseMatrix($inputMatrix);

    // Display the result
    echo "Original Matrix: <pre>" . print_r($inputMatrix, true) . "</pre>";
    echo "Inverse Matrix: <pre>" . print_r($inverseMatrix, true) . "</pre>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix Inverse Calculator</title>
</head>
<body>
    <form method="post" action="">
        <label for="matrix">Enter Matrix (comma-separated values, semicolon for rows):</label>
        <input type="text" name="matrix" id="matrix" required>
        <button type="submit">Calculate Inverse</button>
    </form>
</body>
</html>
