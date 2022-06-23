<div class="container p-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-header-home bold {{__('messages.text')}}">
                    {{__('messages.Add Review')}}
                </h3>
                <div class="card-body bg-light">
                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissible alert-white rounded">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="icon">
                                <i class="bi bi-check"></i>
                            </div>
                            <strong>Success!</strong>
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="some-details {{__('messages.text')}}">
                                <img src="{{asset('assets/images/products')}}/{{$orderItem->product->image}}" width="100" alt="">
                                <span class="">{{$orderItem->product->name}}</span>
                            </div>
                            <form wire:submit.prevent="addReview" class=" {{__('messages.text')}}">
                                <div class="{{__('messages.text')}}">
                                    <h5>{{__('messages.Your Rating')}}</h5>
                                    <span class="rating">
                                        <label for="rated-1">
                                            <input type="radio" name="rating" id="rated-1" value="1" wire:model="rating">
                                            <i class="bi bi-star-fill"></i>
                                        </label>
                                        <label for="rated-2">
                                            <input type="radio" name="rating" id="rated-2" value="2" wire:model="rating">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </label>
                                        <label for="rated-3">
                                            <input type="radio" name="rating" id="rated-3" value="3" wire:model="rating">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </label>
                                        <label for="rated-4">
                                            <input type="radio" name="rating" id="rated-4" value="4" wire:model="rating">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </label>
                                        <label for="rated-5">
                                            <input type="radio" name="rating" id="rated-5" value="5" wire:model="rating" checked="checked">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </label>
                                        @error('rating') <span class="text-danger">{{$message}}</span>@enderror
                                    </span>
                                    <p class="comment">
                                        <h5> {{__('messages.Your Comment')}}</h5>
                                        <div class="form-group">
                                            <textarea name="comment" class="form-control rounded" id="comment" cols="" rows="6" wire:model="comment"></textarea>
                                        </div>
                                        @error('comment') <span class="text-danger">{{$message}}</span>@enderror
                                    </p>
                                    <p class="submit">
                                        <input type="submit" value="{{__('messages.Submit')}}" class="btn btn-outline-primary rounded bold">
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .rating {
    display: inline-block;
    position: relative;
    height: 50px;
    line-height: 50px;
    font-size: 30px;
    }

    .rating label {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        cursor: pointer;
    }

    .rating label:last-child {
        position: static;
    }

    .rating label:nth-child(1) {
        z-index: 5;
    }

    .rating label:nth-child(2) {
        z-index: 4;
    }

    .rating label:nth-child(3) {
        z-index: 3;
    }

    .rating label:nth-child(4) {
        z-index: 2;
    }

    .rating label:nth-child(5) {
        z-index: 1;
    }

    .rating label input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
    }

    .rating label .bi {
        float: left;
        color: transparent;
    }

    .rating label:last-child .bi {
        color: rgb(206, 203, 203);
    }

    .rating:not(:hover) label input:checked ~ .bi,
    .rating:hover label:hover input ~ .bi {
        color: rgb(250, 156, 55);
    }

    .rating label input:focus:not(:checked) ~ .bi:last-child {
        color: rgb(184, 162, 162);
        text-shadow: 0 0 5px rgb(250, 156, 55);
    }
</style>
