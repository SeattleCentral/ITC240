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
            <?php for ($i = 0; $i <= 12; $i++): ?>
                <tr>
                    <?php for ($j = 0; $j <= 12; $j++): ?>
                        <?php if ($i * $j == 0): ?>
                            <th>
                                <?php if ($i == 0 && $j == 0): ?>
                                <?php elseif ($i == 0): ?>
                                    <?php echo $j; ?>
                                <?php elseif ($j == 0): ?>
                                    <?php echo $i; ?>
                                <?php endif ?>
                            </th>
                        <?php else: ?>
                            <td>
                                <?php echo $i * $j; ?>
                            </td>
                        <?php endif ?>
                        
                    <?php endfor ?>
                </tr>
            <?php endfor ?>
        </tbody>
    </table>
</body>
</html>