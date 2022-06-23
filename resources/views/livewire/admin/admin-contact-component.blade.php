@section('title','Contact Page')

<section>
    <div class="container p-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Contact Messages')}}
                </h3>
                <hr>
                <div>
                    <table class="table table-striped table-bordered border-2 table-responsive-sm table-responsive-md table-responsive-xl text-center">
                        <thead>
                            <th>{{__('messages.ID')}}</th>
                            <th>{{__('messages.Name')}}</th>
                            <th>{{__('messages.Email')}}</th>
                            <th>{{__('messages.Phone')}}</th>
                            <th>{{__('messages.Comment')}}</th>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{$contact->id}}</td>
                                    <td>{{$contact->name}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->phone}}</td>
                                    <td>{{$contact->comment}}</td>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="links">
                        {{$contacts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    nav svg{
        height: 30px;
    }
    nav .hidden{
        display: block !important;
    }
</style>
