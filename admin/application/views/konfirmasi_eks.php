<?php
 if($data_spp['bulan']=="1"){
       $bulan="Januari";
     }elseif($data_spp['bulan']=="2"){
      $bulan="Februari";
     }elseif($data_spp['bulan']=="3"){
      $bulan="Maret";
     }elseif($data_spp['bulan']=="4"){
      $bulan="April";
     }elseif($data_spp['bulan']=="5"){
      $bulan="Mei";
     }elseif($data_spp['bulan']=="6"){
      $bulan="Juni";
     }elseif($data_spp['bulan']=="7"){
      $bulan="Juli";
     }elseif($data_spp['bulan']=="8"){
      $bulan="Agustus";
     }elseif($data_spp['bulan']=="9"){
      $bulan="September";
     }elseif($data_spp['bulan']=="10"){
      $bulan="Oktober";
     }elseif($data_spp['bulan']=="11"){
      $bulan="November";
     }elseif($data_spp['bulan']=="12"){
        $bulan="Desember";
     }
    ?>
<!-- page content -->
<div class="right_col" role="main">
     <div class="">
       <div class="page-title">
         <div class="title_left">
           <h3>Ekskul</h3>
         </div>
         <div class="title_right">
           <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
             <div class="input-group">
               <input type="text" class="form-control" placeholder="Search for...">
               <span class="input-group-btn">
                 <button class="btn btn-default" type="button">Go!</button>
               </span>
             </div>
           </div>
         </div>
       </div>
       </div>

<div class="clearfix">
<div class="col-md-12 col-xs-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bukti Pembayaran Ekskul<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
        <form action="<?php echo base_url('konfirmasi/proses_eks') ?>" method="post" class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="double">NIS</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" value="<?=$data_spp['nis']?>" readonly>
            </div>
         </div>

         <div class="form-group">
            <label class="col-sm-2 control-label" for="double">Nama Siswa</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" value="<?=$data_spp['nama']?>" readonly>
            </div>
         </div>

         <div class="form-group">
            <label class="col-sm-2 control-label" for="double">Kelas</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" value="<?=$data_spp['kelas']?>" readonly>
            </div>
         </div>

        <?php $gambar="/image";
              $link =base_url('');
              $uri = str_replace("/admin","",$link);
              
        ?>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Foto Bukti Pembayaran</label>
            <div class="col-sm-6">
            <a href ="<?php echo $uri.'image/'.$data_spp['foto_ekskul']?>" target="_blank"><img src="<?php echo $uri.'image/'.$data_spp['foto_ekskul']?>" alt="" width="280px;"></a>
            </div>
        </div>
	   
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Pembayaran Ekskul Bulan </label>
            <div class="col-sm-6">
            <input type="text" class="form-control" value="<?=$bulan?>" readonly>
            </div>
        </div>
	   
         <div class="form-group">
            <label class="col-sm-2 control-label" for="double">Semester</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" value="<?=$data_spp['semester']?>" readonly>
            </div>
         </div>
	    
<div class="form-group">
    <input type="hidden" name="id" value="<?php echo $data_spp['id']?>" /> 
	    <button type="submit" class="btn btn-success"> Approve</button> 
	    <a href="<?php echo base_url('konfirmasi/invalid_eks/'.$data_spp['id']) ?>" class="btn btn-danger">Reject</a>
	    <a href="<?php echo site_url('spp') ?>" class="btn bg-orange">Kembali</a>
	
            </div>
            </form>
                  </div>
                </div>
              </div>
            </div>
        </div>