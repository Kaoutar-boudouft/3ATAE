<div class="panel-body">
                          
    <table class="table table-filter">
        <tbody>
            @if ($souscategories!=null)
            @for ($i = 0; $i < count($souscategories); $i++)
                
            <tr data-status="redd">
               
                <td style="width: 60%;text-align:center">
                    <div class="media"> 
                        <div class="media-body">
                            <h4 class="title">{{$souscategories[$i]->NomSousCategory}}</h4>
                            <p class="summary">{{$catofsc[$i][0]->NomCategory}}</p>
                        </div>
                    </div>
                    <div class="remscat"  id="{{$souscategories[$i]->id}}" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                      </svg></div>
                </td>
            </tr>
            @endfor
            @endif
            

        </tbody>
    </table>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-3 pages_link mx-auto">  {{$souscategories->onEachSide(1)->links()}}</div>
        <div class="col-4"></div>
      </div>
</div>
</div>
<script>
   
   
</script>