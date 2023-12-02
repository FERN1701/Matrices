<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrix Subtraction</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Matrix Subtraction</h2>

        <div class="btn-group mb-3">
            <a href="subtract.php" class="btn btn-primary">2 Matrix</a>
            <a href="subtract3.php" class="btn btn-primary">3 Matrix</a>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </div>

        <br>
        <?php echo "Generated Value [ ".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99)." ]"?><br>
        <?php echo "Generated Value [ ".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99)." ]"?><br>
        <?php echo "Generated Value [ ".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99).",".rand(11,99)." ]"?><br>

        <br><br>
        <form method="post" action="">
            <div class="form-group">
                <label for="matrixA">Matrix A (e.g., 3,5;2,7):</label>
                <input type="text" name="matrixA" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="matrixB">Matrix B (e.g., 1,2;4,1):</label>
                <input type="text" name="matrixB" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>

        <?php
        function subtractMatrices($a, $b) {
            $result = [];
            for ($i = 0; $i < count($a); $i++) {
                for ($j = 0; $j < count($a[$i]); $j++) {
                    $result[$i][$j] = $a[$i][$j] - $b[$i][$j];
                }
            }
            return $result;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get matrix input from the form
            $matrixAInput = $_POST["matrixA"];
            $matrixBInput = $_POST["matrixB"];

            // Parse the input into 2D arrays
            $matrixA = array_map(function ($row) {
                return explode(',', $row);
            }, explode(';', $matrixAInput));

            $matrixB = array_map(function ($row) {
                return explode(',', $row);
            }, explode(';', $matrixBInput));

            // Check if both matrices have the same dimensions
            if (count($matrixA) == count($matrixB) && count($matrixA[0]) == count($matrixB[0])) {
                // Perform matrix subtraction
                $resultMatrix = subtractMatrices($matrixA, $matrixB);

                // Display the result
                echo "<h3 class='mt-3'>Result:</h3>";
                echo "<pre>";
                print_r($resultMatrix);
                echo "</pre>";
            } else {
                echo "<p class='text-danger'>Error: Matrices must have the same dimensions for subtraction.</p>";
            }
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
