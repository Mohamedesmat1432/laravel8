@section('title','Edit Product Page')

<section>
    <div class="container p-5">
        <div class="row">
            {{-- <div class="col-md-2"></div> --}}
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Edit Products')}}
                    <a href="{{route('admin.products')}}" class="btn btn-outline-success {{__('messages.floatx')}} bold rounded">{{__('messages.All Products')}}</a>
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
                        <form class="form-horizontal {{__('messages.text')}}" enctype="multipart/form-data" wire:submit.prevent="updateProduct">
                            <div class="form-row mb-3">
                                <div class="col">
                                    <label class="control-label bold w-100">{{__('messages.Product Name')}}</label>
                                    <input type="text" placeholder="product name" width="500" class="form-control rounded w-100" wire:model="name" wire:keyup="generateSlug"/>
                                    @error('name')<p class="text-danger">{{$message}}</p>@enderror
                                </div>

                                <div class="col">
                                    <label class="control-label bold w-100">{{__('messages.Product Slug')}}</label>
                                    <input type="text" placeholder="{{__('messages.Product Slug')}}" class="form-control rounded w-100" wire:model="slug"/>
                                    @error('slug')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-row mb-3 ">
                                <div class="col" wire:ignore>
                                    <label class="control-label bold w-100 {{__('messages.text')}}">{{__('messages.Short Description')}}</label>
                                    <textarea type="text" id="short_description" placeholder="{{__('messages.Short Description')}}" class="form-control  w-100" wire:model="short_description" ></textarea>
                                    @error('short_description')<p class="text-danger">{{$message}}</p>@enderror
                                </div>

                                <div class="col" wire:ignore>
                                    <label class="control-label bold w-100">{{__('messages.Description')}} </label>
                                    <textarea type="text" id="description" placeholder="{{__('messages.Description')}}" class="form-control  w-100" wire:model="description" ></textarea>
                                    @error('description')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-row mb-3 ">
                                <div class="col">
                                    <label class="control-label bold w-100">{{__('messages.Regular Price')}}</label>
                                    <input type="text" placeholder="{{__('messages.Regular Price')}}" class="form-control rounded w-100" wire:model="regular_price"/>
                                    @error('regular_price')<p class="text-danger">{{$message}}</p>@enderror
                                </div>

                                <div class="col">
                                    <label class="control-label bold w-100">{{__('messages.Sale Price')}}</label>
                                    <input type="text" placeholder="{{__('messages.Sale Price')}}" class="form-control rounded w-100" wire:model="sale_price"/>
                                    @error('sale_price')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-row mb-3 ">

                                <div class="col">
                                    <label class="control-label bold w-100">{{__('messages.SKU')}}</label>
                                    <input type="text" placeholder="{{__('messages.SKU')}}" class="form-control rounded w-100" wire:model="SKU"/>
                                    @error('SKU')<p class="text-danger">{{$message}}</p>@enderror
                                </div>

                                <div class="col">
                                    <label class="control-label bold w-100">{{__('messages.Quantity')}}</label>
                                    <input type="text" placeholder="{{__('messages.Quantity')}}" class="form-control rounded w-100" wire:model="quantity"/>
                                    @error('quantity')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-row mb-3 ">

                                <div class="col">
                                    <label class="control-label bold w-100">{{__('messages.Image')}}</label>
                                    <input type="file" class="form-control rounded" wire:model="newimage"/>
                                    @if ($newimage)
                                        <img src="{{$newimage->temporaryUrl()}}" width="80"/>
                                    @else
                                        <img src="{{asset('assets/images/products')}}/{{$image}}" width="80"/>
                                    @endif
                                    @error('newimage')<p class="text-danger">{{$message}}</p>@enderror
                                </div>

                                <div class="col">
                                    <label class="control-label bold w-100">{{__('messages.Images')}}</label>
                                    <input type="file" class="form-control  rounded" wire:model="newimages" multiple/>
                                    @if ($newimages)
                                        @foreach ($newimages as $newimage)
                                            @if ($newimage)
                                                <img src="{{$newimage->temporaryUrl()}}" width="80"/>
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach ($images as $image)
                                            @if ($image)
                                                <img src="{{asset('assets/images/products')}}/{{$image}}" width="80"/>
                                            @endif
                                        @endforeach
                                    @endif
                                    @error('newimage')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-row mb-3 ">

                                <div class="col">
                                    <label class="control-label bold w-100">{{__('messages.Stock')}}</label>
                                    <select class="form-control rounded" wire:model="stock_status">
                                        <option value="instock">{{__('messages.In Stock')}}</option>
                                        <option value="outstock">{{__('messages.Out Of Stock')}}</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <label class="control-label bold w-100">{{__('messages.Featured')}}</label>
                                    <select class="form-control rounded" wire:model="featured">
                                        <option value="0">{{__('messages.No')}}</option>
                                        <option value="1">{{__('messages.Yes')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row mb-3 ">
                                <div class="col">
                                    <label class="control-label bold w-100">{{__('messages.Category')}}</label>
                                    <select class="form-control rounded" wire:model="category_id" wire:change="changeSubcategory">
                                        <option value="">{{__('messages.Select Category')}}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col">
                                    <label class="control-label bold w-100">{{__('messages.SubCategory')}}</label>
                                    <select class="form-control rounded" wire:model="scategory_id">
                                        <option value="0">{{__('messages.Select SubCategory')}}</option>
                                        @foreach ($scategories as $scategory)
                                            <option value="{{$scategory->id}}">{{$scategory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-row mb-3">
                                    <label class="control-label bold w-100">{{__('messages.product Attribute')}}</label>
                                    <div class="col-md-10">
                                        <select class="form-control rounded" wire:model="attribute">
                                            <option value="0">{{__('messages.product Attribute')}}</option>
                                            @foreach ($pattributes as $pattribute)
                                                <option value="{{$pattribute->id}}">{{$pattribute->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-outline-primary rounded btn-sm" wire:click.prevent="add">{{__('messages.add')}}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                @foreach ($inputs as $key => $value)
                                    <div class="form-row mb-3">
                                        <label class="control-label bold w-100 {{__('messages.text')}}">{{$pattributes->where('id',$attribute_arr[$key])->first()->name}}</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control rounded"  placeholder="{{$pattributes->where('id',$attribute_arr[$key])->first()->name}}" wire:model="attribute_values.{{$value}}">
                                        </div>
                                        <div class="col-md-2">
                                            <a class="btn btn-outline-danger rounded btn-sm" wire:click.prevent="remove({{$key}})">{{__('messages.remove')}}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <button type="submit" class="btn btn-outline-primary {{__('messages.float')}} rounded bold">{{__('messages.Update')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>

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
