@section('title','Home Category Page')

<section>
    <div class="container p-5">
        <div class="row">
            {{-- <div class="col-md-2"></div> --}}
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Manage Home Categories')}}
                </h3>
                <hr>
                <div class="card">
                    @if (Session::has('message_success'))
                        <div class="alert alert-success">
                            {{Session::get('message_success')}}
                        </div>
                    @endif
                    <div class="card-body bg-light">
                        <form class="form-horizontal {{__('messages.text')}}"  wire:submit.prevent="updateProductToCategory">
                            <div class="form-group ">
                                <label class="col-md-4 control-label bold">{{__('messages.Choose Categories')}}</label>
                                <div class="col-md-12" wire:ignore>
                                    <select  name="categories[]" class="form-select form-control  sel_categories rounded" multiple="multiple" wire:model="selected_categories">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4 control-label bold">{{__('messages.No_Of_Products')}}</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control rounded w-100" placeholder="{{__('messages.No_Of_Products')}}" wire:model="numberofproducts">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-primary bold rounded">{{__('messages.Update')}}</button>
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
            $('.sel_categories').select2();
            $('.sel_categories').on('change',function(e) {
                var data = $('.sel_categories').select2('val');
                @this.set('selected_categories',data);
            });
        });
    </script>
@endpush
