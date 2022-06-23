@section('title','Add Category Page')

<section>
    <div class="container py-5" >
        <div class="row ">
            {{-- <div class="col-md-2"></div> --}}

            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Add New Category')}}
                    <a href="{{route('admin.categories')}}" class="btn btn-outline-success rounded {{__('messages.floatx')}} bold">{{__('messages.All Categories')}}</a>
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
                        <form class="form-horizontal {{__('messages.text')}}" wire:submit.prevent="addCategory">
                            @csrf
                            <div class="form-group ">
                                <label class="col-md-12 control-label bold">{{__('messages.Category Name')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="{{__('messages.Category Name')}}" class="form-control rounded" wire:model="name" wire:keyup="generateSlug">
                                    @error('name')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-12 control-label bold">{{__('messages.Category Slug')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="{{__('messages.Category Slug')}}" class="form-control rounded" wire:model="slug">
                                    @error('slug')<p class="text-danger ">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-12 control-label bold">{{__('messages.Parent category')}}</label>
                                <div class="col-md-12">
                                    <select class="form-control item py-2 rounded" wire:model="category_id">
                                        <option value="">None</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-success rounded bold {{__('messages.float')}}">{{__('messages.Submit')}}</button>
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

