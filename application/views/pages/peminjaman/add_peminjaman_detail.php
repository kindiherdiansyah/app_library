<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Peminjaman Buku</h1>
          <p>Input Peminjaman Detail</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Form Peminjaman Detail</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="tile">
            <h3 class="tile-title">Input Peminjaman Detail</h3>
            <form action="<?php echo base_url('Peminjaman/createdet'); ?>" enctype="multipart/form-data" method="post">
            <div class="tile-body">
                <div class="form-group">
                    <label>Murid</label>
                    <select class="form-control" disabled="disabled" required>
                      <?php foreach($data_murid->result_array() as $da)
                            {
                              if ($da['murid_nip']==$pinjam['nip_murid']) {
                            ?>
                              
                              <option value="<?php echo $da['murid_nip'];?>" disabled=disable selected><?php echo $da['murid_nama'];?></option>
                            <?php
                          }
                            }
                            ?>
                    </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Tanggal Pengembalian</label>
                  <input class="form-control" id="demoDate2" type="text" name="tgl_pengembalian" value="<?php echo $pinjam['tgl_pengembalian']?>" disabled>
                </div>
                <div class="form-group">
                    <label>Buku</label>
                    <select name="buku_id_d" class="form-control" id="demoSelect" required>
                    <option value="">Pilih Buku</option>
                      <?php 
                        foreach($data_buku->result_array() as $db)
                        {
                      ?>
                    <option value="<?php echo $db['buku_id'];?>"><?php echo $db['buku_nama'];?></option>
                      <?php
                      }?>
                    </select>
                    <?= form_error('buku_id_d', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-check-circle"></i>Submit</button>
              <a href="<?php echo base_url(); ?>Peminjaman/View_dt_pinjam/?peminjaman_id=<?php echo $pinjam['peminjaman_id'];?>" class="btn btn-danger"><i class="fa fa-times-circle"></i>Kembali</a>
            </div>
            </form>
          </div>
        </div>
    </main>

   <script type="text/javascript">
        $(function () {
            $('#datetimepicker11').datetimepicker({
                daysOfWeekDisabled: [0, 6]
            });
        });
    </script>

  <script type="text/javascript">
    $('#demoDate').datepicker({
      daysOfWeekDisabled: [0, 6],
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
      });
    $('#demoDate2').datepicker({
      daysOfWeekDisabled: [0, 6],
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
      });
    $('#demoSelect').select2();
    $('#sampleTable').DataTable();
  </script>


    <script type="text/javascript">
        $(function(){
            $('#jml_uang').on("input",function(){
                var total=$('#total').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_bayar').val(hsl);
                $('#sisa').val(hsl-total);
            })
            
        });
    </script>