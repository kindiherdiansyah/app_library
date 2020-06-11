<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Data Peminjaman</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="<?php echo base_url('Welcome');?>"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active">Data Peminjaman</a></li>
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
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <div class="tile-title-w-btn">
                    <h3 class="title">Tabel Peminjaman</h3>
                    <p><a class="btn btn-primary icon-btn" href="<?php echo base_url('Peminjaman/create');?>"><i class="fa fa-plus"></i>Tambah Data </a></p>
                    
                  </div>
                  <thead>
                        <tr align="center" >
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Lama Peminjaman</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach($Pinjam as $p) {
                            $no = $no++;?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $p->murid_nama ?></td>
                            <td><?php echo date('d-M-Y', strtotime($p->tgl_peminjaman)); ?></td>
                            <td><?php echo date('d-M-Y', strtotime($p->tgl_pengembalian)); ?></td>
                            <td><?php echo date('d-M-Y', strtotime($p->tgl_pengembalian)) - date('d-M-Y', strtotime($p->tgl_peminjaman)); ?> hari</td>
                            <td><?php
                                if($p->status == 1){
                                    echo "<span class='badge badge-danger'>Sudah Dikembalikan</span>";
                                }else{
                                    echo "<span class='badge badge-danger'>Proses Peminjaman</span>";
                                }
                            ?>

                            <td>
                                <a class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Detail Pinjam" href="<?php echo site_url('Peminjaman/View_dt_pinjam/?peminjaman_id='.$p->peminjaman_id) ?>"><i class="fa fa-list"></i></a>
                                <a class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="<?php echo site_url('Peminjaman/edit_peminjaman/'.$p->peminjaman_id) ?>" onclick="return confirm('Apakah Anda yakin ?');"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Kembalikan" href="<?php echo site_url('Peminjaman/pengembalian/'.$p->peminjaman_id) ?>"><i class="fa fa-share"></i></a>
                            </td>
                           <!--  "'.base_url().'admin/Pinjam/View_dt_pinjam/?id_pinjam='.$op['id_pinjam'].'" -->
                          </tr>
                        <?php } ?>
                    </tbody>  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="<?php echo base_url()?>asset/js/tooltip.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script>
      $('.bs-component [data-toggle="popover"]').popover();
      $('.bs-component [data-toggle="tooltip"]').tooltip();
    </script>
  </body>
</html>
