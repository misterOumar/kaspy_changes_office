<?php
if (!isset($_SESSION["KaspyISS_user"])) {
    header("Location: index.php?page=login");
};
?>
<!-- End of the secure -->


<!DOCTYPE html>
<html class="loading" lang="fr" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <title><?= APP_NAME ?> -Type de carte</title>

    <!-- Fichiers CSS par défaut (TEMPLATE) -->
 
    <!-- Fichier fenetre des differents Liste et journaux -->


    <!-- Fichiers CSS spécifiques a la page (TEMPLATE) -->
    <link rel="stylesheet" type="text/css" href="css/template/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/plugins/pickers/flatpickr/flatpickr.min.css">

    <link rel="stylesheet" type="text/css" href="css/core/menu/menu-types/vertical-menu.css">

    <!-- Mes fichiers style CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<!-- END: Head-->


<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static " data-open="click" data-menu="vertical-menu-modern" data-col="">
    <!-- BEGIN: Main Menu-->
 
    <!-- END: Main Menu-->

 


<form action="controllers/type_carte_import_controller.php" method="post">
    <label for="">Select file</label>
    <input type="file" name="fichier_excel">
    <button type="submit" id='bt_import' name='bt_import' class='btn btn-primary enregistrer me-5'>Enregistrer</button>
</form>
<?php include 'includes/toast.php' ?>

<!-- ***************************************** FICHIERS JS ************************************************************** -->
<!-- BEGIN: FICHIERS JS DU TEMPLATE -->
<script src="js/template/vendors.min.js"></script>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- BEGIN: FICHIERS JS DES PAGES -->
<script src="js/plugins/tables/datatable/jquery.dataTables.min.js"></script>
<script src="js/plugins/tables/datatable/dataTables.bootstrap5.min.js"></script>
<script src="js/plugins/tables/datatable/dataTables.responsive.min.js"></script>
<script src="js/plugins/tables/datatable/responsive.bootstrap5.min.js"></script>

<script src="js/plugins/tables/datatable/datatables.checkboxes.min.js"></script>
<script src="js/plugins/tables/datatable/datatables.buttons.min.js"></script>
<script src="js/plugins/tables/datatable/jszip.min.js"></script>

<script src="js/plugins/tables/datatable/pdfmake.min.js"></script>
<script src="js/plugins/tables/datatable/vfs_fonts.js"></script>
<script src="js/plugins/tables/datatable/buttons.html5.min.js"></script>
<script src="js/plugins/tables/datatable/buttons.print.min.js"></script>
<script src="js/plugins/pickers/flatpickr/flatpickr.min.js"></script>

<!--<script src="js/template/ui/jquery.sticky.js"></script> -->
<script src="js/template/forms/spinner/jquery.bootstrap-touchspin.js"></script>
<script src="js/template/forms/form-number-input.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script src="js/template/app.js"></script>
<script src="js/template/app-menu.js"></script>

<!-- START: Footer-->
<?php include 'includes/footer.php' ?>
<!-- END: Footer-->


<!-- <?php include 'js/flatpick_fr.js' ?>
 -->
<?php include 'js/logiques/type_carte_datatable.php' ?>
<?php include 'js/logiques/type_carte_logiques.php' ?>
<?php include 'js/logiques/reporting_logiques.php' ?>




<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
</body>

</html>