@if(session()->has('message'))
    
<div class="d-flex justify-content-center">

        <div x-data="{showMessage:true}" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 5000)"  x-transition class="position-absolute text-center text-white w-75 t-10 bg-dark bg-opacity-75 px-10 py-2 " style="margin-top:50px; opacity:0.8; ">
            <p style="opacity: 1;">
                {{session('message')}}
            </p>
        </div>
    </div>
    
@endif