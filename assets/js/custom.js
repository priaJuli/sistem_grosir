(function($) {
	// body...
	$('#button_add_barang').on('click', function(event){
		event.preventDefault();
		var kd_br = $('#kode_barang').val();
		var base_url = "<?php echo base_url();?>";
		var table = $('#table_trans tbody');
		$.ajax({
	            url : "http://localhost/sistem_grosir/transaksi/tampil_barang_edit/",
	            type : "GET",
	            data : {
	            	kd_barang: kd_br
	            },
	            success: function(data){
	                // $(window).scrollTop(0);
	                var result=JSON.parse(data);
	                console.log(result);
	                var new_row = '<tr><td align="center">'+result.kd_barang+'</td>'
                    +'<td>'+result.nama_barang+'</div> </td><td>'+result.harga_jual+'</td>'
                    +'<td> <input type="text" class="form-control" value="1" name="" autofocus=""></td>'
                    +'<td>'+result.harga_jual+'</td><td align="center"> <a href="javascript:;" class="btn btn-circle btn-icon-only red">'
                    +'<i class="fa fa-remove"></i></a> </td></tr>';

	                $(table).append(new_row);
	                // $("#id_barang").val(result.id_barang);
	                // $("#kd_barang").val(result.kd_barang);
	                // $("#kd_supplier").val(result.kd_supplier);
	                // $("#nama_barang").val(result.nama_barang);
	                // $("#kategori").val(result.kategori);
	                // $("#satuan").val(result.satuan);
	                // $("#harga_beli").val(result.harga_beli);
	                // $("#harga_jual").val(result.harga_jual);
	                // $("#stok").val(result.stok);
	                // $("#tanggal_input").val(result.tanggal_input);
	                // $("#keterangan").val(result.keterangan);
	            },
	            error: function(e){
	            	console.log(e);
	            }
	        });
	});

})(jQuery);