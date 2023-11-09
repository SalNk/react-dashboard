@extends('layout.layout')

@section('content')
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <h1 class="app-page-title">Configuration</h1>
            <hr class="mb-4">
            <div class="row g-4 settings-section">
                <div class="col-12 col-md-4">
                    <h3 class="section-title">General</h3>
                    <div class="section-intro">Settings section intro goes here. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. <a href="help.html">Learn more</a></div>
                </div>
                <div class="col-12 col-md-8">
                    <div class="app-card app-card-settings shadow-sm p-4">

                        <div class="app-card-body">
                            <form class="settings-form" method="POST" action={{ route('config.store') }}>
                                @csrf
                                @method('post')

                                <div class="mb-3 row">
                                    <div class="mb-3 row">
                                        <div class="col-md-12">
                                            <label for="setting-input-1" class="form-label">Type</label>
                                            <select class="form-select" name="type">
                                                <option selected value="PAYMENT_DATE">Date de payement</option>
                                                <option value="APP_NAME">Nom de l'application</option>
                                                <option value="DEVELOPPER_NAME">Equipe de développement</option>
                                                <option value="ANOTHER">Autre option</option>
                                            </select>
                                           <div class="text-danger">
                                            @error('type')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="setting-input-1" class="form-label">Valeur</label>
                                        <input type="text" class="form-control" id="setting-input-1" name="value"
                                            placeholder="Saisir la valeur" value={{ old('value') }}>
                                        <div class="text-danger">
                                            @error('value')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn app-btn-primary">Enregistrer</button>
                            </form>
                        </div><!--//app-card-body-->

                    </div><!--//app-card-->
                </div>
            </div><!--//row-->
        </div><!--//container-fluid-->
    </div><!--//app-content-->
@endsection
