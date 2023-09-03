 <div class="container register-body">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="container">
                 @if(session()->has('message'))
                <div class="flex flex-row justify-center my-2 alert alert-success">
                     {{session('message')}}
                </div>
                @endif
                <h2 class="register-title pb-4">{{__('ui.cosaVendere')}}</h2>
                <form wire:submit.prevent="store">
                    <div class="mb-3">
                        <label for="title" class="form-label register-text">{{__('ui.titolo')}}</label>
                        <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label register-text">{{__('ui.descrizione')}}</label>
                        {{-- <input type="text" wire:model="body" class="form-control @error('body') is-invalid @enderror"> --}}
                        <div class="form-floating">
                            <textarea wire:model="body" class="form-control p-0 text-area-homemade" rows="15" cols="30"  @error('title') is-invalid @enderror"></textarea>
                           
                          </div>
                        @error('body')
                        {{$message}}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label  register-text">{{__('ui.prezzo')}}</label>
                        <input type="number" min="0" step="0.1" wire:model="price" class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                        {{$message}}
                        @enderror
                    </div>
                    {{-- Category --}}
                    <div class="mb-3">   
                        <label for="category" class="form-label register-text">{{__('ui.categoria')}}</label>
                        <select wire:model.defer="category" id="category" class="form-control @error('category') is-invalid @enderror">
                            <option value="">{{__('ui.categoria')}}</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        {{$message}}
                        @enderror
                    </div>
                        <div>     
                            <!-- IMMAGGINE -->                   
                            <div class="mb-3">
                                <label for="immagine" class="form-label register-text">{{__('ui.immagini')}}</label>
                                <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error ('temporary_images.*') is-invalid @enderror " placeholder="Img"/> 
                                @error ('temporary_images.*')
                                <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror  
                            </div>
                            @if(!empty($images))
                            <div class="row">
                                <div class="col-12">
                                    <p>{{__('ui.photoPreview')}}:</p>
                                    <div class="row border border-4 border-info rounded shadow py-4">
                                        @foreach($images as $key => $image)
                                        <div class="col my-3">
                                            {{-- <img src="{{$image->temporaryUrl()}}" class="img-fluid mx-auto shadow rounded" alt=""> --}}
                                            <div class="img-preview mx-auto shadow rounded"
                                            style="background-image: url({{$image->temporaryUrl()}})">
                                            </div>
                                            <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">{{__('ui.cancella')}}</button>
                                        </div> 
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            
                        
                    </div>
                    <div class="d-flex justify-content-end">     
                        <button type="submit" class="register-btn my-3 shadow">{{__('ui.crea')}}</button>
                    </div>
                    
                </form>
            </div>   
        </div>
        <div class=" col-6 d-none d-sm-none d-md-block row">
            <img class="create-img" src="/img/cinese1.png" alt="">
        </div>
        
    </div>
</div>






