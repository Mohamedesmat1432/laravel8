@section('title','Sale Products Page')

<section>
    <div class="container p-5">
        <div class="row">
            {{-- <div class="col-md-2"></div> --}}
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Manage Sale Date')}}
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
                        <form class="form-horizontal {{__('messages.text')}}" wire:submit.prevent="updateSaleDate">
                            <div class="form-group ">
                                <label class="col-md-4 control-label bold">{{__('messages.Sale Date')}}</label>
                                <div class="col-md-12" wire:ignore>
                                    <input type="text" id="sale-date" placeholder="{{__('messages.YYYY-MM-DD')}}" class="form-control input-md w-100" wire:model="sale_date" >
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4 control-label bold">{{__('messages.Status')}}</label>
                                <div class="col-md-12">
                                    <select class="form-control rounded bold" wire:model="status">
                                        <option value="0">{{__('messages.Inactive')}}</option>
                                        <option value="1">{{__('messages.Active')}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-primary rounded bold">{{__('messages.Update')}}</button>
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
        $(function(){
            $('#sale-date').datetimepicker({
                format: 'Y-MM-DD',
            })
            .on('dp.change',function(e){
                var data = $('#sale-date').val();
                @this.set('sale_date',data);
            });
        });
    </script>
@endpush
