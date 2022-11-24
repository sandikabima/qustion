<div class="container mt-4">
<div class="row mb-3">
    <div class="col-lg-6">
      <button type="button" class="btn btn-success tambahData" data-toggle="modal" data-target="#exampleModal">
        Tambah
      </button>
    </div>
  </div>
	<div class="row">
		<div class="col-lg-12">
			<h3>Data List KPI</h3>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Jam</th>
						<th scope="col">Aktivitas</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>01-April-22</td>
						<td>08.00</td>
						<td>Membuat Jadwal Dokter</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Form Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?=BASEURL;?>/Morning/tambah" method='post'>
          <input type="hidden" name='id' id='id'>
          <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="text" class='form-control' id='tanggal' name='tanggal' autocomplete='off'>
          </div>
          <div class="form-group">
            <label for="pimpinan">Pimpinan</label>
            <input type="text" name='pimpinan' class='form-control' id='pimpinan' autocomplete='off'>
          </div>
          <div class="form-group">
            <label for="operatro">Operator</label>
            <input type="text" class='form-control' id='moderator' name='moderator' autocomplete='off'>
            <input type="hidden" name='status' id='status' value='1'>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>