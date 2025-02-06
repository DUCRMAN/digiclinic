@extends('layout')
@section('user_content')
@section('title')
Repertoire patient
@endsection
<?php  
 $user_role_id=Session::get('user_role_id');
 $user_id=Session::get('user_id');
 $centre_id=Session::get('centre_id');
?>

<div class="app-body">
  <div class="row gx-3">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="card-title">Analayses à faire</h5>
          <div style="position: absolute; left: 350px;">
            <h4>Montant de la facture : 0 FCFA</h4>
          </div>
          <button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#patientModal">
            Payer
          </button>
          
        </div>
        <!-- Modal de sélection du patient -->
<div class="modal fade" id="patientModal" tabindex="-1" aria-labelledby="patientModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="patientModalLabel">Sélectionner un patient</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table" id="example">
          <thead>
            <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Téléphone</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php
              $patients = DB::table('tbl_patient')->get();
            @endphp
            @foreach ($patients as $patient)
            <tr>
              <td>{{ $patient->nom_patient }}</td>
              <td>{{ $patient->prenom_patient }}</td>
              <td>{{ $patient->telephone }}</td>
              <td>
                <button class="btn btn-outline-primary btn-sm select-patient" 
                        data-id="{{ $patient->patient_id }}" 
                        data-nom="{{ $patient->nom_patient }}" 
                        data-prenom="{{ $patient->prenom_patient }}">
                  Sélectionner
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <button class="btn btn-success" id="addNewPatient">Ajouter un patient</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal pour ajouter un patient -->
<div class="modal fade" id="addPatientModal" tabindex="-1" aria-labelledby="addPatientModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter un patient</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="addPatientForm">
          @csrf
          <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
          </div>
          <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
          </div>
          <div class="mb-3">
            <label for="telephone" class="form-label">Téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" required>
          </div>
          <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
      </div>
    </div>
  </div>
</div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table m-0 align-middle">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Libelle de l'analyse</th>
                  <th>Coût de l'analyse</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody id="selected-analyses">
                <!-- Les analyses ajoutées apparaîtront ici -->
              </tbody>
            </table>
          </div>
        </div>

        <div class="card-header d-flex align-items-center justify-content-between">
          <h5 class="card-title">Répertoire des analyses</h5>
          <a href="{{URL::to('add-analyse')}}" class="btn btn-primary ms-auto">Ajouter une analyse</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="example2" class="table truncate m-0 align-middle">
              <thead>
                <tr>
                  <th>Type d'analyse</th>
                  <th>Coût de l'analyse</th>
                  <th>Coût de l'analyse assuré</th>
                  <th>Actions</th>
                </tr>
              </thead>
              @php
                               $centre_id=Session::get('centre_id');
                               $analyse=DB::table('tbl_type_analyse')
                                            ->where('service',"laboratoire")
                                            ->get();
                          @endphp
              <tbody>
                @foreach ($analyse as $all_analyses)
                <tr>
                  <td>{{$all_analyses->libelle_analyse}}</td>
                  <td>{{$all_analyses->prix_analyse}} FCFA</td>
                  <td>{{$all_analyses->prix_analyse_assure}} FCFA</td>
                  <td>
                    <button class="btn btn-outline-success btn-sm add-analysis" 
                        data-id="{{$all_analyses->id_type_analyse}}" 
                        data-libelle="{{$all_analyses->libelle_analyse}}" 
                        data-prix="{{$all_analyses->prix_analyse}}">
                          Sélectionner
                </button>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@section('Datatable')
