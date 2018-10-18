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

	function delItemTransaksi(kd_br){
		var parent_tr = $(this).parent('tr').css({"color": "red", "border": "2px solid red"});
		var parent_table = $(this).parent('table').css({"color": "red", "border": "2px solid red"});
	}

	$('#button_add_barang').on('click', function(event){
		event.preventDefault();
		var kd_br = $('#kode_barang').val();
		var base_url = "<?php echo base_url();?>";
		var table = $('#table_trans tbody');
		var subtotal = $('.value-total').text();
		if(kd_br != ''){
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
		                var req = false;
		                var table_loop	= document.getElementById('table_trans');
		                var longlength	= table_loop.rows.length;
		                
		                for(var i=1; i<longlength; i+=1){
		                	var row = table_loop.rows[i];
		                	var colLength = row.cells.length;
		                	var kd_cell = row.cells[0].textContent;
		                	console.log(kd_cell);
		                	if(result.kd_barang == kd_cell){
		                		var jml_barangcel = row.cells[3].getElementsByTagName("input")[0];
		                		
		                		jml_barangcel.stepUp(1);
		                		var jml = jml_barangcel.value * row.cells[2].innerHTML;
		                		row.cells[4].innerHTML = jml;
		                		subtotal = parseInt(subtotal) + parseInt(row.cells[2].innerHTML);
		                		$('.value-total').text(subtotal);
			                	req = true;
			                	if(req == true){
			                		console.log("Item ada ditabel");
			                	}	
		                	}
		                	
		                }

		                if(req == false){
		                	var new_row = '<tr><td align="center">'+result.kd_barang+'<input hidden value='+result.id_barang+'></td>'
		                    +'<td>'+result.nama_barang+'</div> </td><td>'+result.harga_jual+'</td>'
		                    +'<td> <input type="number" name="quantity" min="1" max="100" value=1></td>'
		                    +'<td>'+result.harga_jual+'</td><td align="center"> <button onclick="delItemTransaksi('+result.kd_barang+')" class="btn btn-circle btn-icon-only red">'
		                    +'<i class="fa fa-remove"></i></button></td></tr>';

			                $(table).append(new_row);
			                subtotal = parseInt(subtotal) + parseInt(result.harga_jual);
			                console.log(subtotal);
			                $('.value-total').text(subtotal);
		                }
		                
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
			}
			$('#kode_barang').val('');

	});

	$('#checkout').on('click', function(){
		var value = [];
		var table_loop	= document.getElementById('table_trans');
        var longlength	= table_loop.rows.length;
        
        for(var i=1; i<longlength; i+=1){
        	var row = table_loop.rows[i];
        	var colLength = row.cells.length;
        	var id_barang = row.cells[0].getElementsByTagName("input")[0].value;
        	var jml_barang = row.cells[3].getElementsByTagName("input")[0].value;
        	value.push(id_barang+"-"+jml_barang);
        	
        }
        var idbarang_jumlah = value.join('#');
        var sub_total = $('.value-total').text();
        $.ajax({
        	url : "http://localhost/sistem_grosir/transaksi/input_data",
	            type : "POST",
	            data : {
	            	idbarang_jumlah: idbarang_jumlah,
	            	total: sub_total,
	            },
	            success: function(data){
	            	$('.message').css("display", "block").text("Tranaksi telah disimpan");
	            	setTimeout(function(){
					  $('.message').css("display", "none");
					}, 2000);
	            	$('tbody').children().remove();
	            	$('.value-total').text('');
	            },
	            error: function(data){
	            	console.log("error");	
	            }
        });
	});

	

})(jQuery);