@extends('app')


@section('content')

    <button id="print" type="submit" class="pull-right btn btn-success btn-lg" onclick="window.print();return false">Imprimer</button>

    <div class="ent-print-container-global">
        <header>
            <h1 class="text-center"><img src="{{asset('img/logo.png')}}" alt="l'entracte restaurant"> Restaurant - Pizzeria L'Entracte</h1>
            <h2 class="text-center">Commande N° {{$order->order_id}}</h2>
        </header>
        <section>
            <div>
                <h3>Livraison</h3>

                <ul>
                    <li>Commandé :
                        le <strong>    {{dayConvert(date('l',strtotime($order->created_date )+3600*($timezone+date("I"))))}}
                            {{date('d',strtotime($order->created_date )+3600*($timezone+date("I")))}}
                            {{dateConvert(date('F',strtotime($order->created_date )+3600*($timezone+date("I"))))}}
                            {{date('Y',strtotime($order->created_date )+3600*($timezone+date("I")))}}
                            à
                            {{date('H:i',strtotime($order->created_date )+3600*($timezone+date("I")))}}
                        </strong>
                    </li>
                    <li>Livraison prévue :
                        le <strong>    {{dayConvert(date('l',strtotime($order->created_date )+6000*($timezone+date("I"))))}}
                            {{date('d',strtotime($order->created_date )+6000*($timezone+date("I")))}}
                            {{dateConvert(date('F',strtotime($order->created_date )+6000*($timezone+date("I"))))}}
                            {{date('Y',strtotime($order->created_date )+6000*($timezone+date("I")))}}
                            à
                            {{date('H:i',strtotime($order->created_date )+6000*($timezone+date("I")))}}
                        </strong>
                    </li>
                    <li>Paiement :
                        @if($order->orderpayment_type == 'payment_cash')
                            <strong>A régler - {{ paiement($order->orderpayment_type) }}</strong>
                        @elseif($order->orderpayment_type == 'payment_paypal')
                            <strong>Régler - {{ paiement($order->orderpayment_type) }}</strong>
                        @else
                            <strong>Type de règlement non accepté - {{ paiement($order->orderpayment_type) }}</strong>
                        @endif
                    </li>
                </ul>
            </div>
            <div>
                <h3>Client :
                    <span class="text-capitalize">
                        {{ $orderInfo->billing_last_name }}
                        {{ $orderInfo->billing_first_name }}
                    </span>
                </h3>

                <ul>
                    <li>livraison :
                        <strong>
                            {{ $orderInfo->billing_address_1 }}
                            {{ $orderInfo->billing_address_2 }}
                            {{ $orderInfo->billing_zip }}
                            {{ $orderInfo->billing_city }}
                        </strong>
                    </li>
                    <li>Téléphone : <strong>{{ $orderInfo->billing_phone_1 }}</strong></li>
                    <li class="custom_note">
                        <i class="fa fa-pencil-square-o"></i>
                        @if(empty($order->customer_note))
                            <span>Aucun commentaire</span>
                        @else
                            <span>{{ $order->customer_note }}</span>
                        @endif
                    </li>
                </ul>

            </div>
        </section>

        <section class="ent-detail-detailCommande" >
            <h2>Détails de la Commande</h2>

            <table align="center" border="1px" cellpadding="5px" width="60%">
                <tr>
                    <th class="text-center">Sku</th>
                    <th class="text-center">Articles</th>
                    <th class="text-center">Options</th>
                    <th class="text-center">Prix Unitaire (hors options)</th>
                    <th class="text-center">Quantité</th>
                    <th class="text-center">Prix Total</th>
                </tr>

                @foreach($orderItems as $item)
                    <tr class="text-center">
                        <td>{{ $item->orderitem_sku }}</td>
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
                <tr>
                    <td colspan="6" class="right"></td>
                </tr>
                <tr>

                    <td colspan="5" class="text-right">Sous-total</td>
                    <td class="text-center"><strong>{{ number_format(floatval($order->order_subtotal),2)}} €</strong></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">Réduction</td>
                    <td class="text-center"><strong>{{ number_format(floatval($order->order_discount),2)}} €</strong></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right">Total</td>
                    <td class="text-center"><strong>{{ number_format(floatval($order->order_total),2) }} €</strong></td>
                </tr>
            </table>
        </section>

    </div>
@stop