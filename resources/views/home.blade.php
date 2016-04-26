@section('meta')
    <meta http-equiv="refresh" content="60">
@stop
@extends('app')
@section('content')
    @include('pages.components.header')


    <section class="ent-home-container-global">
        @include('pages.components.menu')
        <div class="ent-bandeauTitre-container">
            <ul class="ent-bandeauTitre-titre">
                <li>Commandes du {{date('d', strtotime($date))}} {{dateConvert(date('F', strtotime($date)))}} {{date('Y', strtotime($date))}}
                    <button type="button" id="refresh_page" class=" pull-right btn btn-success">
                        <i class="fa fa-refresh"></i>
                    </button>
                </li>
            </ul>
        </div>
        <div class="ent-home-tab">

            <table align="center" border="1px"  cellpadding="5px"   width="95%" >
                <tr>
                    <th>Référence <br> commande</th>
                    <th>Heure <br> commande</th>
                    <th>Heure <br> livraison</th>
                    <th>Clients</th>
                    <th>Adresse</th>
                    <th>commentaires</th>
                    <th>Montant</th>
                    <th>Facture</th>
                    <th>Détails</th>
                </tr>

                @foreach($orderInfo as $item)
                    <tr
                            @if($item->order_state_id == 1 || $item->order_state_id == 4)
                            class="status"
                            @else
                            class="validate"
                            @endif
                            data-state="{{$item->order_state_id}}">
                        <td>{{ $item->order_id }}</td>
                        <td>{{ date('H:i',strtotime($item->created_date )+3600*($timezone+date("I")))}}</td>
                        <td>
                            {{ date('H:i',strtotime($item->created_date )+6000*($timezone+date("I")))}}

                        </td>
                        <td class="text-capitalize">{{ $item->billing_last_name }} {{ $item->billing_first_name }} <br>
                            {{$item->billing_phone_1 }}</td>
                        <td>{{ $item->billing_address_1 }}<br>
                            {{ $item->billing_zip }} {{ $item->billing_city }}
                        </td>
                        <td class="text-danger">{{$item->order->customer_note}}</td>
                        <td>{{ str_replace('.', ',',number_format(floatval($item->order_total), 2))}} €</td>
                        <td><a href="{{URL::to('/facture')}}/{{$item->order_id}}"><i class="fa fa-print fa-2x"></i></a></td>
                        <td><a href="{{ URL::to( '/commande') }}/{{ $item->order_id }}">
                                <i class="fa fa-plus fa-2x"></i></a>
                        </td>
                    </tr>
                @endforeach

                @if(count($orderInfo)=== 0)
                    <tr>
                        <td colspan="9">Aucune commande en attente</td>
                    </tr>
                @endif

            </table>
        </div>
        <section class="ent-home-footer">
            <div class="session">
                @if(Session::has('messageDay'))
                    <p class="text-danger message">
                        {{Session::get('messageDay')}}
                    </p>
                @endif
            </div>
            {!! Form::open(array('post' => 'HomeController@datePicker')) !!}
            <input type="text" name="day" id="date" placeholder="{{$dDay}}">
            <button class="btn btn-primary" type="submit" name="check" value="checkDay">
                <i class="fa fa-check"></i>
            </button>
            {!! Form::close() !!}
        </section>
    </section>
    @include('pages.components.footer')
@stop

