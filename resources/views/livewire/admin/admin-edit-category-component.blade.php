@section('title','Edit Category Page')

<section>
    <div class="container p-5">
        <div class="row">
            {{-- <div class="col-md-2"></div> --}}
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Edit Category')}}
                    <a href="{{route('admin.categories')}}" class="btn btn-outline-success rounded {{__('messages.floatx')}} bold">{{__('messages.All Categories')}}</a>
                </h3>
                <hr>
                <div class="card">
                    @if (Session::has('message_success'))
                        <div class="alert alert-success alert-dismissible text-center bold">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{Session::get('message_success')}}
                        </div>
                    @endif
                    <div class="card-body bg-light">
                        <form class="form-horizontal {{__('messages.text')}}" wire:submit.prevent="updateCategory">
                            <div class="form-group ">
                                <label class="col-md-12 control-label bold">{{__('messages.Category Name')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="{{__('messages.Category Name')}}" class="form-control input-md w-100" wire:model="name" wire:keyup="generateSlug">
                                    @error('name')<p class="text-danger bold">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-12 control-label bold">{{__('messages.Category Slug')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="{{__('messages.Category Slug')}}" class="form-control input-md w-100" wire:model="slug" >
                                    @error('slug')<p class="text-danger bold">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Parent category')}}</label>
                                <div class="col-md-12">
                                    <select class="form-control rounded bold" wire:model="category_id">
                                        <option value="">None</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
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
