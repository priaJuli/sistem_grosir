
<div class="page-content-inner">
    <div class="row">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="col-md-12" id="myDIV" style="display: none;" >
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-green-haze">
                        <i class="icon-settings font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> Horizontal Form</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" class="form-horizontal" method="post" action="<?=base_url()?>Master_supplier/input_data">
                        <input type="text" id="status_update" name="status_update" hidden="">
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Kode Supplier</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="kd_supplier" id="kd_supplier" value="<?= $kodeunik;?>" readonly="">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Nama Supplier</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control " name="nama_supplier" id="nama_supplier" placeholder="Enter your name" autofocus="" required="">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Alamat</label>
                                <div class="col-md-9">
                                    <textarea class="form-control " rows="3" id="alamat" name="alamat" required="" ></textarea>
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1">Telepon</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control " id="telepon" name="telepon" required="">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input ">
                                <label class="col-md-3 control-label" for="form_control_1">Email</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control " id="email" name="email" placeholder="Enter your name" required="">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input ">
                                <label class="col-md-3 control-label" for="form_control_1">Keterangan</label>
                                <div class="col-md-9">
                                    <textarea class="form-control " id="keterangan" rows="3" name="keterangan" placeholder="Enter your name" required=""></textarea>
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-5 col-md-9">
                                    <button type="submit" class="btn green">
                                        <i class="fa fa-check"></i> Submit</button>
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
                        <span class="caption-subject bold uppercase"> Table supplier</span>
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
                                <th width="120"> Kode </th>
                                <th> Nama  </th>
                                <th> Alamat </th>
                                <th> Telepon </th>
                                <th> Email </th>
                                <th> Keterangan </th>
                                <th> Action </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($show_supplier as $key) { ?>
                                <tr class="odd gradeX">
                                    <td><?=$key->kd_supplier?></td>
                                    <td><?=$key->nama;?> </td>
                                    <td><?=$key->alamat;?> </td>
                                    <td><?=$key->telepon;?> </td>
                                    <td><?=$key->email;?> </td>
                                    <td><?=$key->keterangan;?> </td>
                                    <td align="center">
                                        <a href="javascript:;" onclick="edit_supplier('<?php echo $key->kd_supplier;?>')" class="btn btn-circle btn-icon-only green-jungle">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="javascript:;" onclick="confirm_del('<?php echo $key->kd_supplier?>')"  class="btn btn-circle btn-icon-only red">
                                            <i class="fa fa-remove"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php $no++;}
                                ?>

                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>

            
           
    </div>
</div>