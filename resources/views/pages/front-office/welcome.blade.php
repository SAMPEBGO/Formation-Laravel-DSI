<x-master-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-3">{{$nom}}</h1>
                        <p class="lead">{{$nomMinistere}} </p>
                        <hr class="my-2">
                        <p>Pour souscriere à la procédure en ligne, veuillez vous connecter à votre compte et de cliquer sur <b>Nouvelle procedure!</b>

                        </p>
                        <p class="lead">
                            <a class="btn btn-danger btn-lg" href="Jumbo action link" role="button">Connexion</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4" >
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/300/200" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Faites votre demande </h4>
                        <p class="card-text">Votre demande en ligne en renseignant le formulaire</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/300/200" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Payez les frais</h4>
                        <p class="card-text">Payez directement les frais liés à votre demande</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/300/200" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Retirez votre dossier</h4>
                        <p class="card-text">Vous serez notifier pour aller recupere votre dossier</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>    