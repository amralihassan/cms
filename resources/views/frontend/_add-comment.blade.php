<div class="comment_respond">
    <h3 class="reply_title">Leave a Reply <small><a href="#">Cancel reply</a></small></h3>
    <form class="comment__form" action="{{route('frontend.store.comment')}}" method="post">
        @csrf
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <p>Your email address will not be published.Required fields are marked </p>
        <div class="input__box">
            <textarea name="comment" placeholder="Your comment here">{{old('comment') }}</textarea>
            @error('comment')
                <div class="text-danger ">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="input__wrapper clearfix">
            <div class="input__box name one--third">
                <input type="text" placeholder="name" name="name" value="{{old('name')}}">
                @error('name')
                    <div class="text-danger ">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="input__box email one--third">
                <input type="email" placeholder="email" name="email" value="{{old('email') }}">
                @error('email')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="input__box website one--third">
                <input type="text" placeholder="website" name="url" value="{{old('url') }}">
                @error('url')
                    <div class="text-danger ">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="submite__btn">
            <button class="btn btn-primary" type="submit">Post Comment</button>
        </div>
    </form>
</div>
