@section('title','Thankyou Page')

<div>
    <div class="container" style="padding: 62px">
        <div class=" text-center" style="padding: 50px 0">
            <h1>{{__('messages.Thank For You ')}}</h1>
            <p>{{__('messages.Continue To Add New Item Now')}}</p>
            <a href="/shop" class="btn btn-danger rounded"> {{__('messages.Continue Shop')}} </a>
        </div>
    </div>
</div>
