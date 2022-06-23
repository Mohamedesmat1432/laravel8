@section('title','Add Home Slider Page')

<section>
    <div class="container p-5">
        <div class="row">
            {{-- <div class="col-md-2"></div> --}}
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Add New Slider')}}
                    <a href="{{route('admin.homesliders')}}" class="btn btn-outline-success {{__('messages.floatx')}} rounded">
                        {{__('messages.All Sliders')}}
                    </a>
                </h3>
                <hr>
                <div class="card">
                    @if (Session::has('message_success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{Session::get('message_success')}}
                        </div>
                    @endif
                    <div class="card-body bg-light">
                        <form class="form-horizontal {{__('messages.text')}}" enctype="multipart/form-data" wire:submit.prevent="addSlider">
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Title')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Title" class="form-control rounded" wire:model="title" />
                                    @error('title')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Subtitle')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="subtitle" class="form-control rounded" wire:model="subtitle"/>
                                    @error('subtitle')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Link')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="link" class="form-control rounded" wire:model="link"/>
                                    @error('link')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Price')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="price" class="form-control  rounded" wire:model="price"/>
                                    @error('price')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Status')}}</label>
                                <div class="col-md-12">
                                    <select class="form-control px-3 py-2 item" name="State" wire:model="status">
                                        <option selected>Status</option>
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Image')}}</label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control mb-3 rounded" value="choose image" wire:model="image"/>
                                    @if ($image)
                                        <img src="{{$image->temporaryUrl()}}" width="80"/>
                                    @endif
                                    @error('image')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-success {{__('messages.float')}} rounded bold">Submit</button>
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

