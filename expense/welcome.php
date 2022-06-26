<?php
session_start();
$u_id = $_SESSION["u_id"];
if(empty($_SESSION['u_id'])){
    header("Location: index.php");
    die();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

	<link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
	

    <title>Home page</title>
<style>
html, body, #container {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
}
</style>
  </head>
  <body>

<div class="row mb-5">
					<div class="col-md-11">
						<h2 class="heading-section">
							<small> </small>
						</h2>
						<button type="button" class="btn mb-2 mb-md-0 py-3 px-4 btn-primary" data-toggle="modal" data-target="#AddModal">Add expense</button>
						<button type="button" class="btn mb-2 mb-md-0 py-3 px-4 btn-secondary" data-toggle="modal" data-target="#AddCategory">Add Category</button>
						
					</div>
					<div class="col-md-1">
						
						<a href="logout.php" class="btn btn-danger" style="margin:10px">Log Out</a>
					</div>
					
			
</div>
				
			
				

  <input type="hidden" id="u_id" name="u_id" value="<?php echo $u_id?>">
<input type="hidden" id="itemid">


<!-- Modal For Add category -->
<div class="modal fade" id="AddCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
      <div class="modal-body">
        <input id="category" type="text" class="form-control" placeholder="Enter Category">
      </div>
	  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="addcat" type="button" class="btn btn-primary">Add </button>
      </div>
    </div>
  </div>
