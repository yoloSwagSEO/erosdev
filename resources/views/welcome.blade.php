@extends('layouts.app')
@section('script')
    <script>
        jQuery('document').ready(function($){
            let count = $('.external-link').length;
            $('.addLink').on('click',function(e){
               e.preventDefault();
               $('.linkcontainer').append('<div class="input-group mb-3" id="lien-'+count+'"> ' +
                   '<input type="text" class="form-control" placeholder="Lien..." name="link[]"> ' +
                   '<button class="btn btn-secondary removeLink" data-count="'+count+'" type="button">Retirer</button> ' +
                   '</div>');
                count++;
            });
            $(document).on('click','.removeLink',function(e){
               e.preventDefault();
               $('#lien-'+$(this).data('count')).remove();
            });
            $('.addPics').on('click',function(e){
                $('.dropzone').click();
            })
        });
    </script>
@endsection
@section('content')
    <form action="/store" method="post">
        @csrf

<fieldset class="bg-dark mt-2 p-3">
    <div class="row">
        <div class="col-md-4 col-12">
            <h2>Informations</h2>
            <p>Vos informations personnelles ne seront jamais divulguées à des tiers</p>
        </div>
        <div class="col-md-8 col-12">
            <div class="row">
                <div class="col-md-6 col-12">
                    <x-input id="firstName" label="Nom*" name="firstname" placeholder="Votre nom de famille" value="{{old('firstname','')}}"/>
                </div>
                <div class="col-md-6 col-12">
                    <x-input id="lastName" label="Prenom*" name="lastname" placeholder="Votre prenom" value="{{old('lastname','')}}"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    <x-input id="birthdate" label="Date de naissance*" type="date" name="birthdate" placeholder="jj/mm/aaaa" value="{{old('birthdate','')}}"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    <x-input id="codePostal" label="Code postal*" name="code_postal" placeholder="XXXXX" value="{{old('code_postal','')}}"/>
                </div>
                <div class="col-md-6 col-12">
                    <x-input id="ville" label="Ville*" name="ville" placeholder="Votre ville" value="{{old('ville','')}}"/>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label mt-4">J'accepte de tourner à visage découvert.</label>
                        </div>
                        <div class="col-12">
                            <div class="btn-group" role="group" >
                                <input type="radio" class="btn-check" name="visage" id="visage1" value="oui" autocomplete="off" required>
                                <label class="btn btn-outline-primary" for="visage1">Oui</label>
                                <input type="radio" class="btn-check" name="visage" id="visage2" value="non" autocomplete="off" required>
                                <label class="btn btn-outline-primary" for="visage2">Non</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>
<fieldset class="bg-dark mt-2 p-3">
    <div class="row">
        <div class="col-md-4 col-12">
            <h2>Contacts</h2>
            <p>Vos informations de contact ne seront jamais divulguées a des tiers</p>
        </div>
        <div class="col-md-8 col-12">
            <div class="row">
                <div class="col-md-6 col-12">
                    <x-input id="email" label="Email*" name="email" placeholder="Votre email" type="email" value="{{old('email','')}}"/>
                </div>
                <div class="col-md-6 col-12">
                    <x-input id="tel" label="Téléphone*" name="phone" placeholder="Votre numéro de téléphone" type="tel" value="{{old('phone','')}}"/>
                </div>
                <div class="col-12">
                    <x-input id="otherContact" label="Autre" name="otherContact" placeholder="Autre moyen de contact" value="{{old('otherContact','')}}" :required="false"/>
                </div>
            </div>
        </div>
    </div>
