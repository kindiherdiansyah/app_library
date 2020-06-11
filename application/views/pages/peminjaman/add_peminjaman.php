<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Peminjaman Buku</h1>
          <p>Input Peminjaman</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Form Peminjaman</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="tile">
            <h3 class="tile-title">Input Peminjaman</h3>
            <form action="<?php echo base_url('Peminjaman/create'); ?>" enctype="multipart/form-data" method="post">
            <div class="tile-body">
                <div class="form-group">
                    <label>Cari Peminjam</label>
                    <select class="form-control" id="demoSelect" name="murid_nip" required>
                      <option value="">Cari Peminjam</option>
                        <?php
                            if(@$d_murid) :
                                foreach ($d_murid as $dm) :    
                        ?>
                        <option value="<?= $dm->murid_nip ?>" <?php if($this->input->post('murid_nip') == $dm->murid_nip) {echo "selected";} ?>> <?= $dm->murid_nama ?>
                        </option>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </select>
                </div>
                <div class="form-group">
                  <label class="control-label">Tanggal Peminjaman</label>
                  <input class="form-control" type="text" id="demoDate" name="tgl_peminjaman" value="<?php echo $kuda ?>" disabled>
                </div>
                <div class="form-group">
                  <label class="control-label">Tanggal Pengembalian</label>
                  <input class="form-control" id="demoDate2" type="text" name="pengembalian_tgl" placeholder="Pilih tanggal Pengembalian"><span><b><font color="red">Lama Pinjam</font></b></span>
                  <span id='hari'> - </span>
                  <span> Hari</span>
                </div>
                <!-- <div class="form-group">
                  <label class="control-label">Lama Pinjam</label>
                  <input class="form-control" id="hasil" type="text" readonly="readonly">
                </div> -->
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-check-circle"></i>Submit</button>
 
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
      daysOfWeekDisabled: [0, 7],
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
      });
    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
    $('#demoDate2').datepicker({
      daysOfWeekDisabled: [0, 7],
        format: "yyyy-mm-dd",
        startDate: today,
        autoclose: true,
        todayHighlight: true
      });
    $('#demoSelect').select2();
    $('#sampleTable').DataTable();

    $('#demoDate2').change(function () {
      var naon = $('#demoDate').datepicker("getDate") - $('#demoDate2').datepicker("getDate");
    $('#hari').text(naon / (1000 * 60 * 60 * 24) * -1);
    })
  </script>


<!--     <script type="text/javascript">
        $(function(){
            $('#jml_uang').on("input",function(){
                var total=$('#total').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_bayar').val(hsl);
                $('#sisa').val(hsl-total);
            })
            
        });
    </script> -->