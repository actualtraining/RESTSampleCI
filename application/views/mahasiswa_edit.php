<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit Mahasiswa</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <h2>Edit Mahasiswa</h2>
        <?php echo form_open('MahasiswaClient/edit'); ?>
        <?php echo form_hidden('nim',$mahasiswa[0]->nim); ?>
        <label for="nim">Nim</label><br>
        <?php echo form_input('',$mahasiswa[0]->nim,"disabled"); ?><br><br>
        <<label for="nama">Nama</label><br>
        <?php echo form_input('nama',$mahasiswa[0]->nama); ?><br><br>
        <label for="email">Email</label><br>
        <?php echo form_input('email',$mahasiswa[0]->email);?><br><br>
        <label for="ipk">IPK</label><br>
        <?php echo form_input('ipk',$mahasiswa[0]->ipk); ?><br><br>
        <?php echo form_submit('submit','Simpan')?>
        <?php echo anchor('MahasiswaClient','Kembali') ?>
        <?php echo form_close();?>
    </body>
</html>