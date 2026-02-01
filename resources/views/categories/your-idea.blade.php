<style>
    /* скриваме истинския file input */
    .file-input input[type="file"] {
        display: none;
    }

    /* wrapper */
    .file-input {
        position: relative;
    }

    /* label = фейк input */
    .file-label {
        width: 100%;
        height: 60px;
        background: #1c1c1c;
        border: 1px solid #2f2f2f;
        padding-left: 55px;
        padding-right: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        color: #aaa;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    /* hover */
    .file-label:hover {
        border-color: #ffd66b;
    }

    /* текст „Няма избран файл“ */
    .file-name {
        font-size: 13px;
        opacity: 0.6;
    }

    /* иконата – наследява стила от input-group */
    .file-input .icon {
        position: absolute;
        left: 20px;
        color: #ffd66b;
    }

</style>
<section class="contact-part">
    <div class="container">
        <!-- Contact Form -->
        <div class="contact-form">
            <h4>Не намирате това което търсите? Опишете вашата идея и ние ще я изработим за вас. </h4>
            <br>
            <br>
            <form class="form_validate ajax_submit form_alert" action="sendmail.php" method="post" enctype="multipart/form-data" novalidate="novalidate">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group mb-30">
                            <span class="icon"><i class="far fa-user"></i></span>
                            <input type="text" placeholder="Име" name="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-30">
                            <span class="icon"><i class="far fa-envelope"></i></span>
                            <input type="email" placeholder="Емайл адрес" name="email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-30">
                            <span class="icon"><i class="far fa-phone"></i></span>
                            <input type="text" placeholder="Телефонен номер" name="phone">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-30 file-input">
                            <span class="icon"><i class="far fa-book" style="padding-left: 20px"></i></span>

                            <input type="file" multiple id="fileUpload" name="files[]">
                            <label for="fileUpload" class="file-label">
                                <p style="margin-top: 22px;font-family: &quot;Roboto&quot;, sans-serif;color: #a3a3a3;     padding-left: 22px;
    font-weight: 200;" id="file-placeholder">Избор на файл</p>
                                <span class="file-name"></span>
                            </label>
                        </div>
                    </div>                    <div class="col-12">
                        <div class="input-group textarea mb-30">
                            <span class="icon"><i class="far fa-pen"></i></span>
                            <textarea placeholder="Описание на идеята" name="message"></textarea>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="main-btn btn-filled">Изпрати</button>
                        <div class="server_response w-100"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function () {
            const label = this.nextElementSibling;
            const fileNameEl = label.querySelector('.file-name');

            if (!this.files || this.files.length === 0) {
                fileNameEl.textContent = 'Няма избран файл';
                return;
            }

            if (this.files.length === 1) {
                $("#file-placeholder").css("margin-top", "9px");
                fileNameEl.textContent = this.files[0].name;
            } else {
                $("#file-placeholder").css("margin-top", "9px");

                fileNameEl.textContent = `Избрани файлове: ${this.files.length}`;
            }

        });

    });

</script>
