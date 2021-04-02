<x-master-layout titrePage='Burkina'>

<br>

<div class="container">
    <div class="row">
        {{-- <div class="col-md-6 offset-md-2"> --}}
            <div class="col-md-12">
            <h1 class="text-center">Modification d'un produit</h1>
    
            <form action="{{ route('produits.updates',$produit->id)}}" method="post" enctype="multipart/form-data">
                @method("PUT")

                @include('partials._produit-form',["btnTexte" => "Modifier"])
            </form>
            
        </div>

        
    </div>

</div>
    
</x-master-layout>