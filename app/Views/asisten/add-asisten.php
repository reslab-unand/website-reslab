<form action="<?= base_url("asisten/add-asisten"); ?>" method="POST">
    <?= csrf_field() ?>

    <label for="nama-asisten">Nama Asisten</label>
    <input type="input" name="nama-asisten" id="nama-asisten">
    <br>
    <style>
        #nama-asisten {
            text-transform: capitalize;
        }
    </style>

    <label for="reg-asisten">No. Register Asisten</label>
    <input type="input" name="reg-asisten" id="reg-asisten">
    <br>

    <label for="ttl-asisten">TTL Asisten</label>
    <input type="input" name="ttl-asisten" id="ttl-asisten">
    <br>

    <label for="jabatan-asisten">Jabatan Asisten</label>
    <input type="input" name="jabatan-asisten" id="jabatan-asisten">
    <br>

    <label for="status-asisten">Status Asisten</label>
    <input type="input" name="status-asisten" id="status-asisten">
    <br>

    <label for="card-id">Card ID</label>
    <input type="input" name="card-id" id="card-id">
    <br>

    <input type="submit" name="submit" value="Create news item">
</form>