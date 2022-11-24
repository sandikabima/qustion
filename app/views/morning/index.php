<div class="container mt-4">
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash();?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
      <form action="<?=BASEURL;?>/Morning/cari" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Cari Morning.." name="keyword" id="keyword" autocomplete="off">
          <div class="input-group-append">
            <button class="btn btn-success" type="submit" id="tombolCari">Cari</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <button type="button" class="btn btn-success tambahData" data-toggle="modal" data-target="#exampleModal">
        Tambah
      </button>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <h3>Data Morning Report</h3>
      <table class="table mt-2">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Pimpinan</th>
            <th scope="col">Operator</th>
            <th scope='col'>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=0; foreach($data['morning'] as $morning) : $no++ ?>
          <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $morning['tanggal']?></td>
            <td><?= $morning['pimpinan']?></td>
            <td><?= $morning['moderator']?></td>
            <td><a href="<?=BASEURL;?>/Morning/tambah_rajal/<?=$morning['id'];?>" class='btn btn-success'>Rajal</a> <a
                href="" class='btn btn-warning'>Kasir / Casemix </a> <a href="" class='btn btn-success'> Labor </a> <a
                href="" class='btn btn-warning'> Ranap </a> <a href="<?=BASEURL;?>/Morning/edit/<?=$morning['id'];?>"
                class='btn btn-primary tampilModalUbah' data-toggle="modal" data-target="#exampleModal"
                data-id="<?=$morning['id'];?>">Update</a> <a href="<?=BASEURL;?>/Morning/hapus/<?=$morning['id']?>"
                class='btn btn-danger' onclick="return confirm('yakin?');">Delete</a></td>
          </tr>
          <?php endforeach ?>
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