@section('title','Categories Page')

<section>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.All Categories')}}
                    <a href="{{route('admin.addcategory')}}" class="btn btn-outline-success rounded {{__('messages.floatx')}} bold">{{__('messages.Add New Category')}}
                    </a>
                </h3>
                <hr class="text-dark">
                <input type="text" class="form-control rounded mb-2" wire:model="searchItem" placeholder="{{__('messages.Search')}}...">

                <div>
                    @if (Session::has('message_success'))
                        <div class="alert alert-danger text-center" role="alert">{{Session::get('message_success')}}</div>
                    @endif
                    <table class="table table-striped table-bordered text-center t-sm table-responsive-md table-responsive-xl w-100 {{__('messages.text')}}">
                        <thead>
                            <th>ID</th>
                            <th>{{__('messages.Category Name')}}</th>
                            <th>{{__('messages.Category Slug')}}</th>
                            <th>{{__('messages.SubCategory')}}</th>
                            <th colspan="2" class="text-center">{{__('messages.Action')}}</th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>
                                        <ul class=" text-center m-0 p-0  ">
                                            @foreach ($category->subCategories as $scategory)
                                                <li class="mb-2 text-center">
                                                    <span>{{$scategory->name}}</span>
                                                    <a class="btn btn-outline-primary btn-sm rounded mx-2 bold" href="{{route('admin.editcategory',['category_slug'=>$category->slug,'scategory_slug'=>$scategory->slug])}}">
                                                        {{__('messages.edit')}}
                                                    </a>
                                                    <a class="btn btn-outline-danger btn-sm rounded bold" href="#" onclick="confirm('هل انت متأكد - حذف هذا القسم الفرعي؟') || event.stopImmediatePropagation()" wire:click.prevent="deleteSubCategory({{$scategory->id}})">
                                                        {{__('messages.delete')}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-primary btn-sm rounded bold" href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}">
                                            {{__('messages.edit')}}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-outline-danger btn-sm rounded bold" href="#" onclick="confirm('هل انت متأكد - حذف هذا القسم الرئيسي؟') || event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$category->id}})">
                                            {{__('messages.delete')}}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="links {{__('messages.text')}}">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
