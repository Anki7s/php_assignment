 /*
	* Function confirm function to delete customer data 
	* @params customer id
	* @return  null
    */
function confirmDelete(id){
	$('#userId').val(id);
	 $("#myModal").modal();
}
 /*
	* Function to delete record 
	* @params null
	* @return  customer id 
    */
function deleteRecord(){
	var id = $('#userId').val();
	window.location.href="http://localhost/php/Assignment-3/dashboard/deleteUser/"+id;
}