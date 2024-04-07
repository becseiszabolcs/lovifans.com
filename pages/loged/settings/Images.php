<div class="setsite imgsite">
    
    <h1><?=$_GET['sel'] =='profimg' ? "Profile Image Upload" : "Bacground Image Upload"?></h1>


    <input hidden type="file" id="file" name="file" accept="image/*">
    <label for="file">Choose Image</label>
    <div id="preview"></div>
    <button id="submitBtn" onclick="submitImage()">Submit</button>
    <?php
        $type = $_GET['sel'] =='profimg' ? "pf" : "bc";
    ?>

    <script>
        $("#preview").hide();
        function submitImage() {
            var sendr = "<?php echo $_SESSION['R1'] . '/pages/loged/upload.php?type=' . $type; ?>";
            var formData = new FormData();
            var fileInput = $("#file").get(0); // Retrieve the DOM element
            if (fileInput.files.length > 0) {
                formData.append('file[]', fileInput.files[0]); // Append the file to FormData
            } else {
                console.error('No file selected.');
                return; // Exit the function if no file is selected
            }

            $.ajax({
                url: sendr,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    console.log(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error sending message:', errorThrown);
                }
            });
        }

        document.getElementById('file').addEventListener('change', function() {
            $("#preview").show();
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    var img = new Image();
                    img.src = event.target.result;
                    img.onload = function() {
                        var preview = document.getElementById('preview');
                        preview.innerHTML = '';
                        preview.appendChild(img);
                    };
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</div>