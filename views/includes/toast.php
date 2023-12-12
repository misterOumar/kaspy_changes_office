<div class="flash alert alert-warning" role="alert" 
    style="display: none;
    
        position: absolute;
        right: 10px;
        top: 10px;
        position: fixed;
        top: 10px;
        right: 10px;
        z-index: 1035;
        height:40px;
        padding-top:10px;
        padding-right:10px;
        padding-left:15px;
        padding-bottom:10px;
        opacity: 1;
    "
    >
    Compte crée avec succès
</div>


<script type="text/javascript">
function initializeFlash() {
    if ($('.flash').hasClass('alert-success')) {
        $('.flash').removeClass('alert-success');
    } else if ($('.flash').hasClass('alert-danger')) {
        $('.flash').removeClass('alert-danger');
    } else if ($('.flash').hasClass('alert-warning')) {
        $('.flash').removeClass('alert-warning');
    } else if ($('.flash').hasClass('alert-info')) {
        $('.flash').removeClass('alert-info');
    }
}
</script>