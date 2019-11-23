<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bourgeoisie - Scanner</title>

    <link rel="stylesheet" href="<?=site_url('assets/css/style.css'); ?>" />
    <script src="<?=site_url('assets/js/jquery-3.3.1.js'); ?>"></script>
    <script src="<?=site_url('assets/js/instascan.min.js'); ?>"></script>
</head>
<body>
    <div class="camera-container">
        <video class="camera" id="camera"></video>
        <div class="camera-layout">
            <div class="camera-border camera-border-top-left"></div>
            <div class="camera-border camera-border-top-right"></div>
            <div class="camera-border camera-border-bottom-left"></div>
            <div class="camera-border camera-border-bottom-right"></div>
            <span class="camera-text">
                Align QR Code within frame to scan
            </span>
        </div>
    </div>
</body>
<script>

setScanner('camera');
let ip_address;

function setScanner(id) {
    let scanner;

    Instascan.Camera.getCameras().then(function (cameras) {
        var selectedCam;
        if (cameras.length > 0) {
            if (cameras.length == 1)
            {
                selectedCam = cameras[0];
                scanner = new Instascan.Scanner({ video: document.getElementById(id) });
            }
            else
            {
                selectedCam = cameras[1];
                scanner = new Instascan.Scanner({ video: document.getElementById(id), mirror: false });
            }

            scanner.addListener('scan', function (content) {
                var scanned = content;
                /*if (ip_address == '') {
                    ip_address = content;
                    alert('Paired success.');
                }
                else {
                    var scanned = content;
                    $.ajax({
                        url: 'http://' + ip_address + '/transaction.php',
                        method: 'POST',
                        data: {
                            mode: 'test',
                            content: scanned
                        },
                        success: function() {
                            alert('success');
                        }
                    });
                }*/
                alert(content);
                $.ajax({
                    url: 'http://192.168.43.236/school/Bourgeoisie/add.php',
                    method: 'POST',
                    data: {
                        mode: 'aa',
                        content: scanned
                    },
                    success: function(data) {
                        alert(data);
                    }
                });
            });
            scanner.start(selectedCam);
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });
}

function beep() {
    var audio = new Audio('js/beep.mp3');
    audio.currentTime = 0;
    audio.play();
}
</script>
</html>