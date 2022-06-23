@section('title','Home Slider Page')

<section>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Manage Home Sliders')}}
                    <a href="{{route('admin.addhomeslider')}}" class="btn btn-outline-success bold {{__('messages.floatx')}} rounded">
                        {{__('messages.Add New Slider')}}
                    </a>
                </h3>
                <hr>
                <div>
                    @if (Session::has('message_success'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{Session::get('message_success')}}
                        </div>
                    @endif
                    <table class="table table-striped table-responsive-sm table-responsive-md table-responsive-xl text-center table-bordered">
                        <thead>
                            <th>{{__('messages.ID')}}</th>
                            <th>{{__('messages.Image')}}</th>
                            <th>{{__('messages.Title')}}</th>
                            <th>{{__('messages.Subtitle')}}</th>
                            <th>{{__('messages.Price')}}</th>
                            <th>{{__('messages.Link')}}</th>
                            <th>{{__('messages.Status')}}</th>
                            <th>{{__('messages.Date')}}</th>
                            <th colspan="2" class="text-center">{{__('messages.Action')}}</th>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{$slider->id}}</td>
                                    <td><img src="{{asset('assets/images/sliders')}}/{{$slider->image}}" width="40" height="40" alt=""></td>
                                    <td>{{$slider->title}}</td>
                                    <td>{{$slider->subtitle}}</td>
                                    <td>{{$slider->price}}</td>
                                    <td>{{$slider->link}}</td>
                                    <td>{{$slider->status == 1 ? 'Active' : 'Inactive'}}</td>
                                    <td>{{$slider->created_at}}</td>
                                    <td>
                                        <a class="btn btn-outline-primary bold rounded btn-sm" href="{{route('admin.edithomeslider',['slider_id'=>$slider->id])}}">
                                            {{__('messages.edit')}}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-danger bold rounded btn-sm" href="#" onclick="confirm('هل انت متأكد من حذف هذه الخلفية؟') || event.stopImmediatePropagation()"  wire:click.prevent="deleteSlider({{$slider->id}})">
                                            {{__('messages.delete')}}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
