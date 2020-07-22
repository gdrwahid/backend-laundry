<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Codeigniter</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            body {
                background-color: #fff;
                margin: 40px;
                font-family: Lucida Grande, Verdana, Sans-serif;
                font-size: 14px;
                color: #4f5155;
            }
           
            a {
                color: #003399;
                background-color: transparent;
                font-weight: normal;
            }
           
            h1 {
                color: #444;
                background-color: transparent;
                border-bottom: 1px solid #D0D0D0;
                font-size: 16px;
                font-weight: bold;
                margin: 24px 0 2px 0;
                padding: 5px 0 6px 0;
            }
        </style>
    </head>
    <body>
        <h1>Perkalian</h1>
        <?php echo validation_errors();?>
        <form action="<?php echo base_url('hitung/pengurangan')?>" method="post">
            <input type="text" name="v1" value=""> - <input type="text" name="v2" value="">
            <button type="submit">Hitung</button>
        </form>
        Hasil : <?php echo $hasil;?>
 
       
        <p><br/>Page rendered in {elapsed_time} seconds</p>


        <table border="1">
            <tr>
              <th>Buah</th>  
              <th>Kategori</th>
            </tr>
            <?php foreach($arr as $arr) { ?>     
            <tr>           
            
                <td><?= $arr[0]?></td>  
                <td><?= $arr[1]?></td> 
                              
            </tr>
           <?php } ?>  
        </table>
        <?php
        $tgl1 = "2013-01-23";// pendefinisian tanggal awal
            $tgl2 = date('Y-m-d', strtotime('+6 days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 6 hari
            echo $tgl2;
            ?>
    </body>
</html>