<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Detail Peminjaman</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="<?php echo base_url('Welcome');?>"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active">Detail Peminjaman</a></li>
        </ul>
      </div>
      <?php
        $success = $this->session->flashdata('success');
        if ($success) {
            echo '<div class="alert alert-success text-center"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong> '.$success.'</div>';
      } ?>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-title-w-btn">
                    <!-- <h2 class="title mb-3 line-head text-success" style="text-align: center; width: 100%;"><u>No Faktur :</u> <span class="badge badge-info"><?php echo $no_faktur;?></span></h2> -->
            </div>
           <div align ="Right"> <a class="btn btn-primary icon-btn" href="<?php echo base_url('Peminjaman/createdet');?>"><i class="fa fa-plus"></i>Tambah Detail Peminjaman</a></div>

          <table cellspacing="0"  width="70%">
             <div class="tile-title-w-btn">
               <h3 class="title">Detail Peminjaman Buku</h3>
             </div>
             <tr>
                <td width="25%"><b> Nama Peminjam</b></td>
                <td><b>:</b></td>
                <td><b><?php foreach ($data_murid->result_array() as $value) 
                     {
                       if ($value['murid_nip']==$data_pinjam['nip_murid']) 
                       {
                          echo $value['murid_nama'];
                       }
                     } ?>
                </b></td>
              </tr>  
                <tr>
                <td width="25%"><b> Tanggal Pinjam</b></td>
                <td><b>:</b></td>
                <td><b><?php $oridate=$data_pinjam['tgl_peminjaman'];
                          $date=date("d-M-Y",strtotime($oridate));
                          echo $date;
                        ?>
                </b></td>
              </tr>  
              <tr>
                <td width="25%"><b> Tanggal Kembali</b></td>
                <td><b>:</b></td>
                <td><b><?php $oridate=$data_pinjam['tgl_pengembalian'];
                          $date=date("d-M-Y",strtotime($oridate));
                          echo $date;
                        ?>
                </b></td>
              </tr>  
          </table>
          <br />

            <div class="tile-body">
              <div class="table-responsive">
              <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                        <tr align="center" >
                            <th>No</th>
                            <th>ID Peminjaman</th>
                            <th>Buku</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach($data_detail_pinjam as $d) {
                            // $get_sisa = number_format($d->total-$d->jml_bayar,0,',','.'); 
                            $no = $no++;?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <!-- <td><?php echo $d->no_faktur ?></td> -->
                            <td><?php echo $d->pinjam_id ?></td>
                            <td><?php echo $d->buku_nama ?></td>
                            <td>
                            <a class="btn btn-sm btn-danger" href="<?php echo site_url('Peminjaman/delete_pinjam_dtl/'.$d->p_detail_id) ?>" onclick="return confirm('Apakah Anda yakin ?');"><i class="fa fa-trash"></i><span>Hapus</span></a>
                            </td>
    
                        </tr>
                        <?php } ?>
                    </tbody>  
                </table>
                </div>
            </div>
            <div class="tile-footer">
              <div align ="Right"> <a href="<?php echo base_url('Peminjaman') ?>" class="btn btn-sm btn-danger"><i class="fa fa-times-circle"></i>Kembali</a></div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
  </body>
</html>