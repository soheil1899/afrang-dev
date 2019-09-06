<div>
    @if($messege['title'] == 'message')
        <h2>
            A Contact Us Message
        </h2>
        <h3>
            Subject :
            {{ $messege['subject']}}
        </h3>
        <div>
            <strong>
                Full Name:
            </strong>
            {{ $messege['name'] }}
        </div>
        <div>
            <strong>
                Email:
            </strong>
            {{ $messege['email'] }}
        </div>
        <div>
            <strong>
                Phone:
            </strong>
            {{ $messege['phone'] }}
        </div>
        <div class="mt-5">
            <p class="mt-0 pt-0">
                <strong class="d-block">Message:
                </strong>
                {{$messege['mymessage'] }}
            </p>
        </div>


    @elseif($messege['title'] == 'order')
        <h2>
            An Order
        </h2>
        <div>
            <strong>
                Full Name:
            </strong>
            {{ $messege['name'] }}
        </div>
        <div>
            <strong>
                Email:
            </strong>
            {{ $messege['email'] }}
        </div>
        <div>
            <strong>
                Phone:
            </strong>
            {{ $messege['phone'] }}
        </div>
        <div>
            <strong>
                Location:
            </strong>
            {{ $messege['location'] }}
        </div>
        <div>
            <strong>
                Request:
            </strong>

            @foreach($messege['request'] as $key=>$request)
                @if($request == true && $key == 0)
                    | Website
                @elseif($request == true && $key == 1)
                    | Mobile App
                @elseif($request == true && $key == 2)
                    | Portal
                @elseif($request == true && $key == 3)
                    | Other
                @endif
            @endforeach

        </div>

        <div class="mt-5">
            <p class="mt-0 pt-0">
                <strong class="d-block">Message:
                </strong>
                {{$messege['description'] }}
            </p>
        </div>
    @endif
</div>