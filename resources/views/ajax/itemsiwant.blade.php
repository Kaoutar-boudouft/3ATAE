<link rel="stylesheet" href="{{url('css/productstovalidate.css')}}">
<div class="container-fluid">
    <div class="row w-100">

        <section class="content w-100 ">
            <h1>{{__('traduction.OIW')}}</h1>
            <div id="remarque"></div>

            <div class="col-12 ">
                <div class="panel panel-default w-100">
                    <div class="panel-body">
                        <div class="table-container w-100" >
                            <table class="table table-filter">
                                <tbody>
                                    @foreach ($annonces as $annonce)
                                    <?php
                                    $pics=explode('**',$annonce->images);
                                    ?>
                                    <tr data-status="redd">
                                        <td style="width: 50%">
                                            <a href="#" class="pull-left"> <img src="{{url('sdannoncespics/'.$pics[0])}}" width="200" height="200"> </a>

                                        </td>
                                        <td style="width: 40%">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4 class="title">{{$annonce->Title}} </h4>
                                                    <p class="summary">{{$annonce->Description}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="button" value="{{__('traduction.Cancel')}}" class="btn btn-warning cancel" id="c{{$annonce->id}}"></td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <br>

        </section>
    </div>
</div>
<script>

</script>
