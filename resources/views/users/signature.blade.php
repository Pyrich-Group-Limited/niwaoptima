@extends('layouts.app')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="card-title">
                        Change/Sign Signature
                    </h4>
                </div>
        
            </div>
        </div>
    </section>
    <script src="https://cdn.rawgit.com/szimek/signature_pad/0.3.2/signature_pad.min.js"></script>
    <div class="content">
        <div class="card">
            <div class="card-body">
                <div class="row">
                   <div class="col-md-6">
                    <canvas id="signature-pad" width="400" height="200"></canvas>
         <button id="save-button" style="margin-left: 30px;" class="btn btn-primary">Save Signature</button>

         @if (isset($signature))
         <div>
            <img src="{{ $signature->signature_data }}" style="width: 200px;height: auto;"/>
            <p>{{ $signature->user->first_name .' '.$signature->user->middle_name.' '.$signature->user->last_name }}</p>
         </div>
             
         @endif
         <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
         <script>
             var canvas = document.getElementById('signature-pad');
             var signaturePad = new SignaturePad(canvas);
             var saveButton = document.getElementById('save-button');
     
             saveButton.addEventListener('click', function () {
                 var signatureData = signaturePad.toDataURL();
                 //var token = document.getElementsByName("_token").value;
                 var token = "{{csrf_token()}}";
                 // Send signatureData to server for saving
                 $.ajax({
url: 'save-signature',
method: 'POST',
headers: {'X-CSRF-Token': token},
data: {'signature_data': signatureData},
dataType: 'json',
success: function(response) {
 alert(response.message);

},
error: function(response) {
 alert(JSON.stringify(response));

}
});
             });
         </script>

                   </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
