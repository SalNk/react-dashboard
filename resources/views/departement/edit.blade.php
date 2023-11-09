@extends('layout.layout')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Départements</h1>
            <hr class="mb-4">
            <div class="row g-4 settings-section">
                <div class="col-12 col-md-4">
                    <h3 class="section-title">Editer un département</h3>
                    <div class="section-intro">Settings section intro goes here. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. <a href="help.html">Learn more</a></div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="app-card app-card-settings shadow-sm p-4">

                        <div class="app-card-body">
                            <form class="settings-form" method="PUT" action='{{ route('departement.update', $departement->id) }}'>
                                @csrf
                                @method('PUT')

                                <div class="mb-3 row">
                                    <div class="col-md-9">
                                        <label for="setting-input-1" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="setting-input-1" name="name"
                                            placeholder="Saisir le Nom" value={{ $departement->name }}>
                                        <div class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="setting-input-1" class="form-label">Status</label>
                                        <select class="form-select w-auto" name="status">
                                            <option selected value="Actif">Actif</option>
                                            <option value="Suspendu">Suspendu</option>
                                            <option value="En congé">En congé</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn app-btn-primary">Mettre à jour</button>
                            </form>
                        </div><!--//app-card-body-->

                    </div><!--//app-card-->
                </div>
            </div><!--//row-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
@endsection
