<h1>Daftar Asisten</h1>
<table>
    <thead>
        <tr>
            <th>Nama Asisten</th>
            <th>Register Asisten</th>
            <th>TTL Asisten</th>
            <th>Jabatan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($asisten as $a) : ?>
            <tr>
                <td><?= $a["nama_asisten"]; ?></td>
                <td><?= $a["reg_asisten"]; ?></td>
                <td><?= $a["ttl_asisten"]; ?></td>
                <td><?= $a["jabatan_asisten"]; ?></td>
                <td><?= $a["status_asisten"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>