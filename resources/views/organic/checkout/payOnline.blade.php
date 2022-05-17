<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Online</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link rel="stylesheet" href="{{asset('organic/assets/css/payonline.css')}}">
</head>

<body>

    <div class="container">
        <div class="left">
            <div class="headphone">
                <img src="{{asset('organic/assets/img/bank/ACB.png')}}" alt="">
                <img src="{{asset('organic/assets/img/bank/DA.jpg')}}" alt="">
                <img src="{{asset('organic/assets/img/bank/PVC.jpg')}}" alt="">
                <img src="{{asset('organic/assets/img/bank/agribank.png')}}" alt="">
                <img src="{{asset('organic/assets/img/bank/QD.jpg')}}" alt="">
                <img src="{{asset('organic/assets/img/bank/TCB.jpg')}}" alt="">
                <img src="{{asset('organic/assets/img/bank/VCB.png')}}" alt="">
                <img src="{{asset('organic/assets/img/bank/BIDV.png')}}" alt="">

            </div>
            <div class="order">
                <h4 class="title">Số tiền thanh toán</h4>
                @php
                    $total = 0
                @endphp
                @foreach (session()->get('cart') as $cart )
                    @php
                        $total += $cart['price']
                    @endphp
                @endforeach
                <h1 class="price">{{number_format($total)}} <small>Vnd</small></h1>
            </div>
            <div class="arrow">
                <a href="{{route('checkout.cart')}}"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
        <div class="right">
            <h1 class="heading">Chi Tiết Thanh Toán</h1>
            <form action="">
                <div class="row card-holder">
                    <p>Ngân Hàng</p>
                    <div class="select-card">
                        <img src="{{asset('organic/assets/img/bank/master.png')}}" alt="">
                        <select name="" id="">
                            <option value="">(VCB) Ngân hàng Vietcombank</option>
                            <option value="">(AGR) Ngân hàng Agribank</option>
                            <option value="">(TCB) Techcombank</option>
                            <option value="">BIDV</option>
                            <option value="">(MBB) Ngân hàng MBBank</option>
                            <option value="">(DAB) Ngân hàng Đông Á</option>
                            <option value="">(PVC) Ngân hàng PVcombank</option>
                            <option value="">(ACB) Ngân hàng Á Châu</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <p>Tên</p>
                    <div class="txt-inp">
                        <input type="text" placeholder="Khách hàng">
                    </div>
                </div>
                <div class="row">
                    <p> Email </p>
                    <div class="txt-inp">
                        <input type="email" placeholder="abc@gmail.com">
                    </div>
                </div>
            </form>
            <div class="next-step">
                <p>Tiếp tục</p>
                <a href="{{route('creditcard.cart')}}"><i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

</body>

</html>
