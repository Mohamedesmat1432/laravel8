@section('title','Product Attributes Page')

<section>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.All Attributes')}}
                    <button type="button" class="btn btn-success bold rounded {{__('messages.floatx')}}" data-bs-toggle="modal" data-bs-target="#addAttribute">
                        {{__('messages.New Attribute')}}
                    </button>
                </h3>
                <hr>
                <div>
                    @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{session('message')}}
                        </div>
                    @endif
                    @if (session()->has('message_delete'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{session('message_delete')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-responsive-sm table-responsive-md table-responsive-xl text-center">
                        <thead>
                            <th>{{__('messages.ID')}}</th>
                            <th>{{__('messages.Attribute Name')}}</th>
                            <th>{{__('messages.Attribute Date')}}</th>
                            <th colspan="2" class="text-center">{{__('messages.Action')}}</th>
                        </thead>
                        <tbody>
                            @foreach ($pattributes as $pattribute)
                                <tr>
                                    <td>{{$pattribute->id}}</td>
                                    <td>{{$pattribute->name}}</td>
                                    <td>{{$pattribute->created_at}}</td>
                                    <td>
                                        <a  class="btn btn-outline-primary rounded bold btn-sm" data-bs-toggle="modal" href="#" data-bs-target="#editAttribute" wire:click.prevent="edit({{$pattribute->id}})">
                                            {{__('messages.edit')}}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-danger rounded bold btn-sm" href="#" onclick="confirm('are you sure, delete this Category?') || event.stopImmediatePropagation()" wire:click.prevent="deleteAttribute({{$pattribute->id}})">
                                            {{__('messages.delete')}}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="links {{__('messages.text')}}">
                        {{$pattributes->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade"  id="addAttribute" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Attribute</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group ">
                        <label class="col-md-4 control-label bold">Attribute Name</label>
                        <div class="col-md-12" >
                            <input type="text"  placeholder="Attribute Name" class="form-control input-md w-100" wire:model="name" >
                            @error('name')<p class="text-danger">{{$message}}</p>@enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger rounded bold" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary rounded bold" wire:click.prevent="addAttribute()">Submit</button>
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="editAttribute" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Attribute</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal"s>
                    <div class="form-group ">
                        <label class="col-md-4 control-label bold">Attribute Name</label>
                        <div class="col-md-12" >
                            <input type="text"  placeholder="Attribute Name" class="form-control input-md w-100" wire:model="name" >
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger rounded bold" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary rounded bold" wire:click.prevent="updateAttribute()">Update</button>
            </div>
        </div>
        </div>
    </div>
</section>
@push('scripts')
    <script>
        $(function () {
            window.livewire.on('addedAttribute',() => {
            $('#addAttribute').modal('hide');
        });
        window.livewire.on('updatedAttribute',() => {
            $('#editAttribute').modal('hide');
        });
        });

    </script>
@endpush
