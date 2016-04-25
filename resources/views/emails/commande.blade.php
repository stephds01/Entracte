<h1 style="font-size: 16px; text-align: center; margin: 0 auto 20px;">
    <img src="{{asset('img/logo.png')}}" alt="l'entracte" style="width: 40px; display: inline-block; vertical-align: middle">
    <span style="display: inline-block;width: 70%; vertical-align: middle">Votre commande N° {{$order->order_id}} est prise en compte par le Restaurant L'Entracte - pizzeria</span>
</h1>

<p>Bonjour {{$orderInfo->billing_first_name}} {{$orderInfo->billing_last_name}}</p>
<p>Nous avons bien enregistré votre commande et nous vous remercions. <br>
    Le restaurant à prévu de vous livrer le
    {{dayConvert(date('l',strtotime($order->created_date )+6000*($timezone+date("I"))))}}
    {{date('d',strtotime($order->created_date )+6000*($timezone+date("I")))}}
    {{dateConvert(date('F',strtotime($order->created_date )+6000*($timezone+date("I"))))}}
    {{date('Y',strtotime($order->created_date )+6000*($timezone+date("I")))}}
    à
    {{date('H:i',strtotime($order->created_date )+6000*($timezone+date("I")))}} à cette adresse :
    <span style="display: block; width: 100%; padding-left: 20px; margin: 10px auto;">
        <strong>
            {{ $orderInfo->billing_address_1 }} {{ $orderInfo->billing_address_2 }}
            {{ $orderInfo->billing_zip }} {{ $orderInfo->billing_city }}
        </strong>
    </span>
</p>

@if(empty($order->customer_note))
    <p>Votre commentaire : sans.</p>
@else
    <p>Votre commentaire : {{ $order->customer_note }}</p>
@endif

<h2>Rappel de votre Commande</h2>

<table align="center" border="1px" cellpadding="5px">
    <tr style="border: none">
        <th>Articles</th>
        <th>Options</th>
        <th>Prix Unitaire (hors options)</th>
        <th>Quantité</th>
        <th>Prix Total</th>
    </tr>

    @foreach($orderItems as $item)
        <tr style="border: none; text-align: center;">
            <td><strong>{{ $item->orderitem_name }}</strong></td>
            <td>
                @foreach($attrib as $v)
                    <?php $sku= $v->orderitem_id;
                    $opt=$v->orderitem_attribute_names;
                    $opt = explode('\\', $opt);
                    ?>
                    @foreach($opt as $k=>$val)
                        @if($val == '"value')
                            @if($sku == $item->orderitem_id)
                                <strong>{{str_replace('"', '', $opt[$k+2])}}</strong>
                                <br>
                            @endif
                        @endif
                    @endforeach
                @endforeach
            </td>
            <td><strong>{{ number_format(floatval($item->orderitem_price),2) }} €</strong></td>
            <td><strong>{{ $item->orderitem_quantity }}</strong></td>
            <td><strong>{{ number_format(floatval($item->orderitem_final_price),2) }} €</strong></td>

        </tr>
    @endforeach
    <tr style="border: none">
        <td colspan="5"></td>
    </tr>
    <tr style="border: none">

        <td colspan="4" style="text-align: right;">Sous-total</td>
        <td style="text-align: center;"><strong>{{ number_format(floatval($order->order_subtotal),2)}} €</strong></td>
    </tr>
    <tr style="border: none">
        <td colspan="4" style="text-align: right;">Réduction</td>
        <td style="text-align: center;"><strong>{{ number_format(floatval($order->order_discount),2)}} €</strong></td>
    </tr>
    <tr style="border: none">
        <td colspan="4" style="text-align: right;">Total</td>
        <td style="text-align: center;"><strong>{{ number_format(floatval($order->order_total),2) }} €</strong></td>
    </tr>
</table>