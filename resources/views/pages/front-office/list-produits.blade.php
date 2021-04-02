<x-master-layout titrePage='Burkina'>

 <div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Liste des Produits</h3>
            <div class="row">
            <div class="d-flex">
                @if (Auth::user()!=null && Auth::user()->isAdmin())
                    
               
                    <a href='{{route('produit.ajout')}}'  class="text-success"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:25px">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                        Ajouter
                    
                    </a>

                    <a href='{{route('export')}}'  class="text-info ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:25px">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H6a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4-1v8m0 0l3-3m-3 3L9 8m-5 5h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 00.707.293h3.172a1 1 0 00.707-.293l2.414-2.414a1 1 0 01.707-.293H20" />
                        </svg>
                        Exporter
                    </a>
                 @endif
            </div>

            </div>


            @if (session('statut'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    {{session('statut')}}
                </div>
            @endif
            @if ($lesproduits->count()>0)
                <table class="table table-hover">
                    <theard>
                        <tr>
                            <tr>
                                <td>Désignation</td>
                                <td>Prix</td>
                                <td>Pays Source</td>
                                <td>Image</td>
                            </tr>
                            
                        </tr>
                    </theard>
                    <tbody>
                        @foreach ($lesproduits as $produit)
                            <tr>
                                <td>{{$produit->designation}}</td>
                                <td>{{ bf_currency($produit->prix) }}</td> 
                                {{-- <td>{{ $produit->prix }} XOF</td> --}}
                                <td>{{$produit->pays_source}}</td>
                                <td><img class="" src="{{ asset('storage/produits-images/'.$produit->image) }}" width ="40px" height="40px" alt=""></td>
                                <td class="d-flex">
                                    
                                    {{-- <a href='{{route('delete',$produit->id)}}'  class="text-danger mr-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:25px" >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                 --}}
                                 <a href='#'  onClick="deleteConfirm('{{'produitItem'.$produit->id}}')" class="text-danger mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:25px" >
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                 </a>
                                <form  id="{{'produitItem'.$produit->id}}" 
                                    action="{{route('delete',$produit->id)}}" 
                                    method="GET" style="display: none;"> 
                                    @csrf
                                 </form>


                                    <a href='{{route('ajouterCommandes',$produit->id)}}'  class="text-success"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:25px">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                      </svg>
                                      
                                      <a href='{{route('produits.edit',$produit->id)}}'  class="text-info ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:25px" >
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                          </svg>

                                    
                                          
                               </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- permet d'afficher les produits par page-->
                {{$lesproduits->links()}}

            @else
                <p>Aucun produit n'a été trouvé</p>
            @endif

        </div>
        <div class="col-md-6">

            <h3>Liste des Commandes</h3>
            @if (session('statut'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    {{session('statut')}}
                </div>
            @endif
            @if ($lesproduits->count()>0)
                <table class="table table-hover">
                    <theard>
                        <tr>
                            <tr>
                                <td>Désignation</td>
                                <td>Prix</td>
                                <td>Pays Source</td>
                            </tr>
                            
                        </tr>
                    </theard>
                    <tbody>
                        @foreach ($lescommandes as $commande)
                            <tr>
                                <td>{{$commande->produit->prix}} XOF</td>
                                <td>{{$commande->produit->pays_source}}</td>
                                <td>
                                    <a href='{{route('deletecommande',$commande->id)}}'  class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="width:25px">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- permet d'afficher les commandes par page-->
                {{$lescommandes->links()}}

            @else
                <p>Aucun produit n'a été trouvé</p>
            @endif

        </div>
    </div>

 </div>
    
</x-master-layout>