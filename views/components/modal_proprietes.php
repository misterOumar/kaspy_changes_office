<div class="offcanvas-bottom-example">
    <div class="offcanvas offcanvas-bottom m-auto col-10 " tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel" style="height:40%">
        <div class="offcanvas-header">
            <h5 id="offcanvasBottomLabel" class="offcanvas-title">Propriétés de...
            </h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <!-- Tableau propriété d'une salle-->
            <div class="table-responsive mb-1">
                <table class="table table-bordered text-nowrap text-center">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody class="propietes">
                        <tr>
                            <th scope="row" class="text-start">Crée le</th>
                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>

                            <td id="date_creation" class="text-start"></td>

                        </tr>
                        <tr>
                            <th scope="row" class="text-start">Crée par</th>
                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                            <td id="user_creation" class="text-start"></td>

                        </tr>
                        <tr>
                            <th scope="row" class="text-start">Crée sur le navigateur</th>
                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                            <td id="navigateur_creation" class="text-start"></td>

                        </tr>
                        <tr>
                            <th scope="row" class="text-start">Crée sur l'ordinateur</th>
                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                            <td id="ordinateur_creation" class="text-start"></td>

                        </tr>
                        <tr>
                            <th scope="row" class="text-start">Adresse ip du serveur à la création</th>
                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                            <td id="ip_creation" class="text-start"></td>

                        </tr>
                        <tr>
                            <th scope="row" class="text-start">Année de gestion</th>
                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                            <td id="annee_academique" class="text-start"></td>

                        </tr>
                        <tr>
                            <th scope="row" class="text-start">Ecole</th>
                            <td><i data-feather="check" class="text-success font-medium-5"></i></td>
                            <td id="ecole" class="text-start"></td>

                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<div id="pdf-modal">
    <iframe id="pdf-viewer" width="100%" height="500px"></iframe>
</div>