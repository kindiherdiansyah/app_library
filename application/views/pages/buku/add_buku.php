<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-plus"></i> Add Data Buku Perpustakaan</h1>
          <p>Form Buku Perpustakaan</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('Welcome');?>"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('Buku');?>">Buku Perpustakaan</a></li>
          <li class="breadcrumb-item">Add Buku Perpustakaan</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <form action="<?php echo base_url('Buku/insert_buku'); ?>" enctype="multipart/form-data" method="post">
            <div class="row">
              <div class="col-lg-6">
                  <div class="form-group">
                    <label>Kode Buku</label>
                     <input class="form-control" name="buku_id" placeholder="Masukkan id buku" required oninvalid="this.setCustomValidity('Kolom id buku harus diisi')" oninput="setCustomValidity('')">
                     <?= form_error('buku_id', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <label>Nama Buku</label>
                     <input class="form-control" name="buku_nama" placeholder="Masukkan Nama buku" required oninvalid="this.setCustomValidity('Kolom nama buku harus diisi')" oninput="setCustomValidity('')">
                  </div>
                  <div class="form-group">
                    <label>Jumlah Buku</label>
                    <input class="form-control" type="number" name="buku_qty" placeholder="Masukkan Jumlah buku">
                  </div>
                  <div class="form-group">
                    <label>Status Buku</label>
                    <!-- <div class="col-md-9"> -->
                            <div class="animated-radio-button">
                              <label>
                                <input type="radio" name="buku_status" value="1" <?php if($this->input->post('buku_status') == 1) {echo 'checked';} ?> ><span class="label-text">Tersedia</span>
                              </label>
                            </div>
                             <div class="animated-radio-button">
                              <label>
                                <input type="radio" name="buku_status" value="0" <?php if($this->input->post('buku_status') == 0) {echo 'checked';} ?> ><span class="label-text">Tidak Tersedia</span>
                              </label>
                            </div>
                        <!-- </div> -->
                  </div>
                
              </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-check-circle"></i>Submit</button>
              <a href="<?php echo base_url('Buku') ?>" class="btn btn-danger"><i class="fa fa-times-circle"></i>Cancel</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </main>

    <script type="text/javascript">
      
      $('#demoSelect').select2();
    </script>