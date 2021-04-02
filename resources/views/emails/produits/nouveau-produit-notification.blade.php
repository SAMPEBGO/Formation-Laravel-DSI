@component('mail::message')
# Bienvenue sur notre plateforme

un nouveau produit vient d'etre ajouter sur notre plateforme
## Designation  : {{$produit->designation}}
## Prix         :{{$produit->prix}} 
## Description  :{{$produit->description}} 

Ceci est un mail test.

@component('mail::button', ['url' => url("/produits/liste")])
connectez-vous
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent