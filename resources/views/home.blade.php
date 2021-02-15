@extends('layouts.master')

@section('content')
        <div class="container-fluid">

        @if(Auth::guard('admin')->user()['is_super'] == 1)

            <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">{{Config::get('config.nbclients')}} Clients</h2>
                                        
                                    </div>
                                    
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body" >
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                
                                <div>
                                <h2 style="text-align: center;  "  ><B>Recette d'aujourd'hui</B></h2>
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                            class="set-doller">DA</sup>{{Config::get('config.totaljournee')}}</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total d'aujourd'hui
                                    </h6>
                                    
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                            class="set-doller">DA</sup>{{Config::get('config.versementjournee')}}</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Versement d'aujourd'hui
                                    </h6>

                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                            class="set-doller">DA</sup>{{Config::get('config.restejournee')}}</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Reste d'aujourd'hui
                                    </h6>
                                    
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                     <h2 style="text-align: center;"  ><B>Recette du Mois</B></h2>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 style="text-align: center;  " class="text-dark mb-1 font-weight-medium">{{Config::get('config.recettemois')}} DA</h2>
                                    </div>
                                    <h6 style="text-align: center;  " class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total du mois</h6>

                                    <div class="d-inline-flex align-items-center">
                                        <h2 style="text-align: center;  " class="text-dark mb-1 font-weight-medium">{{Config::get('config.versementmois')}} DA</h2>
                                    </div>
                                    <h6 style="text-align: center;  " class="text-muted font-weight-normal mb-0 w-100 text-truncate">Versement du mois</h6>
                                </div>

                                

                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 style="text-align: center;"  ><B>Recette de l'année</B></h2>
                                    <h2 class="text-dark mb-1 font-weight-medium">{{Config::get('config.nbtraductions')}}</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total des traductions</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                                </div>
                            </div>

                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 font-weight-medium">{{Config::get('config.totalcaisse')}} DA</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Caisse</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
@endif
                <div class="card mb-4">
                <br>
            <h1 style="text-align: center; color: black; " ><B>Traductions d'aujourd'hui</B></h1>
                <div class="card-body">
                    <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Date</th>

            <th>Client </th>

            <th>Total</th>

            <th>Versement</th>

            <th>Detail</th>

        </tr>

    </thead>

    <tbody>

                                         
    @foreach($tradtables as $traduction) 
        <tr>

            <td>{{$traduction->date }}</td>

            <td>{{$traduction->name }}-{{$traduction->prenom }}</td>

            <td>{{$traduction->total }}</td>

            <td>{{$traduction->versement }}</td>

            <td>

                        <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$traduction->idtraduction }}">
                    Detail
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$traduction->idtraduction }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{$traduction->idtraduction }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel{{$traduction->idtraduction }}">Detail sur la traduction</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                        @foreach($documents as $document) 

                            @if($document->traduction==$traduction->idtraduction)

                            <ul>
                                <li><B>Document</B>: {{$document->nom}}</li>
                                <li><B>Prix Unitaire</B>: {{$document->prix}}</li>
                                <li><B>Langue </B>:{{$document->langue}}</li>
                                <li><B>Nombre de Copie </B>:{{$document->nbcopie}}</li>
                                <li><B>Nombre de copie Imprime </B>:{{$document->nbimprimer}}</li>
                            </ul>

                            <hr>

                            @endif

                        @endforeach

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            
                        </div>
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