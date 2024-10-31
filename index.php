<?php 
include "koneksi.php";
include "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Penjualan</title>
</head>
<body>
  <table border="1">
    <caption>
      Data Stok Barang
      <form action="" method="get">
          <select name="filter">
              <?php
              $q_kategori = "SELECT Kategori FROM barang GROUP BY Kategori";  
              $result_kategori = $mysqli->query($q_kategori);
              while($r_kategori = $result_kategori->fetch_assoc()){
              ?>
                  <option value="<?= $r_kategori['Kategori'] ?>"><?= $r_kategori['Kategori'] ?></option>
              <?php
              }
                ?>  
            </select>
            <input type="submit" value="Filter" />
        </form>  
      </caption>
      <tr>
          <th>no</th>
          <th>nama barang</th>
          <th>harga barang</th>
          <th>stok barang</th>
          <th>Kategori</th>
      </tr>
      <?php
      if(isset($_GET['filter'])){
          $query = "SELECT * FROM barang where Kategori = '$_GET[filter]'";
      }else{
          $query = "SELECT * FROM barang";
      } 
      $result = $mysqli->query($query);
      $no=0;
      while($row = $result->fetch_assoc()){
          $no++;
      ?>
          <tr>
              <td><?= $no;?></td>
              <td><?= $row['nama barang'];?></td>
              <td><?= FormatRupiah($row['harga barang']);?></td>
              <td><?= $row['stok barang'];?></td>
              <td><?= $row['kategori'];?></td> 
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>