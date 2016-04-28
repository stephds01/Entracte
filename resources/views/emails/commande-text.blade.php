Votre commande N° {{$order->order_id}} est prise en compte par le Restaurant L'Entracte - pizzeria

================================================

Bonjour {{$orderInfo->billing_first_name}} {{$orderInfo->billing_last_name}}

Nous avons bien enregistré votre commande et nous vous remercions.

Le restaurant à prévu de vous livrer le {{dayConvert(date('l',strtotime($order->created_date )+2400))}} {{date('d',strtotime($order->created_date )+2400)}} {{dateConvert(date('F',strtotime($order->created_date )+2400))}} {{date('Y',strtotime($order->created_date )+2400)}} à {{date('H:i',strtotime($order->created_date )+2400)}} à cette adresse :
{{ $orderInfo->billing_address_1 }} {{ $orderInfo->billing_address_2 }}
{{ $orderInfo->billing_zip }} {{ $orderInfo->billing_city }}

_______________________________

@if(empty($order->customer_note))
    Votre commentaire : sans.
@else
    Votre commentaire : {{ $order->customer_note }}
@endif
_______________________________


Rappel de votre Commande :
================================================

    @foreach($orderItems as $item)
        Articles : {{ $item->orderitem_name }}
                @foreach($attrib as $v)
                    <?php $sku= $v->orderitem_id;
                    $opt=$v->orderitem_attribute_names;
                    $opt = explode('\\', $opt);
                    ?>
                    @foreach($opt as $k=>$val)
                        @if($val == '"value')
                            @if($sku == $item->orderitem_id)
                                * {{str_replace('"', '', $opt[$k+2])}}
                            @endif
                        @endif
                    @endforeach
                @endforeach

        Prix Unitaires (hors options) : {{ number_format(floatval($item->orderitem_price),2) }} €
        Quantité : {{ $item->orderitem_quantity }}
        Prix total : {{ number_format(floatval($item->orderitem_final_price),2) }} €
        ______________
    @endforeach
______________

Sous-total : {{ number_format(floatval($order->order_subtotal),2)}} €

Réduction : {{ number_format(floatval($order->order_discount),2)}} €

Total : {{ number_format(floatval($order->order_total),2) }} €
