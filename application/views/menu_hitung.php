<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Codeigniter</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Load File Jquery -->  <script src="<?php echo base_url("assets/js/jquery-1.10.2.js"); ?>" type="text/javascript"></script>
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
        <h1>CodeIgniter 2.0 dan Form!</h1>
        <!--<div>TODO write content</div>-->
        <p>Silahkan pilih menu dibawah ini.</p>
        <ul>
            <li><?php echo anchor('hitung/perkalian','Perkalian');?>
            <li><?php echo anchor('hitung/pembagian','Pembagian');?>
            <li><a href="<?= base_url('hitung/pengurangan')?>">Pengurangan</a></li>
        </ul>
        <p><br/>Page rendered in {elapsed_time} seconds</p>
          <form method="post" action="<?php echo base_url("index.php/siswa/save"); ?>">    <!-- Buat tombol untuk menabah form data -->    
            <button type="button" id="btn-tambah-form">Tambah Data Form</button>    <button type="button" id="btn-reset-form">Reset Form</button><br><br>        
            <b>Data ke 1 :</b>    
            <table>      
                <tr>        
                    <td>NIS</td>        
                    <td><input type="text" name="nis[]" required></td>      
                </tr>      
                <tr>        
                    <td>Nama</td>        
                    <td><input type="text" name="nama[]" required></td>      
                </tr>      
                <tr>        
                    <td>Telepon</td>        
                    <td><input type="text" name="telp[]" required></td>      
                </tr>      
                <tr>        
                    <td>Alamat</td>        
                    <td><textarea name="alamat[]" required></textarea></td>      
                </tr>    
            </table>    
            <br><br>    
            <div id="insert-form"></div>        
            <hr>    
            <input type="submit" value="Simpan">  
        </form>    
        <!-- Kita buat textbox untuk menampung jumlah data form -->  
        <input type="hidden" id="jumlah-form" value="1">

               <script>  
               $(document).ready(function(){ // Ketika halaman sudah diload dan siap
                    $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik 
                    var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form      
                    var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
                  $("#insert-form").append("<b>Data ke " + nextform + " :</b>" +        
                    "<table>" +        
                    "<tr>" +       
                     "<td>NIS</td>" +        
                     "<td><input type='text' name='nis[]' required></td>" +        
                     "</tr>" +        
                     "<tr>" +        
                     "<td>Nama</td>" +        
                     "<td><input type='text' name='nama[]' required></td>" +        
                     "</tr>" +        
                     "<tr>" +        
                     "<td>Telepon</td>" +        
                     "<td><input type='text' name='telp[]' required></td>" +        
                     "</tr>" +        
                     "<tr>" +        
                     "<td>Alamat</td>" +        
                     "<td><textarea name='alamat[]' required></textarea></td>" +        
                     "</tr>" +        
                    "</table>" +        
                    "<br><br>");
                        $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform    
                    });
                    // Buat fungsi untuk mereset form ke semula    
                    $("#btn-reset-form").click(function(){      
                    $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form     
                    $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1    
                });  
                });

                </script>
    </body>
</html>