<!-- Modal Ganti Password -->
<div class="modal fade" id="modalGP" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Ganti Password -->
<div class="modal fade" id="modalCP" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pilih Produk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $produk = mysqli_query($koneksi, "SELECT * FROM tbl_produk ORDER BY nama_produk ASC");
              while ($p = mysqli_fetch_assoc($produk)) {
              ?>
                <tr>
                  <td><?= $p['nama_produk'] ?></td>
                  <td>Rp.<?= number_format($p['harga']) ?></td>
                  <td>
                    <a href="proses/tambah-keranjang.php?id=<?= $p['id_produk'] ?>"><button class="btn btn-sm btn-success"><i class="bi bi-cart-plus"></i></button></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalLaporan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Cetak Laporan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="cetak/laporan.php" method="GET" target="_blank">
          <div class="mb-3">
            <label>Dari Tanggal</label>
            <input type="date" name="dari" class="form-control">
          </div>
          <div class="mb-3">
            <label>Sampai Tanggal</label>
            <input type="date" name="sampai" class="form-control">
          </div>
          <div class="mb-3 d-flex justify-content-end">
            <button class="btn btn-sm btn-success">Cetak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>