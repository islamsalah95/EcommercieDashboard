class Notification{
    success(message){
        Swal.fire(
            message,
            'You clicked the button!',
            'success'
          )
    } 
  

  
    error(message){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: message,
          })
    } 
  
  
    deleteProduct(productId){
  Swal.fire({
    title: 'Do you want to save the changes?',
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: 'delete',
    denyButtonText: `Don't delete`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      Swal.fire('Saved!', '', 'success')
axios.delete(`http://127.0.0.1:8000/api/deleteProduct/${productId}`).then((response) => {
              console.log(response.data.data);
                 return true;
            }).catch((error) => console.log(error)); 
    } else if (result.isDenied) {
      Swal.fire('Changes are not saved', '', 'info')
    }
  })
}
  
  

  
  
  
  
  }
  
  export default Notification = new Notification()