<?php
session_start();

try {
    $pdo = new PDO('mysql:host=localhost;dbname=vis', 'root', '');
} catch (PDOException $e) { 
    print "Error! " . $e->getMessage() . "<br>";
    die();
}

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['category']) && $_GET['category'] != "") {
    $tableExists = false;
    $category = $_GET['category'];
    $tables = $pdo->query("SHOW TABLES")->fetchAll();
    $dbtables = array ();
    
    foreach ($tables as $table) { 
        $dbtables[] = $table[0];
        if ($table[0] == $category) { 
            $tableExists = true;
            break;
        } 
    }

    if (!$tableExists) {
        header("Location: index.php");
        exit;
    }

} else {
    header("Location: index.php");
    exit;
}

if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
    $page_no = $_GET['page_no'];
} else {
    $page_no = 1;
}

$amount = $pdo->query("SELECT count(*) FROM $category")->fetchColumn();

$count = 0;

$total_records_per_page = 7;
$offset = ($page_no - 1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacent = "2"; 
$total_no_of_pages = ceil($amount / $total_records_per_page);
$second_last = $total_no_of_pages - 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $category ?></title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="alles">
        <table> 
            <tr>
                <td><img src="img/<?= $category ?>.jpg"></td>
                <?php if ($page_no > 1) { ?>
                <td><a href="<?= "?category=$category&page_no=$previous_page"; ?>"><img src="img/pijltje-links.png"></a></td>
                <?php } else { ?>
                    <td class="leeg">&nbsp;</td>
                <?php } ?>
                <td><a href="/"><img src="img/home.png"></a></td>
                <td><img src="img/bit-academy.svg"></td> 
            </tr>

            <?php

            $views = $pdo->query("SELECT * FROM $category LIMIT $offset, $total_records_per_page");

            if ($amount > 8) {
                $verwijzing = true;
            } else { 
                $verwijzing = false;
            }


            foreach ($views as $dobbel) { 
                $id = $dobbel['id'];
                $title = $dobbel['title'];

                for ($row = 0; $row <= 1; $row++) { 
                    $count++;
                    if ($count > 2) { 
                        break;
                    }

                    echo '<tr>';
                    
                    for ($col = 0; $col < 4; $col++) { 
                        $filmpje = $pdo->prepare("SELECT path FROM $category where id = ?");
                        $filmpje->execute([$id]);
                        $result = $filmpje->fetch();

                        if ($col == 3 && $row == 1 && $verwijzing == true && $page_no < $total_no_of_pages) { 
                            echo '<td>
                                    <a href="view.php?category='. $category . '&page_no=' . $next_page . '"><img src="img/pijltje-rechts.png"></a>
                                </td>';
                        } else {
                            try {
                                if ($result == false) { 
                                    exit;
                                } else { 
                                    $path = $result['path'];
                                }
                                
                                echo "<td> 
                                        <video width='250' height='200' controls>
                                            <source src='$path' type='video/mp4'>
                                        </video>
                                    </td>";
                            } catch (\Exception $e) {
                                echo '<td class="leeg">&nbsp;</td>';
                            }
                            
                            $id++;
                        }
                    } 
                    echo '</tr>';    
                }
            }
            ?>
        </table>
    </div>
</body>  
</html> 