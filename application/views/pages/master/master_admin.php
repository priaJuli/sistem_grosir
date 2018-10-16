
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-6">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-green-haze">
                        <i class="icon-settings font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> Table admin</span>
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
                                <th>  </th>
                                <th> NIK </th>
                                <th> Nama </th>
                                <th> Jabatan </th>
                                <th> Action </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                                foreach ($show_admin as $key) { ?>
                                    <tr class="odd gradeX">
                                        <td>-</td>
                                        <td><?=$key->nik;?> </td>
                                        <td><?=$key->nama_admin;?> </td>
                                        <td><?=$key->jabatan;?> </td>
                                        <td align="center">
                                            <a href="javascript:;" onclick="edit_admin(<?php echo $key->id_admin;?>)" class="btn btn-circle btn-icon-only green-jungle">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="javascript:;" onclick="confirm_del(<?php echo $key->id_admin?>)"  class="btn btn-circle btn-icon-only red">
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

        <div class="col-md-6" >
            <?php echo $this->session->flashdata('message'); ?>
        </div>
        <div class="col-md-6" id="myDIV" style="display: none;" >
           <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption font-green-haze">
                        <i class="icon-settings font-green-haze"></i>
                        <span class="caption-subject bold uppercase"> Form admin </span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form method="post" action="<?=base_url()?>Master_admin/input_data" role="form" class="form-horizontal">
                        <input type="text" id="id_admin" name="id_admin" hidden="" >
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1"> NIK </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control " id="nik" autofocus="" 
                                    name="nik" required="" autofocus="">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1"> Nama admin </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control " id="nama_admin" autofocus="" 
                                    name="nama_admin" required="">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1"> Jabatan </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control " id="jabatan" autofocus="" 
                                    name="jabatan" required="">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                            <div class="form-group form-md-line-input">
                                <label class="col-md-3 control-label" for="form_control_1"> Password </label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control " id="password" autofocus="" 
                                    name="password" required="">
                                    <div class="form-control-focus"> </div>
                                </div>
                            </div>
                             <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-9">
                                        <button type="submit" class="btn green">Submit</button>
                                        <button type="reset" onclick="hide_form()" class="btn default">Cencel</button>
                                    </div>
                                </div>
                            </div>
                    </form>

                </div>
               
            </div>
            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>
</div>