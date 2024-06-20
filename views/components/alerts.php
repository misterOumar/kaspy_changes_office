<link rel="stylesheet" type="text/css" href="css/plugins/extensions/ext-component-sweet-alerts.css">
<link rel="stylesheet" type="text/css" href="css/plugins/animate/animate.min.css">
<link rel="stylesheet" type="text/css" href="css/plugins/extensions/sweetalert2.min.css">


<script>
//Envois une boite de message selon le type paramétré.
function swal_Alert_Sucess(titre) {
Swal.fire({
    //height:'100px',
    width: '400px',
    position: 'top-end',
    icon: 'success',
    title: titre,
    showConfirmButton: false,
    timer: 1500,
    customClass: {
      confirmButton: 'btn btn-primary'
    },
    buttonsStyling: false
  });
}

//Envois une boite de message selon le type paramétré.
function swal_Alert_Danger(titre) {
Swal.fire({
    //height:'100px',
    width: '400px',
    position: 'top-end',
    icon: 'warning',
    title: titre,
    showConfirmButton: false,
    timer: 1500,
    customClass: {
      confirmButton: 'btn btn-primary'
    },
    buttonsStyling: false
  });
}
</script>

<script src="js/template/extensions/ext-component-sweet-alerts.js"></script>
<script src="js/template/extensions/sweetalert2.all.min.js"></script>