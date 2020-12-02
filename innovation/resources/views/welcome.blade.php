<!DOCTYPE html>
<?php
if($_POST)
{
    $url = "https://api.kku.ac.th/reg/student_get_name/X2mwh3TEVJUREcYGtFHFqjMb2RguAtPvtb2I9269929964627bddd0839c8ed26f77860c26ccf7eVm8CeZfrVVUAAzZTl9SaokLS0gjlg2x0oELAB12wT31dbc6d676104fb96d8f96204fa59a2c5859f0b4W8tt5lNcdVAwGqFVHYbJ/603410073-5";
    $data = getData($url);
    function getData($url, $type='GET', $data=array()) {
        $jData = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $type);
        if (!empty($data)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jData);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($jData))
            );
        }
        $data = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        return empty($error) ? $data : $error;
    }
}
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
    <input type="number" name="id">
    <input type="password" name="pass">
    <button type="submit">login</button>
</form>
</body>
</html>