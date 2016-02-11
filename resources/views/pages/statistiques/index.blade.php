@extends('app')



@section('content')

    @include('pages.components.header')
    @include('pages.components.menu')


    <div class="ent-statistique-container-global">
        <div class="ent-bandeauTitre-container">
            <ul class="ent-bandeauTitre-titre"><li>Statistiques</li></ul>
        </div>

        <!-- stat jour -->
        <section>
            <h2>Jour :
                {!! Form::open(array('post' => 'StatistiquesController@datePicker')) !!}
                    <input type="text" name="day" id="date" placeholder="{{$dDay}}">
                    <button class="btn btn-primary" type="submit" name="check" value="checkDay">
                        <i class="fa fa-check"></i>
                    </button>
                {!! Form::close() !!}
            </h2>
            <article>
                @if(Session::has('messageDay'))
                    <p class="text-danger message">
                        {{Session::get('messageDay')}}
                    </p>
                @endif
                    <ul>
                        <li>Liquide : <span>{{$dCash}} €</span></li>
                        <li>Chèques : <span>{{$dMoneyorder}} €</span></li>
                        <li>Paypal : <span>{{$dPaypal}} €</span></li>
                        <li class="total alert-success">Total : <span>{{floatval($dTotal->sum('order_total'))}} €</span></li>
                        <li class="alert-danger">Paiement non finalisé : <span>{{floatval($dAbort->sum('order_total'))}} €</span></li>
                        <li class="alert-danger">Commande annulée : <span>{{floatval($dNul->sum('order_total'))}} €</span></li>
                        <li class="total">Nombre de commandes : <span>{{intval($dTotal->count())}}</span></li>
                    </ul>
            </article>
        </section>
        <!-- stat semaine -->
        <section>
            <h2>Semaine :
                {!! Form::open(array('post' => 'StatistiquesController@datePicker')) !!}
                    <input data-weekpicker="weekpicker" name="week" type="text"
                           @if(isset($week))
                           placeholder = "{{$week}}"
                           @else
                           placeholder="Choisir la semaine"
                           @endif
                    />
                    <button class="btn btn-primary" type="submit" name="check" value="checkWeek">
                        <i class="fa fa-check"></i>
                    </button>
                {!! Form::close() !!}
            </h2>
            <article>
                @if(Session::has('messageWeek'))
                    <p class="text-danger message">
                        {{Session::get('messageWeek')}}
                    </p>
                @endif
                <ul>
                    <li>Liquide : <span>{{$wCash}} €</span></li>
                    <li>Chèques : <span>{{$wMoneyorder}} €</span></li>
                    <li>Paypal : <span>{{$wPaypal}} €</span></li>
                    <li class="total alert-success">Total : <span>{{floatval($wTotal->sum('order_total'))}} €</span></li>
                    <li class="alert-danger">Paiement non finalisé : <span>{{floatval($wAbort->sum('order_total'))}} €</span></li>
                    <li class="alert-danger">Commande annulée : <span>{{floatval($wNul->sum('order_total'))}} €</span></li>
                    <li class="total">Nombre de commandes : <span>{{intval($wTotal->count())}}</span></li>
                </ul>
            </article>
        </section>
        <!-- stat mois -->
        <section>
            <h2>Mois :
                {!! Form::open(array('post' => 'StatistiquesController@datePicker')) !!}
                    <input type="text" name="monthYearPicker" id="monthYearPicker" placeholder="{{dateConvert(date('F'))}} {{date('Y')}}">
                    <button class="btn btn-primary" type="submit" name="check" value="checkMonth">
                        <i class="fa fa-check"></i>
                    </button>
                {!! Form::close() !!}
            </h2>
            <article>
                @if(Session::has('messageMonth'))
                    <p class="text-danger message">
                        {{Session::get('messageMonth')}}
                    </p>
                @endif
                    <ul>
                        <li>Liquide : <span>{{$mCash}} €</span></li>
                        <li>Chèques : <span>{{$mMoneyorder}} €</span></li>
                        <li>Paypal : <span>{{$mPaypal}} €</span></li>
                        <li class="total alert-success">Total : <span>{{floatval($mTotal->sum('order_total'))}} €</span></li>
                        <li class="alert-danger">Paiement non finalisé : <span>{{floatval($mAbort->sum('order_total'))}} €</span></li>
                        <li class="alert-danger">Commande annulée : <span>{{floatval($mNul->sum('order_total'))}} €</span></li>
                        <li class="total">Nombre de commandes : <span>{{intval($mTotal->count())}}</span></li>
                    </ul>
            </article>
        </section>
        <section>
            <h2>Année :
                {!! Form::open(array('post' => 'StatistiquesController@datePicker')) !!}
                    {{ $selected = ''}}
                    <select name="year">
                    @for($i=1970; $i<=2080; $i++)
                        @if($i == date('Y') OR $i === intval($yYear))
                                {{$selected = ' selected="selected"'}}
                        @endif
                        <option value="{{$i}}" {{$selected}} > {{$i}} </option>
                        {{$selected=''}}
                    @endfor
                    </select>

                <button class="btn btn-primary" type="submit" name="check" value="checkYear">
                    <i class="fa fa-check"></i>
                </button>
                {!! Form::close() !!}
            </h2>
            <article>
                @if(Session::has('messageYear'))
                    <p class="text-danger message">
                        {{Session::get('messageYear')}}
                    </p>
                @endif
                    <ul>
                        <li>Liquide : <span>{{$yCash}} €</span></li>
                        <li>Chèques : <span>{{$yMoneyorder}} €</span></li>
                        <li>Paypal : <span>{{$yPaypal}} €</span></li>
                        <li class="total alert-success">Total : <span>{{floatval($yTotal->sum('order_total'))}} €</span></li>
                        <li class="alert-danger">Paiement non finalisé : <span>{{floatval($yAbort->sum('order_total'))}} €</span></li>
                        <li class="alert-danger">Commande annulée : <span>{{floatval($yNul->sum('order_total'))}} €</span></li>
                        <li class="total">Nombre de commandes : <span>{{intval($yTotal->count())}}</span></li>
                    </ul>
            </article>
        </section>
    </div>

    @include('pages.components.footer')


@stop