</div>
<!-- Modal For Edit -->
<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body">
	  <select id="editcat">
        <option value="">Edit Category</option>
    </select>
	</div>
	
      <div class="modal-body">
        <input id="editamount" type="text" class="form-control" placeholder="Edit Amount">
      </div>
	  <div class="modal-body">
	  <input id="editdate" type="date" class="form-control" placeholder="Edit Date">
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="butedit" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal For Add expense -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <div class="modal-body">
	  <select id="cat">
        <option value="">Select Category</option>
    </select>
	</div>
      <div class="modal-body">
        <input id="amount" type="text" class="form-control" placeholder="Enter Amount">
      </div>
	  <div class="modal-body">
	  <input id="date" type="date" class="form-control" placeholder="Enter Date">
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="butsave" type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<script>
$(document).ready(function() {
	$('#addcat').on('click', function() {
		var user_id = $('#u_id').val();
		var name = $('#category').val();
		
		if(name!="" && user_id!=""){
			$.ajax({
				url: "addcat.php",
				type: "POST",
				data: {
					name: name,
					user_id: user_id,
					
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
								alert("category Added");
						var ele = document.getElementById('cat');
					
						// POPULATE SELECT ELEMENT WITH JSON.
						ele.innerHTML = ele.innerHTML +
							'<option value="' + dataResult.id + '">' + name + '</option>';
						var edit = document.getElementById('editcat');
       
					edit.innerHTML = edit.innerHTML +
							'<option value="' + dataResult.id + '">' + name + '</option>';
					
        
        								
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});

</script>
	<script>
			async function fetchAPI(){
				const response = await fetch('http://localhost/expense/show.php?id='+$('#u_id').val());
				if(!response.ok){
					const message = "An Error has occured";
					throw new Error(message);
				}
				
				const results = await response.json();
				return results; 
			}
			

			$( document ).ready(function() {
				fetchAPI().then(results => {
					buildTable(results);
					
				}).catch(error => {
					console.log(error.message);
				})
			});
	
		</script>
		<script>
			async function categfetchAPI(){
				const response = await fetch('http://localhost/expense/showcateg.php?id='+$('#u_id').val());
				if(!response.ok){
					const message = "An Error has occured";
					throw new Error(message);
				}
				
				const categresults = await response.json();
				return categresults; 
			}
				categfetchAPI().then(categresults => {
					dropdown(categresults);
					
					
				}).catch(error => {
					console.log(error.message);
				})
			
	function dropdown(results){
		var ele = document.getElementById('cat');
        for (var i = 0; i < results.length; i++) {
            // POPULATE SELECT ELEMENT WITH JSON.
            ele.innerHTML = ele.innerHTML +
                '<option value="' + results[i]['id'] + '">' + results[i]['name'] + '</option>';
        }
		
		var edit = document.getElementById('editcat');
        for (var i = 0; i < results.length; i++) {
            // POPULATE SELECT ELEMENT WITH JSON.
            edit.innerHTML = edit.innerHTML +
                '<option value="' + results[i]['id'] + '">' + results[i]['name'] + '</option>';
        }
		}
		</script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
    th{ 
        color:#fff;
            }
</style>


<table class="table table-striped">
    <tr  class="bg-info">
		<th>#</th>
        <th>Category</th>
        <th>Amount</th>
        <th>Date</th>
		<th>Edit</th>
		<th>Delete</th>
    </tr>

    <tbody id="myTable">
        
    </tbody>
</table>

<script src="https://cdn.anychart.com/js/8.0.1/anychart-core.min.js"></script>
<script src="https://cdn.anychart.com/js/8.0.1/anychart-pie.min.js"></script>

<div id="container"></div>

<script>


	function buildTable(data){
		var table = document.getElementById('myTable')

		for (var i = 0; i < data.length; i++){
			var row = `<tr id=del${data[i].id}>
							<td>#</td>
							<td data-target="categ">${data[i].name}</td>
							<td data-target="amount">${data[i].amount}</td>
							<td data-target="date">${data[i].date}</td>
							<td><a class="btn btn-primary" data-role="update" data-id=${data[i].id} data-toggle="modal" data-target="#EditModal">Edit</a></td>
							<td><a class="btn btn-danger" id="delete" data-id=${data[i].id}>Delete</a></td>
					  </tr>`
			table.innerHTML += row


		}
	}
	
</script>

<script>
$(document).ready(function() {
	$('#butsave').on('click', function() {
		var cat_id = $('#cat').find(":selected").val();
		var user_id = $('#u_id').val();
		var amount = $('#amount').val();
		var date = $('#date').val();
		var cat_name = $('#cat').find(":selected").text();
		if(date!="" && amount!="" && user_id!="" && cat_id!= ""){
			$.ajax({
				url: "add.php",
				type: "POST",
				data: {
					amount: amount,
					date: date,
					user_id: user_id,
					cat_id: cat_id,
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						//const re = await groupby();
			
		var table = document.getElementById('myTable')
			var row = `<tr id=del${dataResult.id}>
							<td>#</td>
							<td data-target="categ">${cat_name}</td>
							<td data-target="amount">${amount}</td>
							<td data-target="date">${date}</td>
							<td><a class="btn btn-primary" data-role="update" data-id=${dataResult.id} data-toggle="modal" data-target="#EditModal" >Edit</button></td>
							<td><a class="btn btn-danger" id="delete" data-id=${dataResult.id}>Delete</a></td>
					  </tr>`
				table.innerHTML += row
              $('#container').empty();
						$( document ).ready(function() {
								groupby().then(results => {
								chart(results);
					
						}).catch(error => {
							console.log(error.message);
						})
					});
						
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>

<script>
$(document).ready(function(){
	$(document).on('click','a[data-role=update]',function(){
		var id = $(this).data('id');
		$('#itemid').val(id);
		
	})
});
$('#butedit').on('click', function() {
	var id = $('#itemid').val();
	var cat_id = $('#editcat').find(":selected").val();
	var user_id = $('#u_id').val();
	var amount = $('#editamount').val();
	var date = $('#editdate').val();
	var cat_name = $('#editcat').find(":selected").text();
		if(date!="" && amount!="" && user_id!="" && cat_id!= ""){
			$.ajax({
				url: "update.php",
				type: "POST",
				data: {
					id:id,
					amount: amount,
					date: date,
					user_id: user_id,
					cat_id: cat_id,
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						
						$('#del'+id).children('td[data-target=amount]').text(amount);
						$('#del'+id).children('td[data-target=date]').text(date);
						$('#del'+id).children('td[data-target=categ]').text(cat_name);
						$('#container').empty();
						$( document ).ready(function() {
								groupby().then(results => {
								chart(results);
					
						}).catch(error => {
							console.log(error.message);
						})
					});
					
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
</script>



<script type="text/javascript">
$(document).ready(function(){
$(document).on('click','#delete',function(){
	//alert($(this).data('id'));
	var id = $(this).data('id');
	$.ajax({
	url:'delete.php',
	type:'POST',
	data:{id:id},
	success:function(data){
		$('#del'+id).remove();
		$('#container').empty();
		$( document ).ready(function() {
				groupby().then(results => {
					chart(results);
					
				}).catch(error => {
					console.log(error.message);
				})
			});
	}
	});
});
});
</script>

	<script>
			async function groupby(){
				const response = await fetch('http://localhost/expense/groupby.php?id='+$('#u_id').val());
				if(!response.ok){
					const message = "An Error has occured";
					throw new Error(message);
				}
				
				const results = await response.json();
				return results; 
			}
			
			$( document ).ready(function() {
				groupby().then(results => {
					chart(results);
					
				}).catch(error => {
					console.log(error.message);
				})
			});
	
		</script>
		
<script>

function chart(data) {

  var data = data;

  // create the chart
  var chart = anychart.pie();

  // set the chart title
  chart.title("Pie Chart");

  // add the data
  chart.data(data);

  // display the chart in the container
  chart.container('container');
  chart.draw();

};
</script>

  </body>
</html>