
                            <table class="table table-filter">
                                <tbody>
                                    <input id="numberofitemsinpage" type="text" value="{{count($annonces)}}" hidden="hidden" > 
                                   
                                    @foreach ($annonces as $annonce)
                                    <?php
                                    $pics=explode('**',$annonce->images);
                                    ?>
                                    <tr data-status="redd">
                                        <td style="width: 30%">
                                            <a href="#" class="pull-left"> <img src="{{url('sdannoncespics/'.$pics[0])}}" width="200" height="200"> </a>

                                        </td>
                                        <td style="width: 60%">
                                            <div class="media"> 
                                                <div class="media-body">
                                                    <h4 class="title">{{$annonce->Title}}<span class="pull-right redd"> ({{$annonce->status}})</span> </h4>
                                                    <p class="summary">{{$annonce->Description}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        @if ($annonce->status=="encoursdevalidation")
                                        <td style="width: 10%">
                                            <div style="display: flex"><input class="btn btn-success accepter" id="{{$annonce->id}}" style="margin-right: 3px" type="button" value="Accepter"><input class="btn btn-warning reffuser" type="button" value="Reffuser" id="{{$annonce->id}}"></div>
                                        </td>
                                        @else
                                        <td style="width: 10%">
                                            <input class="btn btn-danger delete" type="button" value="delete" id="{{$annonce->id}}"></div>
                                        </td>
                                        @endif
                                       
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-3 pages_link mx-auto">  {{$annonces->onEachSide(1)->links()}}</div>
                                <div class="col-4"></div>
                              </div>
                        
