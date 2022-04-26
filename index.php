<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIS</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="alles">
        <table> 
            <tr>
                <td><img src="img/home.png"></td>
                <td><img src="img/staal.jpg"></td>
                <td><img src="img/metaal.jpg"></td>
                <td><img src="img/bit-academy.svg"></td>
            </tr>
            <tr>
                <td><a href="view.php?category=dobbelsteen"><img src="img/dobbelsteen.jpg"></a></td>
                <td><a href="view.php?category=blikjespers"><img src="img/blikjespers.jpg"></a></td>
                <td><a href="view.php?category=brug"><img src="img/brug.jpg"></a></td>
                <td><a href="view.php?category=vuurkorf"><img src="img/vuurkorf.jpg"></a></td>
            </tr>
            <tr>
                <td><a href="view.php?category=stenenklem"><img src="img/stenenklem.jpg"></a></td>
                <td><a href="view.php?category=lampje"><img src="img/lampje.jpg"></a></td>
                <td><a href="veiligheid.html"><img src="img/veiligheid.png"></a></td>
                <td><a href="algemeen.html"><img src="img/algemeen.png"></a></td>
            </tr>
        </table>
    </div>
</body>
</html>