<script>
 $(document).ready(function () {
    // Tableau pour stocker les prestations sélectionnées
    let selectedAnalyses = [];

    $(document).on("click", ".add-analysis", function () {
    let prestationId = $(this).data("id");  // Correction ici
    let libelle = $(this).data("libelle");
    let prix = $(this).data("prix");

    // Vérifier si l'analyse est déjà ajoutée
    if (selectedAnalyses.includes(prestationId)) {
        alert("Cette analyse est déjà ajoutée !");
        return;
    }

    // Ajouter l'analyse
    selectedAnalyses.push(prestationId);
    let newRow = `
        <tr data-prestation-id="${prestationId}">
            <td>${$("#selected-analyses tr").length + 1}</td>
            <td>${libelle}</td>
            <td>${prix} FCFA</td>
            <td>
                <button class="btn btn-danger remove-analysis" data-id="${prestationId}">Supprimer</button>
            </td>
        </tr>
    `;
    $("#selected-analyses").append(newRow);
    updateTotal();
});


    // Supprimer une analyse du tableau
    $(document).on("click", ".remove-analysis", function () {
        let prestationId = $(this).data("id");

        // Retirer l'ID du tableau de suivi
        selectedAnalyses = selectedAnalyses.filter((id) => id !== prestationId);

        // Supprimer la ligne du tableau
        $(this).closest("tr").remove();
        updateTotal();
    });

    // Mise à jour total
    function updateTotal() {
    let total = 0;
    $("#selected-analyses tr").each(function () {
        let prix = parseFloat($(this).find("td:nth-child(3)").text()); 
        if (!isNaN(prix)) {
            total += prix;
        }
    });

    $(".card-header h4").text("Montant de la facture : " + total.toFixed(2) + " FCFA");
}

    // Bouton de paiement
    $("#payer-btn").click(function () {
        if (selectedAnalyses.length === 0) {
            alert("Veuillez sélectionner au moins une analyse avant de payer.");
            return;
        }

        let patientId = $("#patient-id").val(); // Récupérer l'ID du patient
        let total = calculateTotal(); // Calculer le montant total

        $.ajax({
    url: "{{ URL('/pay_analyse') }}",
    method: "POST",
    data: {
        _token: "{{ csrf_token() }}",
        patient_id: patientId,
        prestation_id: selectedAnalyses, // Liste des prestations sélectionnées
        total: total
    },
    success: function (response) {
        alert("Paiement enregistré avec succès !");
        location.reload();
    },
    error: function (xhr) {
        alert("Erreur lors du paiement");
        console.error(xhr.responseText);
    }
});

    });

   
    
});

</script>
<script>
 $(document).ready(function() {
    // Sélectionner un patient et effectuer le paiement
    $(document).on('click', '.select-patient', function() {
        let patientId = $(this).data('id');
        let nom = $(this).data('nom');
        let prenom = $(this).data('prenom');

        alert(`Patient sélectionné : ${nom} ${prenom}`);

        // Fermer la modale
        $('#patientModal').modal('hide');

        // Récupérer le token CSRF depuis la meta balise
        let csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Récupérer les prestations sélectionnées
        let prestationIds = [];
        $('#selected-analyses tr').each(function() {
            let prestationId = $(this).attr('data-prestation-id'); // Vérifie l'attribut data-prestation-id
            if (!prestationId) {
                // Si l'attribut data-prestation-id est absent, essaye de récupérer depuis une colonne cachée
                prestationId = $(this).find('.prestation-id').text().trim();
            }
            if (prestationId) {
                prestationIds.push(prestationId);
            }
        });

        if (prestationIds.length === 0) {
            alert("Aucune prestation sélectionnée !");
            return;
        }

        // Envoyer les données en AJAX
        $.ajax({
            url: "/payer-analyse",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                patient_id: patientId,
                prestation_id: prestationIds, // Tableau des prestations
                total: calculateTotal()
            },
            success: function(response) {
                alert("Paiement enregistré avec succès !");
                location.reload();
            },
            error: function(error) {
                console.log(error);
                alert("Une erreur est survenue lors du paiement.");
            }
        });
    });

    // Fonction pour calculer le total de la facture
    function calculateTotal() {
        let total = 0;
        $('#selected-analyses tr').each(function() {
            let prix = parseFloat($(this).find('td:eq(2)').text().replace(' FCFA', ''));
            total += isNaN(prix) ? 0 : prix;
        });
        return total;
    }
});

</script>

    <script>
      $(document).ready(function() {
      $("#example").DataTable();
      $("#example2").DataTable();
      $("#example3").DataTable();
      $("#example4").DataTable();
    });
      $("select").change(function(){
      if(confirm('Cliquez OK pour envoyer le patient vers le spécialiste')){
          {this.form.submit()} 
      }
      else $("select option:selected").prop("selected", false);
    });
    </script>
    
  
@endsection
@endsection