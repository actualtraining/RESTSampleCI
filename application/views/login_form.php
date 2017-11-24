<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <?php echo form_open('MahasiswaClient/login'); ?>
        <label for="username">Username</label><br>
        <input type="text" name="username"><br><br>
        <label for="password">Password</label><br>
        <input type="password" name="password"><br><br>
        <?php echo form_submit('submit','Simpan'); ?>
        <?php echo anchor('MahasiswaClient','Kembali'); ?>
    <?php echo form_close();?>
    </body>
</html>