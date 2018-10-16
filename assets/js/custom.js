(function($) {
	// body...
	
	$('.jml_barang').on('change', function(event){
				console.log($(this).val());
				var parent = $(this).parent();
				var next_p = $(parent).next();
				var prev_p = $(parent).prev().text();
				$(next_p).text(prev_p * $(this).val());	
				// console.log(prev_p * $(this).val());			
		});

	function js_edit(){
		$('.jml_barang').on('change', function(event){
				console.log($(this).val());
				var parent = $(this).parent();
				var next_p = $(parent).next();
				var prev_p = $(parent).prev().text();
				$(next_p).text(prev_p * $(this).val());	
				// console.log(prev_p * $(this).val());			
		});
	}

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
                    +'<td> <input type="text" class="form-control jml_barang" value="1" autofocus=""></td>'
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
	                js_edit();
	            },
	            error: function(e){
	            	console.log(e);
	            }
	        });

	});

	

})(jQuery);