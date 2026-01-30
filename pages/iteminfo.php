<!-- ==================  ITEMINFO UPLOAD - MODERN LAYOUT ================ -->

<div class="tool-page">
    <div class="tool-card">
        <div class="tool-header">
            <i class="fas fa-upload"></i>
            <h1><?php echo $title ?? 'Importar Iteminfo'; ?></h1>
        </div>

        <div class="tool-content">
            <form id="uploadForm" method="POST" enctype="multipart/form-data">
                <div class="upload-area" id="dropzone">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p id="fileNameText">Arraste o arquivo ou clique para selecionar</p>
                    <span class="upload-formats">.txt, .lua, .lub</span>
                    <input type="file" id="iteminfo" name="iteminfo" class="upload-input" hidden accept=".txt, .lua, .lub" />
                </div>

                <div class="progress-container" id="progressWrapper" style="display: none;">
                    <div class="progress-bar">
                        <div class="progress-fill" id="progressFill"></div>
                    </div>
                    <span class="progress-text" id="progressText">0%</span>
                </div>

                <button type="submit" class="btn-upload" id="submitBtn" disabled>
                    <i class="fas fa-paper-plane"></i>
                    <span>Enviar Arquivo</span>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
// Click to select file
document.getElementById('dropzone').addEventListener('click', function() {
    document.getElementById('iteminfo').click();
});

// File input change
document.getElementById('iteminfo').addEventListener('change', function() {
    const file = this.files[0];
    const fileNameText = document.getElementById('fileNameText');
    const submitBtn = document.getElementById('submitBtn');
    const dropzone = document.getElementById('dropzone');

    if (file) {
        fileNameText.textContent = file.name;
        submitBtn.disabled = false;
        dropzone.classList.add('has-file');
    } else {
        fileNameText.textContent = 'Arraste o arquivo ou clique para selecionar';
        submitBtn.disabled = true;
        dropzone.classList.remove('has-file');
    }
});

// Drag and drop
const dropzone = document.getElementById('dropzone');
const inputFile = document.getElementById('iteminfo');

['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropzone.addEventListener(eventName, preventDefaults, false);
});

function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
}

['dragenter', 'dragover'].forEach(eventName => {
    dropzone.addEventListener(eventName, () => dropzone.classList.add('drag-over'), false);
});

['dragleave', 'drop'].forEach(eventName => {
    dropzone.addEventListener(eventName, () => dropzone.classList.remove('drag-over'), false);
});

dropzone.addEventListener('drop', function(e) {
    const file = e.dataTransfer.files[0];
    if (file) {
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        inputFile.files = dataTransfer.files;
        inputFile.dispatchEvent(new Event('change'));
    }
});

// Form submit with progress
document.getElementById('uploadForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    const progressWrapper = document.getElementById('progressWrapper');
    const progressFill = document.getElementById('progressFill');
    const progressText = document.getElementById('progressText');
    const submitBtn = document.getElementById('submitBtn');

    progressWrapper.style.display = 'flex';
    progressFill.style.width = '0%';
    progressText.textContent = '0%';

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '', true);

    xhr.upload.onprogress = function(e) {
        if (e.lengthComputable) {
            const percent = Math.round((e.loaded / e.total) * 100);
            progressFill.style.width = percent + '%';
            progressText.textContent = percent + '%';
        }
    };

    xhr.onload = function() {
        if (xhr.status === 200) {
            progressFill.style.width = '100%';
            progressText.innerHTML = '<i class="fas fa-check"></i> Concluído';
            submitBtn.disabled = true;
        } else {
            progressText.innerHTML = '<i class="fas fa-times"></i> Erro';
        }

        setTimeout(function() {
            progressWrapper.style.display = 'none';
        }, 2000);
    };

    xhr.onerror = function() {
        progressText.innerHTML = '<i class="fas fa-times"></i> Erro ao enviar';
        setTimeout(function() {
            progressWrapper.style.display = 'none';
        }, 2000);
    };

    xhr.send(formData);
});
</script>
