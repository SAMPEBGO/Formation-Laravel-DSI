<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;
use App\Exports\ProduitsExport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ProduitFormRequest;


class MainController extends Controller
{
    //
    public function afficheAccueil()
    {
        return view('pages.front-office.welcome',
        [
            'nom' => 'Service en ligne',
            'nomMinistere' => 'Ministère de l\'Economie Numérique des Postes et de la Transformation Digitales'
        ]
        );
    }

    public function afficheProcedure($param)
    {   //Fonction retournant une page avec des params recemment entrés

        return view('pages.front-office.procedure',
        [
            'parametre'  => $param,
        ]
    );
    }
    //Fonction pour créer un nouveau produit 1re approche
    public function ajoutProduit()
    {
         $produit = New Produit();


        $produit->uuid = Str::uuid();
        $produit->désignation = 'Tomate';
        $produit->description = 'Freedom to work on ideal projects. On GetLance, you run your own business and choose your own clients and projects. Just complete your profile and we’ll highlight ideal jobs. Also search projects, and respond to client invitations. Wide variety and high pay. Clients are now posting jobs in hundreds of skill categories, paying top price for great work. More and more success. The greater the success you have on projects, the more likely you are to get hired by clients that use GetLance.';
        $produit->prix = '1000';
        $produit->like = '21';
        $produit->pays_source = 'Burkina Faso';
        $produit->poids = '45.10';


        $produit->save();
       
    }

    //Foncrtion pour créer un nouveau produit 2è approche
    public function ajoutProduitEncore()
    {
        Produit::create(
            [
                'uuid' => Str::uuid(),
                'désignation' => 'Mangue',
                'description' => 'Mangue bien grosse et sucrée! yaa Proprè !',
                'prix' => 1500,
                'like' => 63,
                'pays_source' => 'Togo',
                'poids' => 89.5

            ]

            );

    }

    //fonction pour obtenir une liste de produit
    public function getList()
    {
        //$produits = Produit::all();
        //dump($listeproduit);

        //on peut remplacer all par paginate

        //retroune le premier produit
        $produit = Produit::first();
        //affiche les utilisateurs liés à ce produit
        $users = $produit->users;

        $user = User::first();
        //dd($user);
        
        //vu que les utilisateus sont vides on force pour lier un user à un produit
        // $produit->users()->attach($user->id);

       // $produits = $user->produits;

        // dd($produits);


        return view("pages.front-office.list-produits",[
            'lesproduits'=> Produit::paginate(10),
            'lescommandes'=> Commande::paginate(10)
        ]);

    }

    //fonction pour modifier un produit
    public function modifierProduit($id)
    {
        $ProduitModifie = Produit::Where("id", $id)->update([
            "désignation"=> "Orange",
            "description"=> "Nous venons de changer la désignation"

        ]);
        dd($ProduitModifie);
   

    }

    //fonction de suppression 1ere methode
    public function supprimerProduit($id)
    {
        # code...
        $ProduitSupprime = Produit::find($id);
        //dd($ProduitSupprime);

        $ProduitSupprime->delete();

        //permet de revenir sur la même page en actualisant
        return redirect()->back();
    }

    //fonction de suppression 2è methode
    public function supprimerProduits($id)
    {
        # code...
        $ProduitSupprimes = Produit::destroy($id); 
         //permet de revenir sur la même page en actualisant
         return redirect()->back()->with('statut','Supprimer avec succès');
         
         //ou definir la page qu"on veut rediriger après suppression
         //return redirect()->route('accueil');

    }

    //fonction de ajout commande
    public function ajouterCommande($id)
    {
       $commande = New Commande();
       $commande-> produit_id=$id;
       $commande-> uuid=Str::uuid();
       $commande-> save();
         return redirect()->back()->with('statutC','Commande ajoutée avec succès');
       
    }

    //fonction de suppression de commande
    public function supprimerCommande($id)
    {
        Commande::destroy($id);
        return redirect()->back()->with('Statut','Commande Supprimée avec succès');
        

    }

    public function ajouterProduit()
    {

        return view("pages.front-office.ajouter-produit");
    }

    

    public function enregistrerProduit(ProduitFormRequest $request)
    {

        // return view("pages.front-office.ajouter-produit");
        // dd($request);
        // dd($request->all());

        // $request->validate([
        //     "designation" => "required|min:5|max:255",
        //     "prix" => "required|numeric:2,5",
        //     "description" => "required|min:5|max:255",
        //     "poids" => "required|digits_between:1,2",
        //     "like" => "required|digits_between:1,2",
        //     "pays_source" => "required|min:3|max:255"
        // ]);
        // dd($request);

        $produit = Produit::create([

            'uuid' => Str::uuid(),
            'designation' =>$request->designation,
            'prix' =>$request->prix,
            'description' =>$request->description,
            'pays_source' =>$request->pays_source,
            'like' => $request->like,
            'poids' => $request->poids
        ]);
        return view("pages.front-office.ajouter-produit");
    }

//fonction pour modifier un produit
// public function editProduit($id)
public function editProduit(Produit $produit)
{       

    dd($produit);
        // $produit = Produit::find($id);
        // dd($produit);
        return view("pages.front-office.edit-produit", [
            "produit" =>$produit,
        ]);


}


//fonction pour updater un produit
public function updateProduit(ProduitFormRequest $request,  $id)
{
        $produit = Produit::where("id", $id)->update([
            "designation" => $request->designation,
            "prix" => $request->prix,
            "description" => $request->description,
            "like" => $request->like,
            "pays_source" => $request->pays_source,
            "poids" => $request->poids

        ]);
        
        return redirect()->route("produits.liste")->with("statut", 'Produit modifié avec succès!');
}


public function excelExport()
{

   return Excel::download(new ProduitsExport, "Produits.xls");
}
    
}
