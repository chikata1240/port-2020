
{{-- ユーザー情報 --}}
<div class="user_information_box">
    <a href="/user">
        <div class="user_information_link">
            {{-- 画像 --}}
            <div class="user_image">
                <img src="{{asset('/storage/img/'. $file_name)}}" alt="">
            </div>
            
            <div class="user_name">
                <div>Name</div>
                <div>{{ $name }}</div>
                <div>Arrival</div>
                <div>0</div>
            </div>
        </div>
    </a>
</div>