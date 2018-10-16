<div class="page-content-inner">
    <div class="row">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="col-md-12" id="myDIV" style="display: none;"  >
            <!-- BEGIN SAMPLE FORM PORTLET-->
           <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-green-haze"></i>
                        <span class="caption-subject font-green-haze bold uppercase">Form Input Barang</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal" method="post" action="<?=base_url()?>data_barang/input_data" role="form" >
                        <input type="text" id="id_barang" name="id_barang" hidden="">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Kode Barang</label>
                                        <div class="col-md-9">
                                            <input type="text" id="kd_barang" name="kd_barang" class="form-control" required="" autofocus="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nama Supplier</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="kd_supplier" id="kd_supplier" required="true">
                                                <option value="">--pilih--</option>
                                                <?php 
                                                    foreach ($supplier as $key) { ?>
                                                        <option value="<?=$key->kd_supplier?>"><?=$key->nama;?></option>
                                                    <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nama Barang</label>
                                        <div class="col-md-9">
                                            <input type="text" id="nama_barang" name="nama_barang" class="form-control" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Kategori</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="kategori" id="kategori" required="true">
                                                <option value="">--pilih--</option>
                                                <?php 
                                                    foreach ($kategori as $key) { ?>
                                                        <option value="<?=$key->id_kategori?>"><?=$key->nama_kategori;?></option>
                                                    <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Satuan</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="satuan" id="satuan" required="true">
                                                <option value="">--pilih--</option>
                                                <?php 
                                                    foreach ($satuan as $key) { ?>
                                                        <option value="<?=$key->id_satuan?>"><?=$key->nama_satuan;?></option>
                                                    <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Harga Beli</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="harga_beli" name="harga_beli" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Harga Jual</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="harga_jual" name="harga_jual" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Stok</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="stok" name="stok" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Tanggal Input</label>
                                        <div class="col-md-9">
                                            <input type="date" class="form-control form-control-inline input-medium" id="tanggal_input" name="tanggal_input" required="">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Keterangan</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="keterangan" name="keterangan" rows="3" required=""></textarea>
                                        </div>
                                    </div>

                                   
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-5">
                                    <button type="submit" class="btn green">Input</button>
                                    <button type="reset" onclick="hide_form()" class="btn default">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                    <!-- END SAMPLE FORM PORTLET-->
        </div>
        <!-- END SAMPLE FORM PORTLET-->
        <div class="col-md-12"  >
            <?php echo $this->session->flashdata('message'); ?>
        </div>
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-green-haze">
                        <i class="icon-settings font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> Table barang</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <div class="btn-group">
                                <button id="sample_editable_1_new" class="btn sbold green" onclick="myFunction()"> Tambah
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                        <thead>
                            <tr>
                                <th> -  </th>
                                <th width="125"> Kode  </th>
                                <th> Supplier </th>
                                <th> Nama </th>
                                <th> Kategori </th>
                                <th> Satuan </th>
                                <th> Beli </th>
                                <th> Jual </th>
                                <th> Stok </th>
                                <th> Tgl Input </th>
                                <th> Keterangan </th>
                                <th> Action </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($show_barang as $key) { ?>
                                <tr class="">
                                    <td>-</td>
                                    <td><?=$key->kd_barang;?> </td>
                                    <td><?php 
                                        $query = $this->Model_supplier->view_by_id($key->kd_supplier);
                                        echo $query->nama;?>
                                        
                                    </td>
                                    <td><?=$key->nama_barang;?> </td>
                                    <td><?php 
                                        $query = $this->Model_kategori->view_by_id($key->kategori);
                                        echo $query->nama_kategori;?> </td>
                                    <td><?php 
                                        $query = $this->Model_satuan->view_by_id($key->satuan);
                                        echo $query->nama_satuan;?> </td>
                                    <td><?=$key->harga_beli;?> </td>
                                    <td><?=$key->harga_jual;?> </td>
                                    <td><?=$key->stok;?> </td>
                                    <td>
                                        <?php 
                                            $date = explode("-", $key->tanggal_input);
                                            echo $tgl_input = $date[2].'-'.$date[1].'-'.$date[0];
                                        ?>
                                    </td>
                                    <td><?=$key->keterangan;?> </td>
                                    <td align="center">
                                        <a href="javascript:;" onclick="edit_barang(<?php echo $key->id_barang;?>)" class="btn btn-circle btn-icon-only green-jungle">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="javascript:;" onclick="confirm_del(<?php echo $key->id_barang?>)"  class="btn btn-circle btn-icon-only red">
                                            <i class="fa fa-remove"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
    </div>
</div>