</fieldset>
<fieldset class="bg-dark mt-2 p-3">
    <div class="row">
        <div class="col-md-4 col-12">
            <h2>Présentation</h2>
            <p>Merci d'être précise pour un traitement rapide de votre dossier.</p>
        </div>
        <div class="col-12 col-md-8">
            <div class="row">
                <div class="col-12 col-md-6">
                    <x-input id="nickname" label="Pseudo*" name="nickname" placeholder="Choisir un pseudo" value="{{old('nickname','')}}"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="origine" class="form-label mt-4">Origine</label>
                        <select class="form-select" name="origine" id="origine" required>
                            <option>Caucasiennes</option>
                            <option>Moyen-Orient</option>
                            <option>Asie</option>
                            <option>Affrique</option>
                            <option>Latina</option>
                            <option>Autres</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    <x-input id="taille" label="Taille*" describeId="helpTaille" help="Votre taille en cm (ex. 165 pour 1m65)" name="taille" placeholder="Votre taille" type="number" value="{{old('taille','')}}"/>
                </div>
                <div class="col-md-6 col-12">
                    <x-input id="poids" label="Poids*" name="poids" describeId="poidsHelp" help="Votre poids en Kg (ex. 60 pour 60kg)" placeholder="Votre poids" type="number" value="{{old('poids','')}}"/>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label class="form-label mt-4">Tour de poitrine*</label>
                </div>
                <div class="col-md-4 col-6">
                    <x-input id="tp" :nolabel="true" describeId="tpHelp" help="ex. 85 pour 85B" name="tp" placeholder="XX" type="number" value="{{old('tp','')}}"/>
                </div>
                <div class="col-md-6 col-6">
                    <x-input id="bonnet" :nolabel="true" describeId="bonnetHelp" help="ex. B pour 85B" name="bonnet" placeholder="B" type="text" value="{{old('bonnet','')}}"/>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <x-epilation />
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label mt-4">Tatouages*</label>
                        </div>
                        <div class="col-12">
                            <div class="btn-group" role="group" >
                                <input type="radio" class="btn-check" name="tatouage" id="tatouage1" value="oui" autocomplete="off" required>
                                <label class="btn btn-outline-primary" for="tatouage1">Oui</label>
                                <input type="radio" class="btn-check" name="tatouage" id="tatouage2" value="non" autocomplete="off" required>
                                <label class="btn btn-outline-primary" for="tatouage2">Non</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label mt-4">Piercings*</label>
                        </div>
                        <div class="col-12">
                            <div class="btn-group" role="group" >
                                <input type="radio" class="btn-check" name="piercing" id="piercing1" value="oui" autocomplete="off" required>
                                <label class="btn btn-outline-primary" for="piercing1">Oui</label>
                                <input type="radio" class="btn-check" name="piercing" id="piercing2" value="non" autocomplete="off" required>
                                <label class="btn btn-outline-primary" for="piercing2">Non</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="presentation" class="form-label mt-4">Présentation*</label>
                        <textarea class="form-control" name="presentation" id="presentation" rows="5" data-lt-tmp-id="lt-317953" spellcheck="false" data-gramm="false" ></textarea>
                        <small class="form-text text-muted">Présentez-vous en quelques mots, si vous ne pratiquez pas certaines choses préciser le</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>
<fieldset class="bg-dark mt-2 p-3">
    <div class="row">
        <div class="col-md-4 col-12">
            <h2>Liens</h2>
            <p>Si vous avez des liens a nous partager (mym, onlyfan, compte pornhub, instagram ...)</p>
        </div>
        <div class="col-md-8 col-12">
            <div class="linkcontainer">

            </div>
            <button type="button" class="addLink btn btn-primary mt-2">Ajouter un lien</button>
        </div>
    </div>
</fieldset>
<fieldset class="bg-dark mt-2 p-3">
    <div class="row">
        <div class="col-md-4 col-12">
            <h2>Media(s)</h2>
            <p>Merci de joindre a minima 1 photo.</p>
            <p>Vous pouvez ajouter autan de photos/videos que vous le souhaitez, c'est un plus pour la sélection de votre dossier.</p>
        </div>
        <div class="col-md-8 col-12">
            <div id="uploadResult">

            </div>
            <div class="uploadBox text-center">
                <div id="my-dropzone" class="dropzone bg-primary">

                </div>
                <button type="button" class="btn btn-secondary addPics mt-2">Ajouter des photos/videos</button>
            </div>
        </div>
    </div>
</fieldset>
<div class="text-end">
    <input type="submit" class="btn btn-primary btn-lg mt-4 align-self-end" value="Sauvegarder">
</div>
    </form>
@endsection
