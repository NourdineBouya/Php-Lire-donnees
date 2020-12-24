
<?php 


$host = "localhost";
$user = "root";
$pass = "AAAA";
$dbname ="projet1";

try {
    $dsn = "mysql:host=" . $host . ";dbname=" . $dbname;
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  } catch(PDOException $e) {
    echo "DB Connection Failed: " . $e->getMessage();
  }

  $stmt = $pdo->query('SELECT * FROM produits1');

        
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <table class="table">
    <thead>
            <th>Code Produit</th>
            <th>Nom Du Produit</th>
            <th>Qty Produit</th>
    
    </thead>

    <tbody>
    
    <?php      while($row = $stmt->fetch())
                {?>                <tr>
                                    <td><?php echo $row->Code;?></td>
                                    <td><?php echo $row->Designation;?></td>
                                    <td><?php echo $row->Qty;?> </td>
                                                               
                                        <td>
                                        
                             <a href="edit.php?id=<?php echo $row->id;?>"><button class="btn btn-primary" >Modifier <i class="far fa-edit"></i> </button></a>
                             <a href="delete.php?id=<?php echo $row->id;?>"><button class="btn btn-danger">Suprimer <i class="fas fa-trash-alt"></i></button></a>
                                           
                                   
                                        </td>
                                        </tr>
                        <?php } ?>  
    </tbody>
    
    </table>
</body>
</html>