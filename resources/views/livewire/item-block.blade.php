<div class="item-block w-72 relative text-white">
    
    <div class="item-block-color absolute h-full w-full top-0 left-0 z-0 p-6">
        <div class="h-full w-full bg-[length:100%_100%]" style="{{--background: linear-gradient(0deg, rgba(17,18,21,1) 75%, rgba(44,67,117,1) 100%); --}}{!!$background!!}"></div>
    </div>

    <div class="item-block-top relative bg-[length:288px] bg-top h-93" style="background-image: url('/imgs/diablo4-border-y.png');">
        {!!$title!!}
        @if ($image)
        <div class="w-16">{!!$image!!}</div>
        @endif
    </div>

    <div class="item-block-middle relative bg-[length:288px] bg-center bg-repeat-y pr-9 pl-9 pt-2" style="background-image: url('/imgs/diablo4-border-c.png');">
        {!!$content!!}
    </div>

    <div class="item-block-bottom relative bg-[length:288px] bg-top transform scale-y-[-1] h-93" style="background-image: url('/imgs/diablo4-border-y.png');">
        <div class="text-sm font-alegreya pt-2 pb-8 pr-8 pl-8 transform scale-y-[-1] text-right flex flex-col justify-start h-93">
            {!!$footer!!}
        </div>
    </div>

</div>
<div hidden class="top-6 right-8 right-7 pt-8 text-lg font-diablo-light pt-8 pt-7 pt-14 pb-2 h-[105px] pt-16 pr-24 pl-8 absolute top-0 h-full flex items-center"></div>
