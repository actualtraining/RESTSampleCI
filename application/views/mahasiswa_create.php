<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h2>Tambah Mahasiswa</h2>
    <?php echo form_open('MahasiswaClient/create'); ?>
        <label for="nim">Nim</label><br>
        <input type="text" name="nim"><br><br>
        <label for="nama">Nama</label><br>
        <input type="text" name="nama"><br><br>
        <label for="email">Email</label><br>
        <input type="email" name="email"><br><br>
        <label for="ipk">IPK</label><br>
        <input type="text" name="ipk"><br><br>
        <?php echo form_submit('submit','Simpan'); ?>
        <?php echo anchor('MahasiswaClient','Kembali'); ?>
    <?php echo form_close();?>
</body>
</html>