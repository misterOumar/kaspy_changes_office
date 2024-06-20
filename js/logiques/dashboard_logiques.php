<?php include("views/components/alerts.php") ?>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="js/flatpick_fr.js"></script>
<script>
    // LOGIQUES DASHBOARD

    // la date actuelle
    var currentDate = new Date();
    $("#date_envois_mobile_money, #date_retrait_mobile_money").flatpickr({
        dateFormat: "d-m-Y",
        mode: 'range',
        defaultDate: [
            currentDate.setDate(1), //jour sur 1 pour le début du mois
            currentDate.setDate(new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate()) // Définissez le jour sur le dernier jour du mois
        ]
    })



    $(document).ready(function() {
        /* recuperer et afficher les donnees des dépots mobile money*/
        $.ajax({
            type: "GET",
            url: "controllers/dashboard_controller.php",
            data: "stat_envois_mm=" + true,
            success: function(response) {
                var donnees = JSON.parse(response)
                if (donnees['envois_mobile_money'] !== 'null') {
                    let envois_mobile_money = donnees['envois_mobile_money']
                    let labels = []
                    let series = []
                    envois_mobile_money.forEach(function(envoi) {
                        labels.push(envoi['label'])
                        series.push(parseFloat(envoi['montant']) )
                    })

                    console.log(series);

               

                    var options_envois_mobile_money = {
                        chart: {
                            type: 'pie'
                        },
                        series: series,
                        labels: labels
                    }

                    var chart_envois_mm = new ApexCharts(document.querySelector("#chart_pie_envois_mm"), options_envois_mobile_money);
                    chart_envois_mm.render()
                }
            }
        });

        /* recuperer et afficher les donnees des retraits mobile money*/
        $.ajax({
            type: "GET",
            url: "controllers/dashboard_controller.php",
            data: "stat_retraits_mobile_money=" + true,
            success: function(response) {
                var donnees = JSON.parse(response)
                if (donnees['retraits_mobile_money'] !== 'null') {
                    let retraits_mobile_money = donnees['retraits_mobile_money']
                    let labels_retrait = []
                    let series_retrait = []
                    retraits_mobile_money.forEach(function(retrait) {
                        labels_retrait.push(retrait['label'])
                        series_retrait.push(parseFloat(retrait['montant']))
                    })


                    var options_retraits_mobile_money = {
                        chart: {
                            type: 'pie'
                        },
                        series: series_retrait,
                        labels: labels_retrait
                    }

                    var chart_retraits_mobile_money = new ApexCharts(document.querySelector("#chart_pie_retraits_mobile_money"), options_retraits_mobile_money);
                    chart_retraits_mobile_money.render()
                }
            }
        });

        /* recuperer et afficher les donnees des achats de dévise */
        $.ajax({
            type: "GET",
            url: "controllers/dashboard_controller.php",
            data: "stat_achat_devises=" + true,
            success: function(response) {
                var donnees = JSON.parse(response)
                if (donnees['achat_devises'] !== 'null') {
                    let achat_devises = donnees['achat_devises']
                    let labels_devises = []
                    let series_devises = []
                    achat_devises.forEach(function(devises) {
                        labels_devises.push(devises['devise'])
                        series_devises.push(parseFloat(devises['total_montant_net']))
                    })


                    var options_achat_devises = {
                   
                        chart: {
                            type: 'donut'
                        },
                        series: series_devises,
                        labels: labels_devises
                    }

                    var chart_achat_devises = new ApexCharts(document.querySelector("#chart_pie_achat_devises"), options_achat_devises);
                    chart_achat_devises.render()
                }
            }
        });

        /* recuperer et afficher les donnees des ventes de dévise */
        $.ajax({
            type: "GET",
            url: "controllers/dashboard_controller.php",
            data: "stat_vente_devises=" + true,
            success: function(response) {
                var donnees = JSON.parse(response)
                if (donnees['vente_devises'] !== 'null') {
                    let vente_devises = donnees['vente_devises']
                    let labels_devises = []
                    let series_devises = []
                    vente_devises.forEach(function(devises) {
                        labels_devises.push(devises['devise'])
                        series_devises.push(parseFloat(devises['total_montant_net']))
                    })

                    var options_vente_devises = {
                        chart: {
                            type: 'donut'
                        },
                        series: series_devises,
                        labels: labels_devises
                    }

                    var chart_vente_devises = new ApexCharts(document.querySelector("#chart_pie_vente_devises"), options_vente_devises);
                    chart_vente_devises.render()
                }
            }
        });

        // Transactions western union - ria et moneygram
        var options = {
            series: [{
                name: 'Western Union',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }, {
                name: 'Money Gram',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
                name: 'RIA',
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            yaxis: {
                title: {
                    text: 'F-CFA (milliers)'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "F-CFA " + val + " milliers"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart_transactions"), options);
        chart.render();
    });
</script>