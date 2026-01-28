
<style>
   .progress-bar {
      width: 100%;
      height: 20px;
      background-color: #e0e0e0;
      border-radius: 5px;
      overflow: hidden;
      position: relative;
   }

   .progress-fill {
      height: 100%;
      background-color: #4caf50;
      width: 0;
      transition: width 2s ease-in-out;
   }

   #progressText {
      font-size: 14px;
   }
   .card:hover{
       transform: none;
   }
       @media (max-width: 768px) {

    .content-wrapper {
        zoom: 0.90;
       margin-top: 125px;
    }    

 }
</style>
<!-- Content wrapper -->
<div class="content-wrapper">
   <!-- Content -->
   <div class="container-xxl flex-grow-1 container-p-y">
      <div class="card" style="padding: 0 20px;">
        <h5 class="card-header text-center text-md-start"><?php echo $title?></h5>
        <div class="card-datatable table-responsive">
          <div class="card-body">
      <form id="uploadForm" method="POST" enctype="multipart/form-data">
         <div class="button-wrapper">
            <label for="iteminfo" class="btn btn-primary me-3 mb-4" tabindex="0">
               <span id="fileNameText" >📁 📁 📁 📁 📁 📁</span>
               <i class="ri-upload-2-line d-block d-sm-none"></i>
               <input type="file" id="iteminfo" name="iteminfo" class="account-file-input" hidden accept=".txt, .lua, .lub" />
            </label>
         </div>

         <div class="mt-6">
                  <!-- Barra de progresso personalizada -->
      <div id="progressWrapper" style="display:none; width: 100%; margin-bottom: 15px;">
         <p id="progressText" style="text-align: center; font-size: 14px;"></p>
         <div id="progressBar" class="progress-bar">
            <div id="progressFill" class="progress-fill"></div>
         </div>
      </div>
            <button type="submit" id="submitBtn" class="btn btn-primary me-3" disabled>Enviar</button>
         </div>
      </form>

</div>



<script>
   document.getElementById('iteminfo').addEventListener('change', function() {
      const file = this.files[0];
      const fileNameText = document.getElementById('fileNameText');
      const submitBtn = document.getElementById('submitBtn');
      
      if (file) {

         fileNameText.textContent = file.name;
         fileNameText.classList.remove('d-none');

         submitBtn.disabled = false;
      } else {
         // Reseta a interface se não houver arquivo selecionado
         fileNameText.textContent = '📁 📁 📁 📁 📁 📁';
         submitBtn.disabled = true;
      }
   });

   document.getElementById('uploadForm').addEventListener('submit', function(event) {
      event.preventDefault();
      const formData = new FormData(this);
      const progressWrapper = document.getElementById('progressWrapper');
      const progressFill = document.getElementById('progressFill');
      const progressText = document.getElementById('progressText');
      const submitBtn = document.getElementById('submitBtn');

 
      progressWrapper.style.display = 'block';

 
      progressFill.style.width = '0%';
      progressText.textContent = '';


      const xhr = new XMLHttpRequest();
      xhr.open('POST', '', true);


      xhr.upload.onprogress = function(e) {
         if (e.lengthComputable) {
            const percent = (e.loaded / e.total) * 100;
            progressFill.style.width = percent + '%'; 
            progressText.textContent = ` ${Math.round(percent)}%`; 
         }
      };

      xhr.onload = function() {
         if (xhr.status === 200) {
            progressFill.style.width = '100%';
            progressText.textContent = '✅';
            submitBtn.disabled = true; 
         } else {
            progressFill.style.width = '100%';
            progressText.textContent = 'Error ❌';
         }
        
         setTimeout(function() {
            progressWrapper.style.display = 'none';
         }, 1000);
      };

      xhr.onerror = function() {
         progressFill.style.width = '100%';
         progressText.textContent = 'Erro ao enviar o arquivo. Tente novamente.';
         setTimeout(function() {
            progressWrapper.style.display = 'none';
         }, 1000);
      };

      xhr.send(formData);
   });
</script>


</div>
</div>
<!--/ Multilingual -->
</div>

