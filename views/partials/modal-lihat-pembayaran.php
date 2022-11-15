<!-- Modal -->
<div class="modal fade" id="detail-pembayaran" tabindex="-1" role="dialog" aria-labelledby="detail-pembayaran" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="nama" value=": <?= $data->nama; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="bank" class="col-sm-2 col-form-label">Bank</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="bank" value=": <?= $data->bank; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="tanggal" value=": <?= $data->tanggal; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="jumlah" value=": Rp. <?= number_format($data->jumlah); ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="foto" class="col-sm-10 col-form-label">Bukti Pembayaran</label>
    <div class="col-sm-10">
      <img class="img-fluid" src="../../assets/img/bukti/<?= $data->bukti; ?>" alt="">
    </div>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>