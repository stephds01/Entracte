@extends('app')



@section('content')

    @include('pages.components.header')
    @include('pages.components.menu')


    <div class="ent-statistique-container-global">
        <div class="ent-bandeauTitre-container">
            <ul class="ent-bandeauTitre-titre"><li>Statistiques</li></ul>
        </div>


        <section>
            <h2>Jour :
                <form action="">
                    <input type="text" name="date" id="date" placeholder="{{date('d')}} {{dateConvert(date('F'))}} {{date('Y')}}">
                    <button type="submit" name="checkDay">
                        <i class="fa fa-eye"></i>
                    </button>
                </form>
            </h2>
            <article>
                <ul>
                    <li>{{$cash}} €</li>
                    <li>{{$moneyorder}} €</li>
                    <li>{{$paypal}} €</li>
                    {{--<li>Cash</li>--}}
                    {{--<li>Paypal</li>--}}
                    {{--<li>CB</li>--}}
                </ul>
                <div>
                    <div>Total : {{$total}} €</div>
                </div>
            </article>
        </section>
        <section>
            <h2>Semaine :
                <form action="">
                    <input data-weekpicker="weekpicker" type="text" placeholder="Choisir la semaine"/>
                    <button type="submit" name="checkWeek">
                        <i class="fa fa-eye"></i>
                    </button>
                </form>
            </h2>

            <article>
                <ul>
                    <li>$</li>
                    <li>Cash</li>
                    <li>Paypal</li>
                    <li>CB</li>
                </ul>
                <div>
                    <div>Total</div>
                </div>
            </article>
        </section>
        <section>
            <h2>Mois :
                <form action="">
                    <input type="text" name="monthYearPicker" id="monthYearPicker" placeholder="{{dateConvert(date('F'))}} {{date('Y')}}">
                    <button type="submit" name="checkMonth">
                        <i class="fa fa-eye"></i>
                    </button>
                </form>
            </h2>
            <article>
                <ul>
                    <li>$</li>
                    <li>Cash</li>
                    <li>Paypal</li>
                    <li>CB</li>
                </ul>
                <div>
                    <div>Total</div>
                </div>
            </article>
        </section>
        <section>
            <h2>Année :
                <form action="">
                    <?php
                    $selected = '';

                    echo '<select name="annees">',"\n";
                    for($i=1970; $i<=2050; $i++)
                    {
                        if($i == date('Y'))
                        {
                            $selected = ' selected="selected"';
                        }
                        echo "\t",'<option value="', $i ,'"', $selected ,'>', $i ,'</option>',"\n";
                        $selected='';
                    }
                    echo '</select>',"\n";
                    ?>
                        <button type="submit" name="checkYear">
                            <i class="fa fa-eye"></i>
                        </button>
                </form>
            </h2>
            <article>
                <ul>
                    <li>$</li>
                    <li>Cash</li>
                    <li>Paypal</li>
                    <li>CB</li>
                </ul>
                <div>
                    <div>Total</div>
                </div>
            </article>
        </section>
    </div>

    @include('pages.components.footer')


@stop