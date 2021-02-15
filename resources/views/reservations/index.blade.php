@extends('layouts.master')

@section('content')
<div class="container-fluid">

<div class="card-group">
                </div>
</div>


                       <div class="card mb-4">
                            <div class="card-header">
                            </div>
                            <div class="card-header">
                                            <form method="post" action="">                                                    
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-2" >
                                                        <label class="control-label">{{ __('Début') }}: </label>
                                                        <input class="form-control" value="{{$date_debut ?? ''}}" name="date_debut" type="date" />
                                                    </div>

                                                    <div class="col-md-2" >
                                                        <label class="control-label">{{ __('Fin') }}: </label>
                                                        <input class="form-control" value="{{$date_fin ?? ''}}" name="date_fin" type="date" />
                                                    </div>


                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="control-label">{{ __('Etat') }}: </label>
                                                            <select class=" form-control" name="state">
                                                                <option value="">{{ __('Please choose...') }}</option>
                                                                <option value="1"
                                                                    <?php if($state == 1) echo "selected"; ?>
                                                                >Réglé</option>
                                                                <option value="2"

                                                                    <?php if($state == 0) echo "selected"; ?>

                                                                >non Réglé</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-2" style="padding:35px;">
                                                        <button type="submit" class="row btn btn-primary" >
                                                            Filtrer
                                                        </button>                                                                                                        
                                                    </div>


                                        </form>

                                                </div>
                            </div>

 

                            <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>fullname</th>
                                                <th>phone</th>
                                                <th>stade</th>
                                                <th>prix</th>
                                                <th>crenau</th>
                                                <th>date</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($reservations as $reservation)                                            
                                            <tr>
                                                <td>
                                                    {{$reservation->created_at ?? ''}}
                                                </td>
                                                <td width="20%">                                                                                                 

                                                 </td>

                                                <td>              
                                                    {{$reservation->total ?? '0'}} DA
                                                </td>
                                                <td>              
                                                    {{$reservation->versement ?? '0'}} DA
                                                </td>

                                                <td  class="text-warning">              
                                                    {{$reservation->total - $reservation->versement ?? '0'}} DA
                                                </td>

                                                <td>
                                                    @if($reservation->total == $reservation->versement)
                                                        <span class="badge badge-success">Argent Réglée</span>
                                                    @else
                                                        <span class="badge badge-danger">Argent Non Réglée</span>
                                                    @endif
                                                    <br>
                                                    @if($reservation->regle == 1)
                                                        <span class="badge badge-success">Travail Réglée</span>
                                                    @else
                                                        <span class="badge badge-danger">Travail Non Réglée</span>
                                                    @endif




                                                </td>

                                                 
                                                <td >
                                                    <div class="table-action">  

                                                        <div class="dropdown">
                                                          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{$reservation->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Actions
                                                          </button>
                                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$reservation->id}}">
                                                        
                                                        
                                                                <button type="button" class="dropdown-item regler" data-toggle="modal" data-target="#regler" id="{{$reservation->id}}">
                                                                    Régler
                                                                </button>
                                                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal{{$reservation->id}}">
                                                            Docs
                                                            </button>
                                                        
                                                            <a href=""
                                                                class="dropdown-item">
                                                                télécharger BC
                                                            </a>
                                                          </div>
                                                        </div>
                                                    </div>


                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            @endsection
@section('scripts')
<script>
function watchWilayaChanges() {
            $('#wilaya_select').on('change', function (e) {
                e.preventDefault();
                var $communes = $('#commune_select');
                var $communesLoader = $('#commune_select_loading');
                var $iconLoader = $communes.parents('.input-group').find('.loader-spinner');
                var $iconDefault = $communes.parents('.input-group').find('.material-icons');
                $communes.hide().prop('disabled', 'disabled').find('option').not(':first').remove();
                $communesLoader.show();
                $iconDefault.hide();
                $iconLoader.show();
                $.ajax({
                    dataType: "json",
                    method: "GET",
                    url: "/api/static/communes/ " + $(this).val()
                })
                    .done(function (response) {
                        $.each(response, function (key, commune) {
                            $communes.append($('<option>', {value: commune.id}).text(commune.name));
                        });
                        $communes.prop('disabled', '').show();
                        $communesLoader.hide();
                        $iconLoader.hide();
                        $iconDefault.show();
                    });
            });
        }

        $(document).ready(function () {
            watchWilayaChanges();
            $('.regler').on('click', function(event){
                var id = this.id;
                $('#formregler').attr('action','/traduction/regler/'+id)
            })


        });
        
        /**
         * 
         */
</script>

@endsection