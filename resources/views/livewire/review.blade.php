<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    <form wire:submit.prevent="store">
        @csrf
        <span>
 @error('subject')  <span class="text-danger">{{$message}}</span>@enderror
            <input wire:model="subject" type="text" placeholder="Subject"/>
            <input hidden type="text"/>

        </span>
        @error('review') <span class="text-danger">{{$message}}</span>@enderror
        <textarea wire:model="review" class="input" placeholder="Your comment"></textarea>

        @error('rate') <span class="text-danger">{{$message}}</span>@enderror
        <div class="rate">
            <strong class="text-uppercase">Rating:</strong></br>
            <input type="radio" id="star5" wire:model="rate" name="rate" value="5"/>
            <label for="star5" title="text">5 stars</label>
            <input type="radio" id="star4" wire:model="rate" name="rate" value="4"/>
            <label for="star4" title="text">4 stars</label>
            <input type="radio" id="star3" wire:model="rate" name="rate" value="3"/>
            <label for="star3" title="text">3 stars</label>
            <input type="radio" id="star2" wire:model="rate" name="rate" value="2"/>
            <label for="star2" title="text">2 stars</label>
            <input type="radio" id="star1" wire:model="rate" name="rate" value="1"/>
            <label for="star1" title="text">1 star</label>
        </div>

        @auth
            <input type="submit" class="btn btn-success pull-right" value="Save">
        @else
            <a href="/login" class="btn btn-default pull-right">For Submit Your Comment, Please Login</a>
        @endauth
    </form>
</div>
