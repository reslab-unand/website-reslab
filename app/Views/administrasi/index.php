<div id="form-container">
    <h2>Form Peminjaman Barang</h2>
    <!-- <div> -->
    <form id="form-peminjaman" action="/administrasi/surat" method="POST" enctype="application/x-www-form-urlencoded">

        <h3>Data Diri</h3>
        <div class="form-control">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="Nama Mahasiswa" autocomplete="off" required>
        </div>

        <div class="form-control">
            <label for="nim">NIM</label>
            <input type="text" name="nim" id="nim" placeholder="NIM Mahasiswa" autocomplete="off" required>
        </div>

        <div class="form-control">
            <label for="nohp">No HP</label>
            <input type="text" name="nohp" id="nohp" placeholder="Nomor HP Mahasiswa" autocomplete="off" required>
        </div>

        <h3>detail peminjaman</h3>
        <div class="form-control">
            <label for="jenis">Jenis Peminjaman</label>
            <input type="text" name="jenis" id="jenis" list="list-jenis" placeholder="Pilih Jenis Peminjaman" autocomplete="off" required>
            <datalist id="list-jenis">
                <option value="Peminjaman Alat/komponen Non TA">Non TA</option>
                <option value="Peminjaman Alat/komponen TA">TA</option>
            </datalist>
        </div>
        <div class="form-control">
            <label for="tujuan">Tujuan Peminjaman</label>
            <input type="text" name="tujuan" id="tujuan" list="list-tujuan" placeholder="Pilih Tujuan Peminjaman" autocomplete="off" required>
            <datalist id="list-tujuan">
                <option value="Penelitian">Penelitian</option>
                <option value="Tugas Kuliah">Tugas Kuliah</option>
                <option value="Lomba">Lomba</option>
            </datalist>
        </div>
        <h3>Data Peminjaman</h3>
        <div class="form-control">
            <table id="table-komponen">
                <thead>
                    <tr>
                        <th width="50%">Nama Komponen/Barang</th>
                        <th width="35%">Jumlah</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody id="list-komponen">

                </tbody>
            </table>
            <!-- <div id="list-komponen"> -->
        </div>
        <br>
        <button type="button" id="tambah">Tambah Komponen</button>
        <br>
        <br>
        <button type="submit" name="submit" id="submit" style="width:100%">Kirim</button>
</div>


</form>
<!-- </div> -->
</div>

<script>
    let listKkomponen = document.querySelector("#list-komponen");
    let tableKomponen = document.querySelector("#table-komponen");
    let checkKomponen = document.querySelector(".komponen");
    let submitButton = document.querySelector("#submit");

    let add = document.querySelector("#tambah");
    let index = 0;
    add.addEventListener("click", function() {
        let code = `
                <tr>
                    <td>
                        <input type="text" name="data[${index}][komponen]" class="komponen" autocomplete="off" required>
                    </td>
                    <td>
                        <input type="number" name="data[${index}][jumlah]" class="komponen" autocomplete="off" required>
                    </td>
                    <td>
                        <button type="button" onClick="deleteKomponen(this)" style="width:100%;background-color:red;">delete</button>
                    </td>
                </tr>`;
        listKkomponen.insertAdjacentHTML('beforeend', code);

        index += 1;
    });

    function deleteKomponen(input) {
        let i = input.parentNode.parentNode.rowIndex;
        tableKomponen.deleteRow(i);
    }
    const form = document.getElementById('surat-peminjaman');
    form.addEventListener('keypress', function(e) {
        if (e.keyCode === 13) {
            e.preventDefault();
        }
    });
</script>