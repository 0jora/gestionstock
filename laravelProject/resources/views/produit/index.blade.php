@extends('layouts.master')

@section('content')

    <div class="">
       <div class="box">
         <div class="box-header">
           <h3 class="box-title">Tout Les Produits</h3>
         </div>
         <div class="box-body">
         <table class="table table-responsive">
            <thead>
                <tr>
                <th>Libelle</th>
                <th>Description</th>
                <th>Contité</th>
                <th>Modifier</th>
                </tr>
            </thead>

            <tbody>
                @foreach($produits as $prod)
                    <tr>
                        <td>{{$prod->libelle}}</td>
                        <td>{{$prod->description}}</td>
                        <td>{{$prod->qtestock}}</td>
                        <td><button class="btn btn-info" data-ptitle="{{$prod->libelle}}" 
                        data-pdesc="{{$prod->description}}" data-pqu="{{$prod->qtestock}}"
                        data-pid="{{$prod->id}}"
                        data-toggle="modal" data-target="#editanasModal">Modifier</button>
                        /
                        <button class="btn btn-danger" data-pid="{{$prod->id}}" data-toggle="modal" data-target="#deleteanasModal">Supprimer</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
         </table>
         </div>
       </div>
    </div>
   

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#anasModal">
       Ajouter un nouveau produit
    </button>

    <!-- Modal anas-->
    <div class="modal fade" id="anasModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Nouveau Produit</h4>
        </div>
            <form action="{{route('produit.store')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                  @include('produit.pform');
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
    </div>

    <!-- Modal anas-->
    <div class="modal fade" id="editanasModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modifier Produit</h4>
        </div>
            <form action="{{route('produit.update','test')}}" method="post">
                {{method_field('patch')}}
                {{csrf_field()}}
                <div class="modal-body">
                  <input type="hidden" id="prid" name="product_id" value="">
                  @include('produit.pform');
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
    </div>

    <!-- Modal anas-->
    <div class="modal fade modal-danger" id="deleteanasModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center" id="myModalLabel">Confirmer</h4>
        </div>
            <form action="{{route('produit.destroy','test')}}" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-body">
                  <p class="text-center">
                    Voulez vouz vraiment supprimer ce produit
                  </p>
                  <input type="hidden" id="prid" name="product_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Oui, supprimer</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
