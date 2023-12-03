<?php

function addMatrices($matrix1, $matrix2, $matrix3) {
    $rows = count($matrix1);
    $cols = count($matrix1[0]);

    // Check if the matrices are of the same size
    if (count($matrix2) != $rows || count($matrix2[0]) != $cols || count($matrix3) != $rows || count($matrix3[0]) != $cols) {
        return "Matrices must be of the same size for addition.";
    }

    $result = array();

    for ($i = 0; $i < $rows; $i++) {
        for ($j = 0; $j < $cols; $j++) {
            $result[$i][$j] = $matrix1[$i][$j] + $matrix2[$i][$j] + $matrix3[$i][$j];
        }
    }

    return $result;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve matrix values from the form and convert them to a 2D array
    $matrixInputA = $_POST['matrixInputA'];
    $matrixInputB = $_POST['matrixInputB'];
    $matrixInputC = $_POST['matrixInputC'];

    $rowsA = explode(";", $matrixInputA);
    $matrixA = array_map(function ($row) {
        return explode(",", $row);
    }, $rowsA);

    $rowsB = explode(";", $matrixInputB);
    $matrixB = array_map(function ($row) {
        return explode(",", $row);
    }, $rowsB);

    $rowsC = explode(";", $matrixInputC);
    $matrixC = array_map(function ($row) {
        return explode(",", $row);
    }, $rowsC);

    // Perform matrix addition
    $resultMatrix = addMatrices($matrixA, $matrixB, $matrixC);
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
            <label for="matrixInputA">Enter values for Matrix A (semicolon for rows, comma for elements):</label>
            <input type="text" name="matrixInputA" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="matrixInputB">Enter values for Matrix B (semicolon for rows, comma for elements):</label>
            <input type="text" name="matrixInputB" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="matrixInputC">Enter values for Matrix C (semicolon for rows, comma for elements):</label>
            <input type="text" name="matrixInputC" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Add Matrices</button> <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong"> View Formulas </button>
    </form>
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">What is Matrix Addition?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <p><p>Addition of matrix is the basic operation performed, to add two or more matrices. Matrix addition is possible only if the order of the given matrices are the same. By order we mean, the number of rows and columns are the same for the matrices. Hence, we can add the corresponding elements of the matrices. But if the order is different then matrix addition is not possible. Suppose A = [a<sub>ij</sub>]<sub>mxn</sub> and B = [b<sub>ij</sub>]<sub>mxn</sub> are two matrices of order m x n, then the addition of A and B is given by;</p>
<p><strong>A + B = [a<sub>ij</sub>]<sub>mxn</sub> + [b<sub>ij</sub>]<sub>mxn</sub> = [a<sub>ij</sub> + b<sub>ij</sub>]<sub>mxn</sub></strong></p>
<p>By recalling the small concept of addition of algebraic expressions, we know that while the addition of algebraic expressions can only be done with the corresponding like terms, similarly the addition of two matrices can be done by addition of corresponding terms in the matrix.</p>
<p>There are basically two criteria that define the addition of a matrix. They are as follows:</p>
<ol>
<li>&nbsp;Consider two matrices A &amp; B. These matrices can be added if (if and only if) the order of the matrices are equal, i.e. the two matrices have the same number of rows and columns. For example, say matrix A is of the order 3 × 4, then the matrix B can be added to matrix A if the order of B is also 3 × 4.</li>
<li>The addition of matrices is not defined for matrices of different sizes.</li>
</ol>
<div class="mathjax-scroll"><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" tabindex="0" ctxtmenu_counter="4" style="font-size: 123.9%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mtable style="min-width: 14.598em;"><mjx-table><mjx-itable><mjx-mtr><mjx-mtd style="text-align: left;"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D443 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mi class="mjx-i" space="3"><mjx-c class="mjx-c1D444 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="4"><mjx-c class="mjx-c3D"></mjx-c></mjx-mo><mjx-mrow space="4"><mjx-mo class="mjx-n"><mjx-stretchy-v class="mjx-c5B" style="height: 3.8em; vertical-align: -1.65em;"><mjx-beg><mjx-c></mjx-c></mjx-beg><mjx-ext><mjx-c></mjx-c></mjx-ext><mjx-end><mjx-c></mjx-c></mjx-end><mjx-mark></mjx-mark></mjx-stretchy-v></mjx-mo><mjx-mtable justify="left" style="min-width: 9.166em;"><mjx-table><mjx-itable><mjx-mtr><mjx-mtd style="padding-right: 0.5em; padding-bottom: 0.2em;"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D44E TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mi class="mjx-i" space="3"><mjx-c class="mjx-c1D457 TEX-I"></mjx-c></mjx-mi><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-right: 0.5em; padding-bottom: 0.2em;"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D44F TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mi class="mjx-i" space="3"><mjx-c class="mjx-c1D458 TEX-I"></mjx-c></mjx-mi><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-bottom: 0.2em;"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D450 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mi class="mjx-i" space="3"><mjx-c class="mjx-c1D459 TEX-I"></mjx-c></mjx-mi><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr><mjx-mtr><mjx-mtd style="padding-right: 0.5em; padding-top: 0.2em; padding-bottom: 0.2em;"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D451 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mi class="mjx-i" space="3"><mjx-c class="mjx-c1D45A TEX-I"></mjx-c></mjx-mi><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding: 0.2em 0.5em;"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D452 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mi class="mjx-i" space="3"><mjx-c class="mjx-c1D45B TEX-I"></mjx-c></mjx-mi><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-top: 0.2em; padding-bottom: 0.2em;"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D453 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mi class="mjx-i" space="3"><mjx-c class="mjx-c1D45C TEX-I"></mjx-c></mjx-mi><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr><mjx-mtr><mjx-mtd style="padding-right: 0.5em; padding-top: 0.2em;"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D454 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mi class="mjx-i" space="3"><mjx-c class="mjx-c1D45D TEX-I"></mjx-c></mjx-mi><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-right: 0.5em; padding-top: 0.2em;"><mjx-mi class="mjx-i"><mjx-c class="mjx-c210E TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mi class="mjx-i" space="3"><mjx-c class="mjx-c1D45E TEX-I"></mjx-c></mjx-mi><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-top: 0.2em;"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D456 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mi class="mjx-i" space="3"><mjx-c class="mjx-c1D45F TEX-I"></mjx-c></mjx-mi><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr></mjx-itable></mjx-table></mjx-mtable><mjx-mo class="mjx-n"><mjx-stretchy-v class="mjx-c5D" style="height: 3.8em; vertical-align: -1.65em;"><mjx-beg><mjx-c></mjx-c></mjx-beg><mjx-ext><mjx-c></mjx-c></mjx-ext><mjx-end><mjx-c></mjx-c></mjx-end><mjx-mark></mjx-mark></mjx-stretchy-v></mjx-mo></mjx-mrow><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr></mjx-itable></mjx-table></mjx-mtable></mjx-math><mjx-assistive-mml unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mtable columnalign="left" columnspacing="1em" rowspacing="4pt"><mtr><mtd><mi>P</mi><mo>+</mo><mi>Q</mi><mo>=</mo><mrow data-mjx-texclass="INNER"><mo data-mjx-texclass="OPEN">[</mo><mtable columnalign="center" columnspacing="1em" rowspacing="4pt"><mtr><mtd><mi>a</mi><mo>+</mo><mi>j</mi></mtd><mtd><mi>b</mi><mo>+</mo><mi>k</mi></mtd><mtd><mi>c</mi><mo>+</mo><mi>l</mi></mtd></mtr><mtr><mtd><mi>d</mi><mo>+</mo><mi>m</mi></mtd><mtd><mi>e</mi><mo>+</mo><mi>n</mi></mtd><mtd><mi>f</mi><mo>+</mo><mi>o</mi></mtd></mtr><mtr><mtd><mi>g</mi><mo>+</mo><mi>p</mi></mtd><mtd><mi>h</mi><mo>+</mo><mi>q</mi></mtd><mtd><mi>i</mi><mo>+</mo><mi>r</mi></mtd></mtr></mtable><mo data-mjx-texclass="CLOSE">]</mo></mrow></mtd></mtr></mtable></math></mjx-assistive-mml></mjx-container></div>
    <div class="mathjax-scroll"><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" tabindex="0" ctxtmenu_counter="7" style="font-size: 123.9%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mtable style="min-width: 6.919em;"><mjx-table><mjx-itable><mjx-mtr><mjx-mtd style="text-align: left;"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D443 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="4"><mjx-c class="mjx-c3D"></mjx-c></mjx-mo><mjx-mrow space="4"><mjx-mo class="mjx-n"><mjx-stretchy-v class="mjx-c5B" style="height: 3.8em; vertical-align: -1.65em;"><mjx-beg><mjx-c></mjx-c></mjx-beg><mjx-ext><mjx-c></mjx-c></mjx-ext><mjx-end><mjx-c></mjx-c></mjx-end><mjx-mark></mjx-mark></mjx-stretchy-v></mjx-mo><mjx-mtable justify="left" style="min-width: 3.5em;"><mjx-table><mjx-itable><mjx-mtr><mjx-mtd style="padding-right: 0.5em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c32"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-right: 0.5em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c34"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c33"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr><mjx-mtr><mjx-mtd style="padding-right: 0.5em; padding-top: 0.2em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c35"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding: 0.2em 0.5em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c37"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-top: 0.2em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c38"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr><mjx-mtr><mjx-mtd style="padding-right: 0.5em; padding-top: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c39"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-right: 0.5em; padding-top: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c36"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-top: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c37"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr></mjx-itable></mjx-table></mjx-mtable><mjx-mo class="mjx-n"><mjx-stretchy-v class="mjx-c5D" style="height: 3.8em; vertical-align: -1.65em;"><mjx-beg><mjx-c></mjx-c></mjx-beg><mjx-ext><mjx-c></mjx-c></mjx-ext><mjx-end><mjx-c></mjx-c></mjx-end><mjx-mark></mjx-mark></mjx-stretchy-v></mjx-mo></mjx-mrow><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr></mjx-itable></mjx-table></mjx-mtable></mjx-math><mjx-assistive-mml unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mtable columnalign="left" columnspacing="1em" rowspacing="4pt"><mtr><mtd><mi>P</mi><mo>=</mo><mrow data-mjx-texclass="INNER"><mo data-mjx-texclass="OPEN">[</mo><mtable columnalign="center" columnspacing="1em" rowspacing="4pt"><mtr><mtd><mn>2</mn></mtd><mtd><mn>4</mn></mtd><mtd><mn>3</mn></mtd></mtr><mtr><mtd><mn>5</mn></mtd><mtd><mn>7</mn></mtd><mtd><mn>8</mn></mtd></mtr><mtr><mtd><mn>9</mn></mtd><mtd><mn>6</mn></mtd><mtd><mn>7</mn></mtd></mtr></mtable><mo data-mjx-texclass="CLOSE">]</mo></mrow></mtd></mtr></mtable></math></mjx-assistive-mml></mjx-container></div>
        <div class="mathjax-scroll"><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" tabindex="0" ctxtmenu_counter="8" style="font-size: 123.9%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mtable style="min-width: 9.079em;"><mjx-table><mjx-itable><mjx-mtr><mjx-mtd style="text-align: left;"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D434 TEX-I"></mjx-c></mjx-mi><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D45B TEX-I"></mjx-c></mjx-mi><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D451 TEX-I"></mjx-c></mjx-mi><mjx-mtext class="mjx-n"><mjx-c class="mjx-cA0"></mjx-c></mjx-mtext><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D444 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="4"><mjx-c class="mjx-c3D"></mjx-c></mjx-mo><mjx-mrow space="4"><mjx-mo class="mjx-n"><mjx-stretchy-v class="mjx-c5B" style="height: 3.8em; vertical-align: -1.65em;"><mjx-beg><mjx-c></mjx-c></mjx-beg><mjx-ext><mjx-c></mjx-c></mjx-ext><mjx-end><mjx-c></mjx-c></mjx-end><mjx-mark></mjx-mark></mjx-stretchy-v></mjx-mo><mjx-mtable justify="left" style="min-width: 3.5em;"><mjx-table><mjx-itable><mjx-mtr><mjx-mtd style="padding-right: 0.5em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c33"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-right: 0.5em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c35"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c37"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr><mjx-mtr><mjx-mtd style="padding-right: 0.5em; padding-top: 0.2em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c38"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding: 0.2em 0.5em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c33"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-top: 0.2em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c34"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr><mjx-mtr><mjx-mtd style="padding-right: 0.5em; padding-top: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c35"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-right: 0.5em; padding-top: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c37"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-top: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c38"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr></mjx-itable></mjx-table></mjx-mtable><mjx-mo class="mjx-n"><mjx-stretchy-v class="mjx-c5D" style="height: 3.8em; vertical-align: -1.65em;"><mjx-beg><mjx-c></mjx-c></mjx-beg><mjx-ext><mjx-c></mjx-c></mjx-ext><mjx-end><mjx-c></mjx-c></mjx-end><mjx-mark></mjx-mark></mjx-stretchy-v></mjx-mo></mjx-mrow><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr></mjx-itable></mjx-table></mjx-mtable></mjx-math><mjx-assistive-mml unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mtable columnalign="left" columnspacing="1em" rowspacing="4pt"><mtr><mtd><mi>A</mi><mi>n</mi><mi>d</mi><mtext>&nbsp;</mtext><mi>Q</mi><mo>=</mo><mrow data-mjx-texclass="INNER"><mo data-mjx-texclass="OPEN">[</mo><mtable columnalign="center" columnspacing="1em" rowspacing="4pt"><mtr><mtd><mn>3</mn></mtd><mtd><mn>5</mn></mtd><mtd><mn>7</mn></mtd></mtr><mtr><mtd><mn>8</mn></mtd><mtd><mn>3</mn></mtd><mtd><mn>4</mn></mtd></mtr><mtr><mtd><mn>5</mn></mtd><mtd><mn>7</mn></mtd><mtd><mn>8</mn></mtd></mtr></mtable><mo data-mjx-texclass="CLOSE">]</mo></mrow></mtd></mtr></mtable></math></mjx-assistive-mml></mjx-container></div>
            <div class="mathjax-scroll"><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" tabindex="0" ctxtmenu_counter="9" style="font-size: 123.9%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mtable style="min-width: 14.099em;"><mjx-table><mjx-itable><mjx-mtr><mjx-mtd style="text-align: left;"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D443 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mi class="mjx-i" space="3"><mjx-c class="mjx-c1D444 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="4"><mjx-c class="mjx-c3D"></mjx-c></mjx-mo><mjx-mrow space="4"><mjx-mo class="mjx-n"><mjx-stretchy-v class="mjx-c5B" style="height: 3.8em; vertical-align: -1.65em;"><mjx-beg><mjx-c></mjx-c></mjx-beg><mjx-ext><mjx-c></mjx-c></mjx-ext><mjx-end><mjx-c></mjx-c></mjx-end><mjx-mark></mjx-mark></mjx-stretchy-v></mjx-mo><mjx-mtable justify="left" style="min-width: 8.667em;"><mjx-table><mjx-itable><mjx-mtr><mjx-mtd style="padding-right: 0.5em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c32"></mjx-c></mjx-mn><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mn class="mjx-n" space="3"><mjx-c class="mjx-c33"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-right: 0.5em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c34"></mjx-c></mjx-mn><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mn class="mjx-n" space="3"><mjx-c class="mjx-c35"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c33"></mjx-c></mjx-mn><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mn class="mjx-n" space="3"><mjx-c class="mjx-c37"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr><mjx-mtr><mjx-mtd style="padding-right: 0.5em; padding-top: 0.2em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c35"></mjx-c></mjx-mn><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mn class="mjx-n" space="3"><mjx-c class="mjx-c38"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding: 0.2em 0.5em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c37"></mjx-c></mjx-mn><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mn class="mjx-n" space="3"><mjx-c class="mjx-c33"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-top: 0.2em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c38"></mjx-c></mjx-mn><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mn class="mjx-n" space="3"><mjx-c class="mjx-c34"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr><mjx-mtr><mjx-mtd style="padding-right: 0.5em; padding-top: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c39"></mjx-c></mjx-mn><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mn class="mjx-n" space="3"><mjx-c class="mjx-c35"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-right: 0.5em; padding-top: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c36"></mjx-c></mjx-mn><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mn class="mjx-n" space="3"><mjx-c class="mjx-c37"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-top: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c37"></mjx-c></mjx-mn><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mn class="mjx-n" space="3"><mjx-c class="mjx-c38"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr></mjx-itable></mjx-table></mjx-mtable><mjx-mo class="mjx-n"><mjx-stretchy-v class="mjx-c5D" style="height: 3.8em; vertical-align: -1.65em;"><mjx-beg><mjx-c></mjx-c></mjx-beg><mjx-ext><mjx-c></mjx-c></mjx-ext><mjx-end><mjx-c></mjx-c></mjx-end><mjx-mark></mjx-mark></mjx-stretchy-v></mjx-mo></mjx-mrow><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr></mjx-itable></mjx-table></mjx-mtable></mjx-math><mjx-assistive-mml unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mtable columnalign="left" columnspacing="1em" rowspacing="4pt"><mtr><mtd><mi>P</mi><mo>+</mo><mi>Q</mi><mo>=</mo><mrow data-mjx-texclass="INNER"><mo data-mjx-texclass="OPEN">[</mo><mtable columnalign="center" columnspacing="1em" rowspacing="4pt"><mtr><mtd><mn>2</mn><mo>+</mo><mn>3</mn></mtd><mtd><mn>4</mn><mo>+</mo><mn>5</mn></mtd><mtd><mn>3</mn><mo>+</mo><mn>7</mn></mtd></mtr><mtr><mtd><mn>5</mn><mo>+</mo><mn>8</mn></mtd><mtd><mn>7</mn><mo>+</mo><mn>3</mn></mtd><mtd><mn>8</mn><mo>+</mo><mn>4</mn></mtd></mtr><mtr><mtd><mn>9</mn><mo>+</mo><mn>5</mn></mtd><mtd><mn>6</mn><mo>+</mo><mn>7</mn></mtd><mtd><mn>7</mn><mo>+</mo><mn>8</mn></mtd></mtr></mtable><mo data-mjx-texclass="CLOSE">]</mo></mrow></mtd></mtr></mtable></math></mjx-assistive-mml></mjx-container></div>
                <div class="mathjax-scroll"><mjx-container class="MathJax CtxtMenu_Attached_0" jax="CHTML" tabindex="0" ctxtmenu_counter="10" style="font-size: 123.9%; position: relative;"><mjx-math class="MJX-TEX" aria-hidden="true"><mjx-mtable style="min-width: 10.432em;"><mjx-table><mjx-itable><mjx-mtr><mjx-mtd style="text-align: left;"><mjx-mi class="mjx-i"><mjx-c class="mjx-c1D443 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="3"><mjx-c class="mjx-c2B"></mjx-c></mjx-mo><mjx-mi class="mjx-i" space="3"><mjx-c class="mjx-c1D444 TEX-I"></mjx-c></mjx-mi><mjx-mo class="mjx-n" space="4"><mjx-c class="mjx-c3D"></mjx-c></mjx-mo><mjx-mrow space="4"><mjx-mo class="mjx-n"><mjx-stretchy-v class="mjx-c5B" style="height: 3.8em; vertical-align: -1.65em;"><mjx-beg><mjx-c></mjx-c></mjx-beg><mjx-ext><mjx-c></mjx-c></mjx-ext><mjx-end><mjx-c></mjx-c></mjx-end><mjx-mark></mjx-mark></mjx-stretchy-v></mjx-mo><mjx-mtable justify="left" style="min-width: 5em;"><mjx-table><mjx-itable><mjx-mtr><mjx-mtd style="padding-right: 0.5em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c35"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-right: 0.5em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c39"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c31"></mjx-c><mjx-c class="mjx-c30"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr><mjx-mtr><mjx-mtd style="padding-right: 0.5em; padding-top: 0.2em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c31"></mjx-c><mjx-c class="mjx-c33"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding: 0.2em 0.5em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c31"></mjx-c><mjx-c class="mjx-c30"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-top: 0.2em; padding-bottom: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c31"></mjx-c><mjx-c class="mjx-c32"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr><mjx-mtr><mjx-mtd style="padding-right: 0.5em; padding-top: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c31"></mjx-c><mjx-c class="mjx-c34"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-right: 0.5em; padding-top: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c31"></mjx-c><mjx-c class="mjx-c33"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd><mjx-mtd style="padding-left: 0.5em; padding-top: 0.2em;"><mjx-mn class="mjx-n"><mjx-c class="mjx-c31"></mjx-c><mjx-c class="mjx-c35"></mjx-c></mjx-mn><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr></mjx-itable></mjx-table></mjx-mtable><mjx-mo class="mjx-n"><mjx-stretchy-v class="mjx-c5D" style="height: 3.8em; vertical-align: -1.65em;"><mjx-beg><mjx-c></mjx-c></mjx-beg><mjx-ext><mjx-c></mjx-c></mjx-ext><mjx-end><mjx-c></mjx-c></mjx-end><mjx-mark></mjx-mark></mjx-stretchy-v></mjx-mo></mjx-mrow><mjx-tstrut></mjx-tstrut></mjx-mtd></mjx-mtr></mjx-itable></mjx-table></mjx-mtable></mjx-math><mjx-assistive-mml unselectable="on" display="inline"><math xmlns="http://www.w3.org/1998/Math/MathML"><mtable columnalign="left" columnspacing="1em" rowspacing="4pt"><mtr><mtd><mi>P</mi><mo>+</mo><mi>Q</mi><mo>=</mo><mrow data-mjx-texclass="INNER"><mo data-mjx-texclass="OPEN">[</mo><mtable columnalign="center" columnspacing="1em" rowspacing="4pt"><mtr><mtd><mn>5</mn></mtd><mtd><mn>9</mn></mtd><mtd><mn>10</mn></mtd></mtr><mtr><mtd><mn>13</mn></mtd><mtd><mn>10</mn></mtd><mtd><mn>12</mn></mtd></mtr><mtr><mtd><mn>14</mn></mtd><mtd><mn>13</mn></mtd><mtd><mn>15</mn></mtd></mtr></mtable><mo data-mjx-texclass="CLOSE">]</mo></mrow></mtd></mtr></mtable></math></mjx-assistive-mml></mjx-container></div>


                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                   
                </div>
                </div>
            </div>
            </div>
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
