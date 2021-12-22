<a href= "http://localhost/restful-server1/kos/create">Tambah Data</a>
<table border="1">
    <tr>
        <th>No Kamar</th>
        <th>Nama</th>
        <th>Tempat Tanggal Lahir</th>
        <th>Alamat Asal</th>
    </tr>
    <?php
    foreach($kos as $ks){
        $no_kamar= $ks['no_kamar'];
        $nama= $ks['nama'];
        $tempat_tgl_lahir= $ks['tempat_tgl_lahir'];
        $alamat_asal= $ks['alamat_asal'];

    echo "<tr>
    <td>$no_kamar</td>
    <td>$nama</td>
    <td>$tempat_tgl_lahir</td>
    <td>$alamat_asal</td>
    <td>
    ". anchor('kos/edit/'.$no_kamar, 'Edit')."
    ". anchor('kos/delete/'.$no_kamar, 'Delete')."
    </td>
    </tr>";  
          
    }
    ?>
</table>