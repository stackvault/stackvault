@extends('layouts.app')

@section('content')
    <div class="text-base md:text-sm bg-gray-200 text-indigo-900 p-5 shadow-inner py-6">
        <div class="mb-5">Welcome to StackVault.io, home to a couple of nerds who think they can code.</div>

        <div class="md:w-5/6 w-full flex pr-8">
            <div class="h-48 h-auto w-48 border-l border-r border-b border-grey-light flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('https://ca.slack-edge.com/T4YLEAKFA-U502E7Q9M-e8ea453ebb33-512');" title="Ashley's mug">
            </div>
            <div class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <p class="text-sm text-grey-dark flex items-center">
                        Technical Lead
                    </p>
                    <div class="text-indigo-900 font-bold text-xl mb-2">Ashley Hindle</div>
                    <p class="text-grey-darker text-base">Technical Lead with over 102 years industry experience in leading teams deliver secure scalable software solutions. Also bald</p>
                </div>
            </div>
        </div>

        <div class="mt-6 md:w-5/6 w-full flex mr-0 ml-auto pl-8">
            <div class="border-r border-b border-l border-grey-light lg:border-r-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-l p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <p class="text-sm text-grey-dark flex items-center">
                        Technically Leader
                    </p>
                    <div class="text-indigo-900 font-bold text-xl mb-2">Daniel Simkus</div>
                    <p class="text-grey-darker text-base">Senior level PHP and Linux specialist. Also Laravel GOAT and try hard front end developer. Terrible DotA player</p>
                </div>
            </div>
            <div class="h-48 h-auto w-48 border-l border-t border-b border-grey-light flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-r text-center overflow-hidden" style="background-image: url('https://scontent-lhr8-1.xx.fbcdn.net/v/t1.0-9/72047529_10162289566740612_795382412270895104_o.jpg?_nc_cat=110&_nc_sid=110474&_nc_ohc=Wq42PcWO33MAX8e0Pp4&_nc_ht=scontent-lhr8-1.xx&oh=c49f50e9e729f61c490e4a249f2ed24c&oe=5E981B33');" title="Ashley's mug">
            </div>
        </div>

    </div>
@endsection