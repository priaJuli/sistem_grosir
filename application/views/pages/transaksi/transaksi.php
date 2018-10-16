<!-- coplok edan -->
<div class="page-content-inner">
    <div class="row ">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light ">
                
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label  class="col-md-3">Kode Transaksi</label>
                                    <div class="col-md-5">
                                        <input type="text" readonly="" value="<?= $kodeunik;?>" class="form-control" id=""> </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-md-3 ">Kode Pelanggan</label>
                                    <div class="col-md-5">
                                        <input type="text" id="nama_pelanggan" class="form-control" autofocus=""> </div>
                                </div>
                                <!-- ketika onclick button tambahan search, input data into table (saved database not yet) -->
                                <div class="form-group">
                                    <label  class="col-md-3">Kode Barang</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" id="kode_barang"> </div>
                                        <button type="button" id="button_add_barang" class="btn blue">Tambahkan</button>
                                </div>
                                
                            </form>
                        </div>
                        <div class="col-md-6" hidden="">
                            <div class="col-md-12">
                                <div class="portlet yellow-crusta box">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-cogs"></i>Order Details </div>
                                        <div class="actions">
                                            <a href="javascript:;" class="btn btn-default btn-sm">
                                                <i class="fa fa-pencil"></i> Edit </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Order #: </div>
                                            <div class="col-md-7 value"> 12313232
                                                <span class="label label-info label-sm"> Email confirmation was sent </span>
                                            </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Order Date &amp; Time: </div>
                                            <div class="col-md-7 value"> Dec 27, 2013 7:16:25 PM </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Order Status: </div>
                                            <div class="col-md-7 value">
                                                <span class="label label-success"> Closed </span>
                                            </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Grand Total: </div>
                                            <div class="col-md-7 value"> $175.25 </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Payment Information: </div>
                                            <div class="col-md-7 value"> Credit Card </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="portlet  box">
                                <div class="portlet-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered table-striped" id="table_trans">
                                            <thead>
                                                <tr >
                                                    <th width="170"> Kode Barang </th>
                                                    <th> Nama Barang </th>
                                                    <th> Harga </th>
                                                    <th width="120"> Jumlah </th>
                                                    <th> Total </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <!-- tr dinamis berdasarkan data yg di search/input  -->
                                                <!-- data di tr semuanya menggunakan array,  -->

                                                
                                                <tr>
                                                    <td align="center"> 128732198371 </td>
                                                    <td>Vaseline</div> </td>
                                                    <td> 30000 </td>
                                                    <td> <input type="text" class="form-control jml_barang" value="1" autofocus=""></td>
                                                    <td> 60000 </td>
                                                    <td align="center"> <a href="javascript:;" class="btn btn-circle btn-icon-only red">
                                                            <i class="fa fa-remove"></i>
                                                        </a> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6">
                            <div class="well">
                                <div class="row static-info align-reverse">
                                    <div class="col-md-8 name"> Sub Total: </div>
                                    <div class="col-md-3 value"> $1,124.50 </div>
                                </div>
                                <div class="row static-info align-reverse">
                                    <div class="col-md-8 name"> Shipping: </div>
                                    <div class="col-md-3 value"> $40.50 </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                            
                    <hr>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>
</div>