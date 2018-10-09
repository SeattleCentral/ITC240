<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        td, th {
           width: 25px;
           height: 25px;
           padding: 6px;
           border: 1px solid gray;
           text-align: center;
        }
        th {
            background-color: #DDD;
        }
        table {
           border-spacing: 0;
           border-collapse: collapse;
        }
    </style>
</head>
<body>
    <table>
        <tbody>
            <?php for ($i = 1; $i <= 12; $i++): ?>
                <tr>
                    <?php for ($j = 1; $j <= 12; $j++): ?>
                        <td>
                            <?php echo $i * $j; ?>
                        </td>
                    <?php endfor ?>
                </tr>
            <?php endfor ?>
        </tbody>
    </table>
</body>
</html>