<x-master-layout titrePage='Burkina'>

<br>

<div class="container">
    <div class="row">
        {{-- <div class="col-md-6 offset-md-2"> --}}
            <div class="col-md-12">
            <h1 class="text-center">Ajout d'un nouveau produit</h1>
    
            <form action="{{ route('produits.eregistrer')}}" method="post" enctype="multipart/form-data">
                @method("POST")

                @include('partials._produit-form',["btnTexte" => "Ajouter"])
            </form>
            
        </div>

        
    </div>

</div>
    
</x-master-layout>