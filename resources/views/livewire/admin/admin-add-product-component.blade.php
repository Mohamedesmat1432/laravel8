@section('title','Add Product Page')

<section>
    <div class="container py-5">
        <div class="row">
            {{-- <div class="col-md-2"></div> --}}
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Add New Product')}}
                    <a href="{{route('admin.products')}}" class="btn btn-outline-success rounded bold {{__('messages.floatx')}}">{{__('messages.All Products')}}</a>
                </h3>
                <hr>
                <div class="card">
                    <div class="card-body bg-light">
                        @if (Session::has('message_success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                {{Session::get('message_success')}}
                            </div>
                        @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label class="control-label bold w-100 {{__('messages.text')}}">{{__('messages.Product Name')}}</label>
                                    <input type="text" placeholder="{{__('messages.Product Name')}}" class="form-control rounded  w-100 " wire:model="name" wire:keyup="generateSlug"/>
                                    @error('name')<p class="text-danger">{{$message}}</p>@enderror
                                </div>

                                <div class="col">
                                    <label class="control-label bold w-100 {{__('messages.text')}}">{{__('messages.Product Slug')}}</label>
                                    <input type="text" placeholder="{{__('messages.Product Slug')}}" class="form-control rounded w-100 " wire:model="slug"/>
                                    @error('slug')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            {{-- <div class="form-row mb-3"> --}}

                                <div class="form-group" wire:ignore>
                                    <label class="control-label bold w-100 {{__('messages.text')}}">{{__('messages.Short Description')}}</label>
                                    <textarea type="text" id="short_description" placeholder="{{__('messages.Short Description')}}" class="form-control w-100 rounded" wire:model="short_description" ></textarea>
                                    @error('short_description')<p class="text-danger">{{$message}}</p>@enderror
                                </div>

                                <div class="form-group" wire:ignore>
                                    <label class="control-label bold w-100 {{__('messages.text')}}"> {{__('messages.Description')}}</label>
                                    <textarea type="text" id="description" placeholder="{{__('messages.Description')}}" class="form-control w-100 rounded" wire:model="description" ></textarea>
                                    @error('description')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            {{-- </div> --}}
                            <div class="form-row mb-3">

                                <div class="col">
                                    <label class="control-label bold w-100 {{__('messages.text')}}">{{__('messages.Regular Price')}}</label>
                                    <input type="text" placeholder="{{__('messages.Regular Price')}}" class="form-control rounded w-100 " wire:model="regular_price"/>
                                    @error('regular_price')<p class="text-danger">{{$message}}</p>@enderror
                                </div>

                                <div class="col">
                                    <label class="control-label bold w-100 {{__('messages.text')}}">{{__('messages.Sale Price')}}</label>
                                    <input type="text" placeholder="{{__('messages.Sale Price')}}" class="form-control rounded w-100 " wire:model="sale_price"/>
                                </div>
                            </div>
                            <div class="form-row mb-3 ">
                                <div class="col">
                                    <label class="control-label bold w-100 {{__('messages.text')}}">{{__('messages.SKU')}}</label>
                                    <input type="text" placeholder="{{__('messages.SKU')}}" class="form-control rounded w-100 " wire:model="SKU"/>
                                    @error('SKU')<p class="text-danger">{{$message}}</p>@enderror
                                </div>


                                <div class="col">
                                    <label class="control-label bold w-100 {{__('messages.text')}}">{{__('messages.Quantity')}}</label>
                                    <input type="text" placeholder="{{__('messages.Quantity')}}" class="form-control rounded w-100 " wire:model="quantity"/>
                                    @error('quantity')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            {{-- <div class="form-row mb-3 "> --}}

                                <div class="form-group">
                                    <label class="control-label bold w-100 {{__('messages.text')}}">{{__('messages.Image')}}</label>
                                    <input type="file" class="form-control rounded bold" wire:model="image"/>
                                    @error('image')<p class="text-danger">{{$message}}</p>@enderror
                                    @if ($image)
                                        <img src="{{$image->temporaryUrl()}}" width="80"/>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="control-label bold w-100 {{__('messages.text')}}">{{__('messages.Images')}}</label>
                                    <input type="file" class="form-control rounded bold" wire:model="images" multiple />
                                    @if ($images)
                                        @foreach ($images as $image)
                                            <img src="{{$image->temporaryUrl()}}" width="80"/>
                                        @endforeach
                                    @endif
                                    @error('image')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            {{-- </div> --}}
                            <div class="form-row mb-3 ">
                                <div class="col">
                                    <label class="control-label bold w-100 {{__('messages.text')}}">{{__('messages.Stock')}}</label>
                                    <select class="form-control rounded" wire:model="stock_status">
                                        <option value="instock">{{__('messages.In Stock')}}</option>
                                        <option value="outstock">{{__('messages.Out Of Stock')}}</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label class="control-label bold {{__('messages.float')}}">{{__('messages.Featured')}}</label>
                                    <select class="form-control rounded" wire:model="featured">
                                        <option value="0">{{__('messages.No')}}</option>
                                        <option value="1">{{__('messages.Yes')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mb-3">

                                <div class="col">
                                    <label class="control-label bold w-100 {{__('messages.text')}}" >{{__('messages.Category')}}</label>
                                    <select class="form-control rounded" wire:model="category_id" wire:change="changeSubcategory">
                                        <option value="">{{__('messages.Select Category')}}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')<span class="text-danger">{{$message}}</span>@enderror
                                </div>

                                <div class="col">
                                    <label class="control-label  bold w-100 {{__('messages.text')}}">{{__('messages.SubCategory')}}</label>
                                    <select class="form-control rounded" wire:model="scategory_id">
                                        <option value="0">{{__('messages.Select SubCategory')}}</option>
                                        @foreach ($scategories as $scategory)
                                            <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('scategory_id')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                            {{-- <div class="row"> --}}
                                <div class="form-row mb-3">
                                    <label class="control-label bold w-100 {{__('messages.p')}}-1 {{__('messages.text')}}">{{__('messages.product Attribute')}}</label>
                                    <div class="col">
                                        <select class="form-control rounded" wire:model="attribute">
                                            <option value="0">{{__('messages.product Attribute')}}</option>
                                            @foreach ($pattributes as $pattribute)
                                                <option value="{{$pattribute->id}}">{{$pattribute->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-outline-primary rounded btn-sm {{__('messages.float')}}" wire:click.prevent="add">{{__('messages.add')}}</a>
                                    </div>
                                </div>
                            {{-- </div> --}}
                            {{-- <div class="col"> --}}
                                @foreach ($inputs as $key => $value)
                                    <div class="form-row mb-3">
                                        <label class="control-label bold w-100 {{__('messages.p')}}-1 {{__('messages.text')}}">{{$pattributes->where('id',$attribute_arr[$key])->first()->name}}</label>
                                        <div class="col">
                                            <input type="text" class="form-control rounded"  placeholder="{{$pattributes->where('id',$attribute_arr[$key])->first()->name}}" wire:model="attribute_values.{{$value}}">
                                        </div>
                                        <div class="col">
                                            <a class="btn btn-outline-danger {{__('messages.float')}} rounded btn-sm" wire:click.prevent="remove({{$key}})">{{__('messages.remove')}}</a>
                                        </div>
                                    </div>
                                @endforeach
                            {{-- </div> --}}
                            <div class="form-row mt-5">
                                <div class="col">
                                    <button type="submit" class="btn btn-outline-success w-100 {{__('messages.float')}} rounded bold">{{__('messages.Submit')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        $(function() {
            tinymce.init({
                selector:'#short_description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description',sd_data);
                    });
                }
            });
            tinymce.init({
                selector:'#description',
                setup:function(editor){
                    editor.on('Change',function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description',d_data);
                    });
                }
            });
        })
    </script>
@endpush
