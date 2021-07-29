@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{$container_name}} : {{ __('Modifier la sous catégorie') }} {{$subcontainer->subcontainer_name}}</div>

                <div class="card-body">
                   

         <form  action="{{url('sous-categorie/modifier/'.$subcontainer->subcontainer_id.'/'.$subcontainer->container_id)  }}" method="POST">
         @csrf
         <div class="form-group row">
         <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
         <div class="col-md-6">
          <input type='text' class="form-control" value='{{$subcontainer->subcontainer_name}}' name="nom" required />
          </div>
         </div>
         
         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
                                </button>
                            </div>
         </div>
         
         </div>
        

</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
