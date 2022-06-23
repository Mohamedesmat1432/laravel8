@section('title','Edit Home Slider Page')

<section>
    <div class="container p-5">
        <div class="row">
            {{-- <div class="col-md-2"></div> --}}
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Edit Slider')}}
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
                        <form class="form-horizontal {{__('messages.text')}}" enctype="multipart/form-data" wire:submit.prevent="updateSlider">
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Title')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="title" class="form-control rounded w-100" wire:model="title" />
                                    @error('title')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Subtitle')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="subtitle" class="form-control rounded w-100" wire:model="subtitle"/>
                                    @error('subtitle')<p class="text-danger bold">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Link')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="link" class="form-control rounded w-100" wire:model="link"/>
                                    @error('link')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Price')}}</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="price" class="form-control rounded w-100" wire:model="price"/>
                                    @error('price')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-12 control-label bold">{{__('messages.Image')}}</label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control mb-3 rounded" wire:model="newimage"/>
                                    @error('newimage')<p class="text-danger">{{$message}}</p>@enderror
                                    @if ($newimage)
                                        <img src="{{$newimage->temporaryUrl()}}" width="80"/>
                                    @else
                                        <img src="{{asset('assets/images/sliders')}}/{{$image}}" width="80"/>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 control-label rounded bold">{{__('messages.Status')}}</label>
                                <div class="col-md-12">
                                    <select class="form-control rounded" wire:model="status">
                                        <option value="0">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-primary rounded bold {{__('messages.float')}}">{{__('messages.Update')}}</button>
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
