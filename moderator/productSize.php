<?php include './master.head.php';?>
	<div id="table-url" data-url="{{ route('admin.product.size') }}"></div>
	<div class="row">
		<div class="col-md-12">
			<div class="breadcrumb__content">
				<div class="breadcrumb__content__left">
					<div class="breadcrumb__title">
						<h2>Product Size</h2> </div>
				</div>
				<div class="breadcrumb__content__right">
					<nav aria-label="breadcrumb">
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="http://localhost/proadmin/dashboard.php">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Product Size</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="customers__area bg-style mb-30">
				<!-- <div class="item-title">
					
				</div> -->
				<div class="customers__table">
				<div id="ProductSizeTable_wrapper" class="dataTables_wrapper no-footer">    
                            <div class="dataTables_length" id="ProductSizeTable_length">
							<div class="col-xs-6"> 
								<a href="productSizeCreate.php" class="btn btn-md btn-info">Add Product Size</a> 
							</div>
                            </div>
                            <div id="ProductSizeTable_filter" class="dataTables_filter">
                                <!-- <label>Search:
                                    <input id="pdtsearch" name="pdtsearch" type="search" class="" placeholder="" aria-controls="ProductSizeTable" required pattern="[a-zA-Z ]*$">
                                </label> -->
                            </div> 
					<table id="ProductSizeTable" class="row-border data-table-filter table-style">
						<thead>
							<tr>
								<th>Sl No.</th>
								<th>Product Size</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody id="pdtsize"> </tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include './js.php';?>
		<script type="text/javascript">
		// to list all pdtsize
		$(document).ready(function() {
			$.ajax({
				type: "POST",
				url: 'ajax.php?action=productsize',
				data: $(this).serialize(),
				success: function(response) {
					// document.write(response);
					// console.log(response);
					$('#pdtsize').html(response);
					$("#ProductSizeTable").dataTable();
				}
			});
		});

		$("#pdtsearch").on("keyup",function(){
            var form_data = new FormData();
            form_data.append('searchstr',$("#pdtsearch").val());  
            $.ajax({
            type: "POST",
            url: 'ajax.php?action=tablesizesearch',
            dataType: 'text',
            cache: false,
            contentType: false, //multipart/form-data forms that pass files.
            processData: false,  //stops jQuery processing any of the data and allows ajax datafield to run
            data: form_data,  //a set of key/value pairs -> form fields and their values
            success: function(response)
            {
                // document.write(response);
                //console.log(response);
                $('#pdtsize').html(response);
            }
            });
        });

		// for click on edit button
		function fn1(e) {
			location.href = "productSizeEdit.php?id=" + e;
		}
		// for click on toggle button
		function fn2(e) {
			$.ajax({
				type: "POST",
				url: 'ajax.php?action=sizestatus',
				data: {
					sizeid: e
				},
				success: function(response) {
					// document.write(response);
					// console.log(response);
					$.ajax({
						type: "POST",
						url: 'ajax.php?action=productsize',
						data: $(this).serialize(),
						success: function(response) {
							// document.write(response);
							// console.log(response);
							$('#pdtsize').html(response);
							location.reload();

						}
					});
				}
			});
		}
		</script>
		<?php include './master.foot.php';?>