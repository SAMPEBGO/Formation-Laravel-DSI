@csrf

                <div class="row">
                <div class="form-group col-md-6">
                <label for="">Désignation</label>
                <input value = "{{ old('designation') ?? $produit-> designation }}" type="text" name="designation" id="" class="form-control" placeholder="" aria-describedby="helpId">
                @error('designation')
                <snall class="text-danger">{{$message}} </snall>
                {{-- <span>{{ $message}}</span> --}}
            @enderror    
            </div>

                <div class="form-group col-md-6">
                    <label for="">Prix</label>
                    <input  value = "{{ old('prix') ?? $produit-> prix }}" type="number" name="prix" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    @error('prix')
                    <snall class="text-danger">{{$message}} </snall>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                <label for="">Description</label>
                <input  value = "{{ old('description') ?? $produit-> description }}" type="Text" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId">
                @error('description')
                <snall class="text-danger">{{$message}} </snall>
                 @enderror
            </div>

            <div class="form-group col-md-6">
                <label for=""> Pays source</label>
                <select class="form-control" name="pays_source" id="">
                  <option value="{{ old('pays_source') ?? $produit->pays_source}}" selected>{{ old('pays_source') ?? $produit->pays_source}}</option>
                  <option value="Burkina Faso" {{ old('pays_source')=='Burkina' ? "selected": '' }}>Burkina Faso </option>
                  <option value="Senegal" {{ old('pays_source')=='Senegal' ? "selected": '' }}>Senegal</option>
                  <option value="Mali" {{ old('pays_source')=='Mali' ? "selected": '' }}>Mali</option>
                  <option value="Cote Divoire" {{ old('pays_source')=='Cote Divoire' ? "selected": '' }}>Cote Divoire</option>
                  <option value="Nigeria" {{ old('pays_source')=='Nigeria' ? "selected": '' }}>Nigeria</option>
                  <option value="Benin" {{ old('pays_source')=='Benin' ? "selected": '' }}>Benin</option>
                  <option value="Niger" {{ old('pays_source')=='Niger' ? "selected": '' }}>Niger</option>
                  <option value="Ghana" {{ old('pays_source')=='Ghana' ? "selected": '' }}>Ghana</option>
                </select>
                @error('pays_source')
                    <small class="tex-danger"> {{$message}}</small>            
                @enderror
              </div>               

                <div class="form-group col-md-6">
                    <label for="">Poids</label>
                    <input  value = "{{ old('poids') ?? $produit-> poids }}" type="number" name="poids" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    @error('poids')
                    <snall class="text-danger">{{$message}} </snall>
                 @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="">Like</label>
                    <input  value = "{{ old('like') ?? $produit-> like }}" type="number" name="like" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    @error('like')
                    <snall class="text-danger">{{$message}} </snall>
                 @enderror
                </div>

                <div class="form-group col-md-5 ml-3">
                    {{-- <input type="file" name="image" id="image" class="custom-file-input"> --}}
                    <input type="file" name="image" id="image" class="">
                    {{-- <label class="custom-file-label" for="image">Image</label> --}}
                    @error('image')
                    <snall class="text-danger">{{$message}} </snall>
                 @enderror
                </div>

                <button type="submit" class="btn btn-success btn-block btn-lg mb-5">{{ $btnTexte}}</button>
