<?php
    // Input date in "mm/dd/yyyy" format
    // Output fancy date description.
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fancy Date Formatter</title>
</head>
<body>
    <h1>
        Fancy Date Formatter
    </h1>
    
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['date'])) {
                // $userDate = new DateTime($_POST['date']);
                $britishDate = DateTime::createFromFormat(
                    "d/m/Y", $_POST["date"]
                );
                
                echo "<strong>The user said: ".
                     //  $userDate->format("F jS, Y").
                     $britishDate->format("F jS, Y").
                     "</strong>";
            }
        }
    
    ?>
    
    <form method="post" action="" >
        <p>
            <label>Date</label>
            <input type="text" name="date" value="" placeholder="dd/mm/yyyy">
        </p>
        <p>
            <button type="submit">
                Submit
            </button>
        </p>
    </form>
</body>
</html>