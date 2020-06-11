<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-plus"></i> Add Data Murid</h1>
          <p>Form Murid</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('Welcome');?>"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('Murid');?>">Murid</a></li>
          <li class="breadcrumb-item">Add Murid</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="<?php echo base_url('Murid/insert_murid'); ?>" enctype="multipart/form-data" method="post">
            <div class="row">
              <div class="col-lg-6">
                  <div class="form-group">
                    <label>NIP Murid</label>
                     <input class="form-control" name="murid_nip" placeholder="Masukkan NIP Murid" required oninvalid="this.setCustomValidity('Kolom NIP Murid harus diisi')" oninput="setCustomValidity('')">
                     <?= form_error('buku_id', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Nama Murid</label>
                     <input class="form-control" name="murid_nama" placeholder="Masukkan Nama Murid" required oninvalid="this.setCustomValidity('Kolom nama murid harus diisi')" oninput="setCustomValidity('')">
                  </div>
                  <div class="form-group">
                    <label>Telepon</label>
                     <input class="form-control" name="murid_telp" placeholder="Masukkan Telepon" required oninvalid="this.setCustomValidity('Kolom Telepon harus diisi')" oninput="setCustomValidity('')">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                     <input class="form-control" name="murid_email" placeholder="Masukkan Email" required oninvalid="this.setCustomValidity('Kolom Email harus diisi')" oninput="setCustomValidity('')">
                  </div>
                  <div class="form-group">
                    <label>Alamat</label>
                     <input class="form-control" name="murid_alamat" placeholder="Masukkan Alamat" required oninvalid="this.setCustomValidity('Kolom Alamat harus diisi')" oninput="setCustomValidity('')">
                  </div>
              </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-check-circle"></i>Submit</button>
              <a href="<?php echo base_url('Murid') ?>" class="btn btn-danger"><i class="fa fa-times-circle"></i>Cancel</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </main>

    <script type="text/javascript">
      
      $('#demoSelect').select2();
    </script>