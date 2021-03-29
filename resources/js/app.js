require('./bootstrap');


import Swal from 'sweetalert2';
window. deleteConfirm = function(formId){
    console.log(formId);
    Swal.fire({
        title: 'Êtes-vous sur de vouloir effectuer cette action ?!',
        showDenyButton: true,
        confirmButtonText: 'Supprimer',
        denyButtonText: 'Annuler'
      }).then((result)=>{
          if (result.isConfirmed){
              console.log(formId);
              document.getElementById(formId).submit();
          }
      })
    }