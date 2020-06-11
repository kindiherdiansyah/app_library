<!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><font color="cyan"><b><?php echo $this->session->userdata('nama');?></b></font></p>
          <p class="app-sidebar__user-designation"><font color="lime"><b>Backend Developer</b></font></p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item <?php if($this->uri->uri_string()=="Welcome"){echo "active";}?>" href="<?php echo base_url('Welcome'); ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        <li class="treeview <?php if($this->uri->uri_string()=="Buku" OR $this->uri->uri_string()=="Murid"){echo "is-expanded";}?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-maxcdn"></i><span class="app-menu__label">Master</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item <?php if($this->uri->uri_string()=="Buku"){echo "active";}?>" href="<?php echo base_url('Buku'); ?>"><i class="icon fa fa-paw"></i> Buku</a></li>
            <li><a class="treeview-item <?php if($this->uri->uri_string()=="Murid"){echo "active";}?>" href="<?php echo base_url('Murid'); ?>"><i class="icon fa fa-paw"></i> Murid</a></li>
          </ul>
        </li>

        <li class="treeview <?php if($this->uri->uri_string()=="Peminjaman" OR $this->uri->uri_string()=="Pengembalian"){echo "is-expanded";}?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-audio-description"></i><span class="app-menu__label">Administrasi</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item <?php if($this->uri->uri_string()=="Peminjaman"){echo "active";}?>" href="<?php echo base_url('Peminjaman'); ?>"><i class="icon fa fa-tty"></i> Peminjaman</a></li>
          </ul>
          <ul class="treeview-menu">
            <li><a class="treeview-item <?php if($this->uri->uri_string()=="Pengembalian"){echo "active";}?>" href="<?php echo base_url('Pengembalian'); ?>"><i class="icon fa fa-tty"></i> Pengembalian</a></li>
          </ul>
        </li>


        <li class="treeview <?php if($this->uri->uri_string()=="User"){echo "is-expanded";}?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Data User</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item <?php if($this->uri->uri_string()=="User"){echo "active";}?>" href="<?php echo base_url('User'); ?>"><i class="icon fa fa-user-circle-o"></i> User</a></li>
          </ul>
        </li>


      </ul>
    </aside>
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo base_url()?>asset/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url()?>asset/js/jquery.js"></script>
    <script src="<?php echo base_url()?>asset/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url()?>asset/js/popper.min.js"></script>
    <script src="<?php echo base_url()?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>asset/js/main.js"></script>
    <script src="<?php echo base_url()?>asset/js/jquery.price_format.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>asset/js/plugins/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>asset/js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>asset/js/plugins/dropzone.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?php echo base_url()?>asset/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="<?php echo base_url()?>asset/js/plugins/chart.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>asset/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>asset/js/plugins/dataTables.bootstrap.min.js"></script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
      }
    </script>
  </body>
</html>