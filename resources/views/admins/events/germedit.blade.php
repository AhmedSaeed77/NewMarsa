<div class="my-5">
    <div class="form-group row">
     <label class="col-3">Event title :</label>
     <div class="col-9">
      <input class="form-control form-control-solid" type="text" name="title_de" value="{{$event->title_de}}" required/>
     </div>
    </div>
    <hr>
    <div class="form-group row">
     <label class="col-3">Description Aditional Price :</label>
     <div class="col-9">
      <textarea class="form-control" name="descriptiuonadditionalprice_de" rows="3" >{{$event->descriptiuonadditionalprice_de}}</textarea>
     </div>
    </div>
    <hr>
    <div class="my-52">
       <div class="form-group mb-1">
        <label for="exampleTextarea">Overview:</label>
        <textarea class="form-control formdataforev"  name="overview_de" rows="3" >{{$event->overview_de}}</textarea>
       </div>
   </div>
   <hr> 
   <div class="my-52">
       <div class="form-group mb-1">
        <label for="exampleTextarea">Includes:</span></label>
        <textarea class="form-control formdataforev" name="includes_de" rows="3" >{{$event->includes_de}}</textarea>
       </div>
    </div>
    <hr>
    <div class="my-52">
       <div class="form-group mb-1">
        <label for="exampleTextarea">How can i contact the organizer with any question?:</span></label>
        <textarea class="form-control formdataforev" name="includes_de" rows="3" >{{$event->how_de}}</textarea>
       </div>
    </div>
    <hr>
    <div class="my-52">


       <div class="form-group mb-1">
        <label for="exampleTextarea">Excludes:</span></label>
        <textarea class="form-control formdataforev"   name="excludes_de" rows="3" >{{$event->excludes_de}}</textarea>
       </div>

    </div>
   </div>