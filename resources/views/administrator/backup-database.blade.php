<x-main>
    <div class="home-content">
        <div class="text">Backup Database</div>
    </div>
     <!--///////////////////////// INSERT YOUR CODES BELOW ///////////////////////////-->
     <div class="col-12">
       <div class="card">
         <div class="card-header"> 
           Backup Information 
         </div>

         <div class="row p-4">
          <p>
            @foreach ($info as $item)
            {{-- <p>{{$item['name']}}</p>   --}}
            <p><b>Saved on: </b>{{$item['disk']}} storage</p> 
            {{-- <p>{{$item['storageType']}}</p>  --}}
            {{-- <p>{{$item['reachable']}}</p>  --}}
            {{-- <p><b>Status: </b>{{($item['healthy'] == 1) ? 'Healthy': 'Not Healthy' }}</p> --}}
            <p><b>Saved backup count: </b>{{$item['count']}}</p>
            {{-- <p>{{$item['storageSpace']}}</p> --}}
            {{-- <p>{{$item['backups']['date']}}</p> --}}
           
            @endforeach
            <p><b>Saved in folder: </b>{{$info[0]['backups'][0]['path']}}</p>
            <p><b>Date latest backed up file: </b>{{$info[0]['backups'][0]['date']}}</p>
            <p><b>Size of latest backed up file: </b>{{$info[0]['backups'][0]['size']}}</p>
          </p>
         </div>
       <!-- /.card-header -->
              
       </div>
    </div>
    
</x-main>
