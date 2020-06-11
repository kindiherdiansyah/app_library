<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Data User</h1>
          <p>Table to display analytical data effectively</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><a href="<?php echo base_url('Welcome');?>"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="breadcrumb-item active">Data User</a></li>
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
                    <h3 class="title">Tabel User</h3>
                    <p><a class="btn btn-primary icon-btn" href="<?php echo base_url('User/insert_user');?>"><i class="fa fa-plus"></i>Tambah Data </a></p>
                  </div>
                  <thead>
                        <tr align="center" >
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Nama</th>
                          <!--   <th>Email User</th>
                            <th>Telepon User</th>
                            <th>Role</th>
                            <th>Status</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach($User as $u) { 
                            $no = $no++;?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td>@<?php echo $u->username ?></td>
                            <td><span class="badge badge-danger">Rahasia Euy</span></td>
                            <td><?php echo $u->nama ?></td>
                          <!--   <td><?php echo $u->email_user ?></td>
                            <td><?php echo $u->telp_user ?></td>
                            <td><?php echo $u->deskripsi_level ?></td> -->
                    <!--         <td><?php
                                if($u->status_user == 1){
                                    echo "Aktif";
                                }else{
                                    echo "Nonaktif";
                                }
                            ?>
                            </td> -->
                            <td>
                              <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilihan</button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item btn btn-sm" href="<?php echo site_url('User/update_user/'.$u->id_user) ?>"> <i class="fa fa-cut"></i><span>Ubah</span></a>
                                <a class="dropdown-item btn btn-sm" href="<?php echo site_url('User/delete_user/'.$u->id_user) ?>" onclick="return confirm('Apakah Anda yakin ?');"><i class="fa fa-trash"></i><span>Hapus</span></a>
                              </div>
                              </div>
                            </td>
                        <?php } ?>
                    </tbody>  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
  </body>
</html>