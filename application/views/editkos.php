<?php
echo form_open('kos/edit/');
?>

<table border='1'>
    <tr>
        <td>no_kamar</td>
        <td><?php echo form_input('no_kamar',$kos['no_kamar']); ?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td><?php echo form_input('nama',$kos['nama']); ?> </td>
    </tr>
    <tr>
        <td>tempat_tgl_lahir</td>
        <td><?php echo form_input('tempat_tgl_lahir',$kos['tempat_tgl_lahir']); ?> </td>
    </tr>
    <tr>
        <td>alamat_asal</td>
        <td><?php echo form_input('alamat_asal',$kos['alamat_asal']); ?> </td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit('submit', 'Update'); ?>
            <?php echo anchor('kos', 'Kembali'); ?>
        </td>
    </tr>
</table>
<?php echo form_close(); 
?>